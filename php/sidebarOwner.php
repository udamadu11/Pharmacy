<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

<?php
    //Unauthorized Access_Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '1'){
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
		<a href="ownerDashboard.php" target="main" style="margin-top: 20px;">DashBoard</a>
		<a href="chatRoom.php" target="main">Chat Room</a>
		<a href="viewDrugs.php"	target="main">View drugs</a>
		<a href="viewSupplier.php"	target="main">View Suppliers</a>
		<div class="dropdown">
			<button class="drop-btn">Approval List</button>
				<div class="dropdown-content">
					<a href="approvalList.php" target="main">Add Supplier Appro:</a>
					<a href="approvalListRemove.php" target="main">remove Supplier Appro:</a>
					<a href="approveAddDrug.php" target="main">Add Drug Appro:</a>
					<a href="approveRemoveDrug.php" target="main">remove Drug Appro:</a>
				</div>
		</div>
		<br><br>
		<a href="creditOwnerNotification.php" target="main" style="margin-top: 20px;">Credit periods notification</a>
		<a href="viewEmployee.php" target="main">View Employee Details</a>
		<div class="dropdown">
			<button class="drop-btn">View Reports</button>
				<div class="dropdown-content">
					<a href="fastselling.php" target="main">Selling Reports</a>
					<a href="current_stock_report.php" target="main">Current Stock</a>
				</div>
		</div>

	</div>
</body>
</html>
