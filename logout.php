<?php

session_start();

require_once "config.php";
// Unset all of the session variables
$_SESSION = array();
 

session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>