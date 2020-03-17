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
  <script src="http://kit.fontawsome.com/b99e675b6e.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
</head>
<body>
<div class="sidenav">
		<a href="viewEmployee.php" target="main"><i class="fas fa-street-view"></i>Users</a>
		<a href="chatRoom.php" target="main"><i class="fa fa-comments" aria-hidden="true"></i>Chat Room</a>
	</div>
</body>
</html>