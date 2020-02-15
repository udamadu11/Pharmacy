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
</head>
<body>
<div class="sidenav">
		<a href="pharmacistDashboard.php" target="main">Dashbord</a>
		<a href="issueDrug.php" target="main">Issue Drugs</a>
		<a href="updateDrug.php" target="main">Drugs</a>
		<a href="removeSupplier.php" target="main">Suppliers</a>
		<a href="searchDrug.php" target="main">Search Drug</a>
		<a href="addPurchase.php" target="main">Purchase</a>
		<a href="chatRoom.php" target="main">Chat Room</a>
</body>
</html>