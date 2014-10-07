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
		
		// To protect MySQL injection for Security purpose
		//$username = stripslashes($username);
		//$password = stripslashes($password);
		//$username = mysql_real_escape_string($username);
		//$password = mysql_real_escape_string($password);
		
		// SQL query to fetch information of registerd users and finds user match.
		$query = mysqli_query($con, "select * from members where username='$username'");
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
			// check password
			$row = mysqli_fetch_array($query);
			if (crypt($password, $row['password']) == $row['password']) {
				$_SESSION['user']=$username; // Initializing Session
				//header("location: index.php"); // Redirecting To Other Page
			} else {
				$error = "Username or Password is invalid";
			}
		} else {
			$error = "Username or Password is invalid";
		}
		mysqli_close($con); // Closing Connection
	}
}
?>
