<?php
	require_once('include/connection.php');

	session_start();
	if(isset($_SESSION['u_name'])){
		session_unset($_SESSION['u_name']);
		session_unset($_SESSION['type']);
		session_unset($_SESSION['id']);
		header("Location: login.php");
		exit();
	}
?>