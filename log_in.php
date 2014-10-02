<?php
$error=''; // Variable To Store Error Message

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
		$query = mysqli_query($con, "select * from members where password='$password' AND username='$username'");
		$error = $query;
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session
			header("location: index.php"); // Redirecting To Other Page
		} else {
			$error = "Username or Password is invalid";
		}
		mysqli_close($con); // Closing Connection
	}
}
?>
