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
	<frameset rows="15%,92%" border="0px">
  		<frame src="top.php" border="0px">
  			<frameset cols="23%,80%" border="-5px">
    			<frame src="sidebarOwner.php" border="-5px">
          <frame src="home.html" name="main" border="-5px">
  			</frameset>
	</frameset>
</head>
<body>

</body>
</html>