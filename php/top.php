<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="topnav">
		<img src="../img/logo.png">
		<h4>PHARMA-PRO</h4>	

		<?php  
			checkSession();
			if(isset($_SESSION['u_name'])){
				//owner
				$u_name = $_SESSION['u_name'];
				if("{$_SESSION['type']}" == '1'){
					echo "<form method=\"post\" action=\"logout.php\">
								<a href =\"logout.php\" target=\"_top\" name=\"logout\">Log Out</a>
						</form>";
					//echo "<a href =\"logout.php\" target=\"_top\">Log Out</a>";
					echo "<p>You are Logged in as ". $_SESSION['u_name'] ."</p>";	
				}
				//pharmacist
				if("{$_SESSION['type']}" == '2'){
					echo "<form method=\"post\" action=\"logout.php\">
								<a href =\"logout.php\" target=\"_top\" name=\"logout\">Log Out</a>
						</form>";
					echo "<p>You are Logged in as ". $_SESSION['u_name'] ."</p>";	
				}
				//storekeeper
				if("{$_SESSION['type']}" == '3'){
					echo "<form method=\"post\" action=\"logout.php\">
								<a href =\"logout.php\" target=\"_top\" name=\"logout\">Log Out</a>
						</form>";
				
					echo "<p>You are Logged in as ". $_SESSION['u_name'] ."</p>";	
				}
				//admin
				if("{$_SESSION['type']}" == '4'){
					echo "<form method=\"post\" action=\"logout.php\">
								<a href =\"logout.php\" target=\"_top\" name=\"logout\">Log Out</a>
						</form>";
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