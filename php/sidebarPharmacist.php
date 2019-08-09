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
	<link rel="stylesheet" type="text/css" href="../css/pharmacist.css">
</head>
<body>
<div class="sidenav">
		<a href="addDrug.php" target="main">Add Drugs</a>
		<a href="viewDrugs.php" target="main">View Drug</a>
		<a href="searchDrug.php" target="main">Search Drug</a>
		<a href="#">Issue Drugs</a>
		<a href="addSupplier.php" target="main">Add Suppliers</a>
		<a href="viewSupplier.php" target="main">View Suppliers</a>
		<a href="#">Update Brand</a>
		<a href="#">Recieve Approvle not.</a>
	</div>
</body>
</html>