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
			<h3 class="error-msg"><?php include('include/message.php'); ?></h3>
			<div class="login-section">
			<img src="../img/man-user.png">
				<div class="input-fields">
				<input type="text" class="input" name="name" id="name" placeholder="Enter name" required>
				</div></div>
				<div class="login-section">
				<img src="../img/lock.png">
				<div class="input-fields">
					<input type="password" class="input" id="password" name="password" placeholder="Enter password" required>
				</div>
					</div>
				<input type="submit" name="submit" value="Login">
					</div>
		</form>

		

	</div>
	<div class="bg"></div>
   		<div class="bg2"></div>
</body>
</html>