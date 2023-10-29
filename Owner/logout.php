<?php
//session_start();
//session_destroy();
//
//header('location:login.php');

session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page
header('Location: login.php'); // Replace with your desired page
exit();

?>
