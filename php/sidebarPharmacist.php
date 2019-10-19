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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
</head>
<body>
<div class="sidenav">
		 <a href="home.html"	target="main"><i class="fa fa-fw fa-home"></i>		Home</a>
		<a href="addDrug.php" target="main"><i class="fas fa-tablets"></i>			Add Drugs</a>
		<a href="viewDrugs.php" target="main"><i class="fas fa-pills"></i>			View Drug</a>
		<a href="searchDrug.php" target="main"><i class="fas fa-search"></i>		Search Drug</a>
		<a href="#"><i class="fas fa-capsules"></i>		Issue Drugs</a>
		<div class="dropdown">
					<button class="drop-btn" ><i class="fas fa-user-edit"></i>			Update Suppliers</button>
					<div class="dropdown-content">
						<a href="addSupplier.php" target="main"><i class="fas fa-user-plus"></i>			Add Supplier</a>
						<a href="removeSupplier.php" target="main"><i class="fas fa-user-minus"></i>			remove Supplier</a>
					</div>
					</div>	
				<br><br>
				<a href="viewSupplier.php" target="main"><i class="fas fa-user-friends"></i>			View Suppliers</a>
				<div class="dropdown">
					<button class="drop-btn" ><i class="fas fa-angle-double-up"></i>			Update Brand</button>
					<div class="dropdown-content">
						<a href="#" target="main"><i class="fas fa-plus-circle"></i>			Add Brand</a>
						<a href="##" target="main"><i class="fas fa-minus-circle"></i>			Remove Brand</a>
					</div>
				</div>	
				<br><br>
		<a href="#"><i class="fas fa-envelope-open"></i>			Recieve Approvle not.</a>
	</div>
</body>
</html>