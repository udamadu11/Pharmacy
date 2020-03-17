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
	<script src="http://kit.fontawsome.com/b99e675b6e.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="sidenav">

		<a href="storekeeperDashborad.php" target="main"><i class="fa fa-home" ></i> Dashboard</a>
		<a href="viewDrugs.php" target="main"><i class="fa fa-eye" aria-hidden="true"></i> drug</a>
		<a href="searchDrug.php" target="main"><i class="fa fa-search" aria-hidden="true"></i> Search drug</a>
				<div class="dropdown">
					<button class="drop-btn" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Update Stock</button>
					<div class="dropdown-content">
						<a href="view/addBatch.php" target="main">Add New Stock</a>
						<a href="searchBatch.php" target="main">remove Stock</a>
					</div>
				</div>	
		<br><br>
		<a href="viewSupplier.php" target="main" style="margin-top: 20px;"><i class="fa fa-users" aria-hidden="true"></i> View Supplier info</a>
		<a href="lowDrugList.php" target="main"><i class="fa fa-low-vision" aria-hidden="true"></i> View low drug list</a>
		<a href="expireDate.php" target="main"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Expiry Notification</a>
		<a href="Purchase.php" target="main"><i class="fa fa-id-card" aria-hidden="true"></i>Purchase</a>
		<a href="chatRoom.php" target="main"><i class="fa fa-comments" aria-hidden="true"></i> Chat Room</a>
	</div>	
</body>
