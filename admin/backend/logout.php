<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
$_SESSION['login-message'] = "You have been logged out!";

header('location: ../index.php');

?>