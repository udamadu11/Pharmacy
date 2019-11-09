<?php require_once('include/session.php'); ?>
<?php include('include/connection.php') ?>
<?php
    //Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '4'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Side Bar</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="sidenav">
		<a href="addUser.php" target="main">Add User</a>
		<a href="viewUser.php" target="main">View User</a>
		<a href="removeUser.php" target="main">Remove User</a>
		<a href="editUser.php" target="main">Reset Password</a>
	</div>
</body>
</html>