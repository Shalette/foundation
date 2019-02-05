<?php
error_reporting(E_ALL ^ E_WARNING); 
$con = mysqli_connect("localhost", "root", "", "paani") or die(mysqli_error($con));
session_start();
?>
