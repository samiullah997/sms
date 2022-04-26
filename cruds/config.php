<?php
SESSION_START();
error_reporting(0);     

$con = mysqli_connect('localhost','root','','nims');
if(!$con){
    die('Connection Failed'.mysqli_connect_error());
}