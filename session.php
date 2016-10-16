<?php
session_start();

include 'connect.php';
if(isset($_SESSION['username']) and isset($_SESSION['password'])){

	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$userid = $_SESSION['userid'];

	$sql = mysql_query("SELECT * FROM `users` WHERE `userid`='$userid' and `username`='$username' and `password`='$password'") or die(mysql_error());
}
else{
	header("location:index.php");
}
?>