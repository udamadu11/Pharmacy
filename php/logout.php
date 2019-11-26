<?php
	require_once('include/connection.php');//include databse connection

	session_start();
	if(isset($_SESSION['u_name'])){
		// remove  session variables
		session_unset($_SESSION['u_name']);
		session_unset($_SESSION['type']);
		session_unset($_SESSION['id']);
		$u_name = $_SESSION['u_name'];
		header("Location: login.php");
		$update_msg = mysqli_query($con,"UPDATE employee SET log_in = 'offline' WHERE u_name = '$u_name'");
		exit();
	}
?>