<?php
$error='';
$success = '';

$attempt_limit = 3;
$time_lockout = 20;

require_once 'connection.php';

if (isset($_POST['submit'])) {
	
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else
	{
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
	

		// secure using prepared statements
		if ($stmt = mysqli_prepare($con, "SELECT password FROM members WHERE username=?")) {
			mysqli_stmt_bind_param($stmt, "s", $username); // bind the parameters
			mysqli_stmt_execute($stmt); // execute statement
			mysqli_stmt_bind_result($stmt, $pw); // bind the result
			mysqli_stmt_fetch($stmt); // fetch
			mysqli_stmt_close($stmt);
		}

		$sqlc = mysqli_query($con, "select * from login_attempts where username='$username'");
		$row = mysqli_fetch_array($sqlc);

		if ((time() - $row['first_time'] < $time_lockout) && ($row['attempt_count'] >= $attempt_limit)) {
			$error = "Your account is currently locked!";
		} else {
			// SQL query to fetch information of registerd users and finds user match.
			if (crypt($password, $pw) == $pw) {
				$_SESSION['user']=$username; // Initializing Session
				session_regenerate_id(); // regenerate to avoid session fixation attacks
				header("location: index.php"); // Redirecting to index
				die();
			} else {

				$error = "Username or Password is invalid";

				if (time() - $row['first_time'] > $time_lockout) {
					$curr_time = time();
					// unsafe but the "time is running out"
					$query = mysqli_query($con, "update login_attempts set first_time = $curr_time where username='$username'");
					$query = mysqli_query($con, "update login_attempts set attempt_count = 1 where username='$username'");
				} else {
					$ac = $row['attempt_count'];
					$ac++;
					mysqli_query($con, "update login_attempts set attempt_count = $ac where username='$username'");
				}
			}
		}
		mysqli_close($con); // Closing Connection
	}
}
?>
