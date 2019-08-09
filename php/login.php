<?php include('include/connection.php') ?>
<?php include('include/session.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<div class="wrapper">

		<div class="top">
			<img src="../img/logo.png">
			<h1>PHARMA-PRO</h1>
		</div>
		<form action="loginform.php" method="post">
		<div class="login-form">
			<div class="title">
				<h1>Login Here</h1>
			</div>

			<div class="login-section">
				<div class="input-fields">
					<img src="../img/man-user.png">
					<input type="text" class="input" name="name" id="name" placeholder="Enter name">
				</div>
				<div class="input-fields">
					<img src="../img/lock.png">
					<input type="password" class="input" id="password" name="password" placeholder="Enter password">
				</div>

					<input type="submit" name="submit" value="Login">

			</div>
		</div>
		</form>

		<footer class="footer">
        <h1>developed by <b>Team</b></h1>
    	</footer>

	</div>
	<div class="bg"></div>
   		<div class="bg2"></div>
</body>
</html>