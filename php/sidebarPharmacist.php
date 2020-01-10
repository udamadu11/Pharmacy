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
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="sidenav">
		<a href="pharmacistDashboard.php" target="main">Dashbord</a>
		<a href="chatRoom.php" target="main">Chat Room</a>
		<a href="viewDrugs.php" target="main">View Drug</a>
		<a href="searchDrug.php" target="main">Search Drug</a>
		<a href="addPurchase.php" target="main">Purchase</a>
		<a href="issueDrug.php" target="main">Issue Drugs</a>
		<a href="viewSupplier.php" target="main">View Suppliers</a>
		<div class="dropdown">
					<button class="drop-btn" >Update Suppliers</button>
					<div class="dropdown-content">
						<a href="addSupplier.php" target="main">Add Supplier</a>
						<a href="removeSupplier.php" target="main">remove Supplier</a>
					</div>
				</div>	
				<br><br>
		<div class="dropdown">
					<button class="drop-btn" >Update Drugs</button>
					<div class="dropdown-content">
						<a href="addDrug.php" target="main">Add New Drug</a>
						<a href="updateDrug.php" target="main">Remove Drug</a>
					</div>
				</div>	
				<br><br>
	</div>
</body>
</html>