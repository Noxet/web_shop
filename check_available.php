<?php

require_once 'connection.php';

if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$res = mysqli_query($con, "select * from taken_usernames where username='$username'");
	if (mysqli_num_rows($res) >= 1) {
		echo "NACK"; // not available
	} else {
		echo "ACK"; // available
	}
}
?>
