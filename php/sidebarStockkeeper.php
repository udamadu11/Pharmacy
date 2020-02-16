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

		<a href="storekeeperDashborad.php" target="main">Dashboard</a>
		<a href="viewDrugs.php" target="main">drug</a>
		<a href="searchDrug.php" target="main">Search drug</a>
				<div class="dropdown">
					<button class="drop-btn" >Update Stock</button>
					<div class="dropdown-content">
						<a href="view/addBatch.php" target="main">Add New Stock</a>
						<a href="searchBatch.php" target="main">remove Stock</a>
					</div>
				</div>	
		<br><br>
		<a href="viewSupplier.php" target="main" style="margin-top: 20px;">View Supplier info</a>
		<a href="lowDrugList.php" target="main">View low drug list</a>
		<a href="expireDate.php" target="main">Expiry Notification</a>
		<a href="Purchase.php" target="main">Purchase</a>
		<a href="chatRoom.php" target="main">Chat Room</a>
	</div>	
</body>
