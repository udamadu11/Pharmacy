<?php require_once('include/session.php'); ?>
<?php
    //Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '2'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="http://kit.fontawsome.com/b99e675b6e.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
</head>
<body>
<div class="sidenav">
		<a href="pharmacistDashboard.php" target="main"><i class="fa fa-home" ></i>  Dashbord</a>
		<a href="issueDrug.php" target="main"><i class="fa fa-medkit" aria-hidden="true"></i>  Issue Drugs</a>
		<a href="updateDrug.php" target="main"><i class="fa fa-plus" aria-hidden="true"></i>  Drugs</a>
		<a href="removeSupplier.php" target="main"><i class="fa fa-users" aria-hidden="true"></i> Suppliers</a>
		<a href="searchDrug.php" target="main"><i class="fa fa-medkit" aria-hidden="true"></i>  Search Drug</a>
		<a href="addPurchase.php" target="main"><i class="fa fa-id-card" aria-hidden="true"></i> Purchase</a>
		<a href="chatRoom.php" target="main"><i class="fa fa-comments" aria-hidden="true"></i>  Chat Room</a>
</body>
</html>