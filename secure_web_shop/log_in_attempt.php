<?php
$error='';
$success = '';
$attempt_limit = 3;
$time_lockout = 200;


require_once 'connection.php';

if (isset($_POST['submit'])) {
	
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else{
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];

		$res = mysqli_query($con, "select * from members where username = $username");
		$row = mysqli_fetch_array($res);
		$pw = $row['password'];

		// secure using prepared statements
		/*if ($stmt = mysqli_prepare($con, "SELECT password FROM members WHERE username=?")) {
			mysqli_stmt_bind_param($stmt, "s", $username); // bind the parameters
			mysqli_stmt_execute($stmt); // execute statement
			mysqli_stmt_bind_result($stmt, $pw); // bind the result
			mysqli_stmt_fetch($stmt); // fetch
		}*/
		
		$sqlc = "SELECT attempt_count FROM members WHERE username = $username";
		$sqlf = "SELECT first_attempt_time FROM members WHERE username = $username";
		$first_time = mysqli_query($con, $sqlf);
		$attempt_count = mysqli_query($con, $sqlc);
		if(time()-$first_time < $time_lockout){
			$error = "You are currently locked out.";
		}else{	
			// SQL query to fetch information of registerd users and finds user match.	
			if(crypt($password, $pw) == $pw){
				$_SESSION['user']=$username; // Initializing Session
				session_regenerate_id(); // regenerate to avoid session fixation attacks
				header("location: index.php"); // Redirecting to index
				die();
			}else{
				$error = "Username or Password is invalid";
				if(time() - $first_time > $time_lockout){
					$temp = time();
					$error = $temp;	
					$query = mysqli_query($con, 'insert into members values(NULL, "d", "d", "d", 1337, 42)');
					//$query = mysqli_query($con, "UPDATE members SET first_time = '$temp' WHERE username='$username'");
					//$query = mysqli_query($con, "UPDATE members SET attempt_count = '1' WHERE username='$username'");
				}else{
					$attempt_count++;
					$query = mysqli_query($con, "INSERT INTO attempt_count VALUES('$attempt_count') WHERE username='$username'");
				}
			}
		}
	}
	mysqli_close($con); // Closing Connection
}
?>



<!-- 
if(mysqli_num_rows($first_attempt_time) < 1 || $first_attempt_time < $attempt_limit){
$error = "Username or Password is invalid";
	$attempt_count += 1;
	$query = mysqli_query($con, "INSERT INTO members `attempt_count` VALUES('$attempt_count') WHERE username='$username'");
	$first_attempt_time = time();
}else if(mysqli_query($con, $sqlc) > $attempt_limit && ($first_attempt_time + $time_lockout > time())){
	echo "You are currently locked out.";
} -->