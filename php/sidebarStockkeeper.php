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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
</head>
<body>
	<div class="sidenav">
		<a href="home.html"	target="main"><i class="fa fa-fw fa-home"></i>		Home</a>
		<a href="../php/viewDrugs.php" target="main"><i class="fas fa-pills"></i>		View drug</a>
		<a href="../php/searchDrug.php" target="main"><i class="fas fa-search"></i>		Search drug</a>
				<div class="dropdown">
					<button class="drop-btn" ><i class="fas fa-angle-double-up"></i>		Update Inventory</button>
					<div class="dropdown-content">
						<a href="../php/addDrug.php" target="main"><i class="fas fa-tablets"></i>		Add drug</a>
						<a href="../php/removeDrug.php" target="main"><i class="fas fa-minus-circle"></i>		remove drug</a>
					</div>
				</div>	
				<br><br>
		<a href="../php/viewSupplier.php" target="main"><i class="fas fa-user-friends"></i>			View Supplier info</a>
		<a href="#"><i class="fas fa-sort-amount-up"></i>		Set reorder level</a>
		<a href="#">		<i class="fas fa-list-alt"></i>		View low drug list</a>
		<a href="#"><i class="far fa-envelope"></i>		Expiry Notification</a>
		
			<div class="dropdown ">
					<button class="drop-btn"><i class="fas fa-credit-card"></i>		Purchase order</button>
					<div class="dropdown-content">
						<a href="#"><i class="fas fa-paper-plane"></i>		Send purchase order</a>
						<a href="#">	View purchase order</a>
					</div>
				</div><br><br>
		<a href="#"><i class="fas fa-info"></i>					View product info</a>
	</div>	
</body>
