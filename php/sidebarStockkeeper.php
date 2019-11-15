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
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="sidenav">

		<a href="viewDrugs.php" target="main">View drug</a>
		<a href="searchDrug.php" target="main">Search drug</a>
				<div class="dropdown">
					<button class="drop-btn" >Update Stock</button>
					<div class="dropdown-content">
						<a href="addBatch.php" target="main">Add New Stock</a>
						<a href="searchBatch.php" target="main">remove Stock</a>
					</div>
				</div>	
		<br><br>
		<a href="viewSupplier.php" target="main" style="margin-top: 20px;">View Supplier info</a>
		<a href="#">View low drug list</a>
		<a href="expireDate.php" target="main">Expiry Notification</a>
		
			<div class="dropdown ">
					<button class="drop-btn">Purchase order</button>
					<div class="dropdown-content">
						<a href="#">Send purchase order</a>
						<a href="#">View purchase order</a>
					</div>
				</div><br><br>
	</div>	
</body>
