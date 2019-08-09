<?php include('include/session.php') ?>

<?php
    //Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '3'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/StockKeeper.css">
</head>
<body>
	<div class="sidenav">

		<a href="../php/viewDrugs.php" target="main">View drug</a>
		<a href="../php/searchDrug.php" target="main">Search drug</a>
				<div class="dropdown">
					<button class="drop-btn" >Update Inventory</button>
					<div class="dropdown-content">
						<a href="../php/addDrug.php" target="main">Add drug</a>
						<a href="../php/removeDrug.php" target="main">remove drug</a>
					</div>
				</div>	
				<br><br>
		<a href="../php/viewSupplier.php" target="main">View Supplier info</a>
		<a href="#">Set reorder level</a>
		<a href="#">View low drug list</a>
		<a href="#">Expiry Notification</a>
		
			<div class="dropdown ">
					<button class="drop-btn">Purchase order</button>
					<div class="dropdown-content">
						<a href="#">Send purchase order</a>
						<a href="#">View purchase order</a>
					</div>
				</div><br><br>
		<a href="#">View product info</a>
	</div>	
</body>
