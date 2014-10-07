<?php

function encrypt_password($password)
{   
	$chars = "aeuyiBDGHJLMNPQRSTVWXZbdghjmnpqrstvz0123456789";
	$salt = ""; 
	for($i=0; $i<16;++$i) {
		$salt .= $chars[rand()%strlen($chars)];
	}   

	return crypt($password, '$6$'.$salt.'$');
}

?>
