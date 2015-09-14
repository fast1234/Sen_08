<?php
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
	header("Location:home_page.php");
}
	ob_start();
	require 'connect.php';
	session_destroy();
	echo 'You are logged out.';
	include 'login.php';

?>