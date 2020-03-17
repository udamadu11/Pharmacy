<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<?php 

	

	if(isset($_POST['submit'])){ 
		$f_name=$_POST['f_name'];
		$l_name=$_POST['l_name'];
		$u_name=$_POST['u_name'];
		$email=$_POST['email'];
		$telephone=$_POST['telephone'];
		$nic=$_POST['nic'];
		$password=$_POST['password'];
		$type=$_POST['type'];
		$passwordHash= md5($password);
	
			//Insert Query of users add
			$sql = "INSERT INTO employee (f_name,l_name,u_name,email,telephone,nic,password,type) VALUES ('$f_name','$l_name','$u_name','$email','$telephone','$nic','$passwordHash','$type')";
			$sqlResult = mysqli_query($con, $sql);
			//$massage = base64_encode(urlencode("Successfully Added"));
			//header('Location:addUser.php?msg=' .$massage);
			if ($sqlResult) {
			echo "<script>alert('Successfuly Added...')</script>";
           	echo "<script>window.open('AddUser.php','_self')</script>";
			}
			exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form class="form-1" method="post">
		<h3 class="error-msg"><?php include('include/message.php'); ?></h3> 
		<h2>Add User</h2>
		<div class="input_field-5">
				<p>First Name</p>
				<input type="text" class="input-4" name="f_name" id="f_name" placeholder="Enter First Name" required>
				<p>Last Name</p>
				<input type="text" class="input-4" name="l_name" id="l_name" placeholder="Enter Last Name" required>
				<p>User Name</p>
				<input type="text" class="input-4" name="u_name" id="u_name" placeholder="Enter User Name" required>
				<p>Email</p>
				<input type="email" class="input-4" name="email" id="email" placeholder="Enter Email" required>
				<p>Telephone</p>
				<input type="number" class="input-4" name="telephone" id="telephone" placeholder="Enter Telephone Number" required>
				<p>Nic</p>
				<input type="text" class="input-4" name="nic" id="nic" placeholder="Enter the Nic Number" required>
				<p>Password</p>
				<input type="password" class="input-4" name="password" id="password" placeholder="Enter Password" required>
				<p>type</p>
				<input type="number" class="input-4" name="type" id="type" placeholder="Enter Type" required>
		</div>
		<input type="submit" name="submit" value="Add User" class="btn-5">
	</form>
</body>
</html>