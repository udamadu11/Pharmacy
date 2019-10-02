<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

<?php
    //Unauthorized Access Check
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
	<link rel="stylesheet" type="text/css" href="../css/owner.css">
</head>
<body>
<div class="sidenav">
		<a href="viewDrugs.php"	target="main">View drugs</a>
		<a href="viewSupplier.php"	target="main">View Suppliers</a>	
		<a href="creditOwnerNotification.php" target="main">Credit periods notification</a>
		<a href="#">View Reports</a>
		<div class="dropdown">
			<button class="drop-btn">Approval List</button>
				<div class="dropdown-content">
					<a href="approvalList.php" target="main">Add Supplier Appro:</a>
					<a href="approvalListRemove.php" target="main">remove Supplier Appro:</a>
				</div>
		</div>	
		<br><br>
		<a href="viewEmployee.php" target="main">View Employee Details</a>
	</div>
</body>
</html>
