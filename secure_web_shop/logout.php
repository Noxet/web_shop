<?php
require_once 'connection.php';

if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}
?>
