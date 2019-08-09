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
	<frameset rows="8%,92%" border="-5px">
  		<frame src="top.php" border="-5px">
  			<frameset cols="14%,86%" border="-5px">
    			<frame src="sidebarPharmacist.php" border="-5px">
          <frame src="addDrug.php" name="main" border="-5px">
  			</frameset>
	</frameset>
</head>
<body>

</body>
</html>