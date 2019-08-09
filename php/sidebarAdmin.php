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
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
<div class="sidenav">
		<a href="addUser.php" target="main">Add User</a>
		<a href="viewUser.php" target="main">View User</a>
		<a href="removeUser.php" target="main">Remove User</a>
		
	</div>
</body>
</html>