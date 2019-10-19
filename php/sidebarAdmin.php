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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
</head>
<body>
<div class="sidenav">
		 <a href="home.html"	target="main"><i class="fa fa-fw fa-home"></i>			Home</a>
		<a href="addUser.php" target="main"><i class="fas fa-user-plus"></i>			Add User</a>
		<a href="viewUser.php" target="main"><i class="fas fa-user-friends"></i>		View User</a>
		<a href="removeUser.php" target="main"><i class="fas fa-user-minus"></i>		Remove User</a>
		<a href="editUser.php" target="main"><i class="fas fa-angle-double-up"></i>		Edit User</a>
		
	</div>
</body>
</html>