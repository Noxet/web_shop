<?php
$error='';
$success = '';

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
		}
		
		// SQL query to fetch information of registerd users and finds user match.
		if (crypt($password, $pw) == $pw) {
			$_SESSION['user']=$username; // Initializing Session
			session_regenerate_id(); // regenerate to avoid session fixation attacks
			header("location: index.php"); // Redirecting to index
			die();
		} else {
			$error = "Username or Password is invalid";
		}
		mysqli_close($con); // Closing Connection
	}
}
?>
