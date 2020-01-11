<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

<?php
    //Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['u_name']) || $_SESSION['type'] != '2'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<frameset rows="8%,92%" border="0">
  		<frame src="top.php" border="0">
  			<frameset cols="14%,86%" border="0">
    			<frame src="sidebarPharmacist.php" border="0">
          <frame src="pharmacistDashboard.php" name="main" border="0">
  			</frameset>
	</frameset>
</head>
<body>

</body>
</html>