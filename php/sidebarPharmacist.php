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
		<a href="issueDrug.php" target="main">Issue Drugs</a>
		<div class="dropdown">
					<button class="drop-btn" >Update Suppliers</button>
					<div class="dropdown-content">
						<a href="addSupplier.php" target="main">Add Supplier</a>
						<a href="removeSupplier.php" target="main">remove Supplier</a>
					</div>
				</div>	
				<br><br>
		<a href="viewSupplier.php" target="main">View Suppliers</a>
		<div class="dropdown">
					<button class="drop-btn" >Update Brand</button>
					<div class="dropdown-content">
						<a href="#" target="main">Add Brand</a>
						<a href="##" target="main">Remove Brand</a>
					</div>
				</div>	
				<br><br>
		<a href="#">Recieve Approvle not.</a>
	</div>
</body>
</html>