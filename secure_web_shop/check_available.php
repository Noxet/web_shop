<?php

require_once 'connection.php';

if (isset($_POST['username'])) {
	$username = $_POST['username'];

	if ($stmt = mysqli_prepare($con, "SELECT * FROM taken_usernames WHERE username=?")) {
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $taken);
		mysqli_stmt_fetch($stmt);
	}

	if ($taken != NULL) {
		echo "NACK"; // not available
	} else {
		echo "ACK"; // available
	}
}
?>
