<?php
include 'connection.php';
$error='';

if (isset($_POST['submit'])) {
	
	if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['repassword'])) {
		$error = "Please fill out all input forms";
	} else {
		echo "ja";
	}
}

?>
