<?php 
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['firstname']);
unset($_SESSION['secondname']);
//session_destroy();
header("location: login.php");

?>