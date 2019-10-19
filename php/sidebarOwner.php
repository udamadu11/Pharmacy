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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
</head>
<body>
<div class="sidenav">
	    <a href="home.html"	target="main"><i class="fa fa-fw fa-home"></i>		Home</a>
		<a href="viewDrugs.php"	target="main"><i class="fas fa-tablets"></i>	View drugs</a>
		<a href="viewSupplier.php"	target="main"><i class="fas fa-user-friends"></i>	View Suppliers</a>
		<a href="#"><i class="far fa-envelope"></i>		Credit periods notification</a>
		<a href="#"><i class="fas fa-file"></i>		View Reports</a>
		<a href="#"><i class="fas fa-list-alt"></i>		Approval list</a>
		<a href="viewEmployee.php" target="main"><i class="fas fa-user-edit"></i>		View Employee Details</a>
	</div>
</body>
</html>