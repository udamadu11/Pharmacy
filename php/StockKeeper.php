<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

<?php
    //Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '3'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/StockKeeper.css">
	<frameset rows="16%,92%" border="-1px">
  		<frame src="top.php" border="-1px">
  			<frameset cols="20%,86%" border="-5px">
    			<frame src="sidebarStockkeeper.php" border="-5px">
    			<frame src="home.html" name="main" border="-5px">
  			</frameset>
	</frameset>

<body>	
</body>
</html>