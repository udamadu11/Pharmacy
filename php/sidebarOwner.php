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
	<script src="http://kit.fontawsome.com/b99e675b6e.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
</head>
<body>
<div class="sidenav">
		<a href="ownerDashboard.php" target="main" style="margin-top: 20px;"><i class="fa fa-home" ></i>  DashBoard</a>
		<a href="ownerViewDrug.php"	target="main"><i class="fa fa-plus" aria-hidden="true"></i>  Drugs</a>
		<a href="ownerViewSupplier.php"	target="main"><i class="fa fa-users" aria-hidden="true"></i>  Suppliers</a>
		<a href="viewEmployee.php" target="main"><i class="fas fa-user-friends"></i>  Employees</a>
		<div class="dropdown">
			<button class="drop-btn"><i class="fas fa-thumbs-up"></i>  Approval List</button>
				<div class="dropdown-content">
					<a href="approvalList.php" target="main">Add Supplier Appro:</a>
					<a href="approvalListRemove.php" target="main">remove Supplier Appro:</a>
				</div>
		</div>
		<br><br>
		<a href="creditOwnerNotification.php" target="main" style="margin-top: 20px;"><i class="fas fa-exclamation-triangle"></i>  Credit periods notification</a>
		<div class="dropdown">
			<button class="drop-btn"><i class="fas fa-align-justify"></i>  Reports</button>
				<div class="dropdown-content">
					<a href="fastselling.php" target="main">Selling Reports</a>
					<a href="current_stock_report.php" target="main">Current Stock</a>
				</div>
		</div>
		<a href="chatRoom.php" target="main" style="margin-top: 50px;"><i class="fa fa-comments" aria-hidden="true"></i>  Chat Room</a>

	</div>
</body>
</html>
