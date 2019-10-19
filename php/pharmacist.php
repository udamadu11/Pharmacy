<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

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
	<frameset rows="15%,92%" border="0 px">
  		<frame src="top.php" border="0 px">
  			<frameset cols="23%,86%" border="-3px">
    			<frame src="sidebarPharmacist.php" border="-3px">
          <frame src="home.html" name="main" border="-3px">
  			</frameset>
	</frameset>
</head>
<body>

</body>
</html>