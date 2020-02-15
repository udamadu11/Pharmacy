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
		<a href="viewEmployee.php" target="main">Users</a>
		<a href="chatRoom.php" target="main">Chat Room</a>
	</div>
</body>
</html>