<?php
	require_once('include/connection.php');//include databse connection

	session_start();
	if(isset($_SESSION['u_name'])){
		// remove  session variables
		session_unset($_SESSION['u_name']);
		session_unset($_SESSION['type']);
		session_unset($_SESSION['id']);
		header("Location: login.php");
		exit();
	}
?>