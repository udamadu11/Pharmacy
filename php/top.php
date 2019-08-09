<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/header.css">
</head>
<body>
	<div class="topnav">
		<img src="../img/logo.png">
		<h4>PHARMA-PRO</h4>	

		<?php  
			checkSession();
			if(isset($_SESSION['u_name'])){
				//owner
				if("{$_SESSION['type']}" == '1'){
					echo "<a href =\"logout.php\" target=\"_top\">Log Out</a>";
					echo "<p>You are Logged in as ". $_SESSION['u_name'] ."</p>";
					
				}
				//pharmacist
				if("{$_SESSION['type']}" == '2'){
					echo "<a href =\"logout.php\" target=\"_top\">Log Out</a>";
					echo "<p>You are Logged in as ". $_SESSION['u_name'] ."</p>";
					
				}
				//storekeeper
				if("{$_SESSION['type']}" == '3'){
					echo "<a href =\"logout.php\" target=\"_top\">Log Out</a>";
					echo "<p>You are Logged in as ". $_SESSION['u_name'] ."</p>";
				}
				//admin
				if("{$_SESSION['type']}" == '4'){
					echo "<a href =\"logout.php\" target=\"_top\">Log Out</a>";
					echo "<p>You are Logged in as ". $_SESSION['u_name'] ."</p>";
				}

			}
			else{
				echo "<a href=\"login.php\">Login</a>";
			}


		?>
		

	</div>

</body>
</html>