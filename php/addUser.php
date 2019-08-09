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

		$sql = "INSERT INTO employee (f_name,l_name,u_name,email,telephone,nic,password,type) VALUES ('$f_name','$l_name','$u_name','$email','$telephone','$nic','$password','$type')";
		mysqli_query($con, $sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" type="text/css" href="../css/addUser.css">
</head>
<body>
	<form class="addUser" method="post">
		<h2>Add User</h2>
		<div class="input_fields">
				<p>First Name</p>
				<input type="text" class="input" name="f_name" id="f_name" placeholder="Enter First Name">
				<p>Last Name</p>
				<input type="text" class="input" name="l_name" id="l_name" placeholder="Enter Last Name">
				<p>User Name</p>
				<input type="text" class="input" name="u_name" id="u_name" placeholder="Enter User Name">
				<p>Email</p>
				<input type="text" class="input" name="email" id="email" placeholder="Enter Email">
				<p>Telephone</p>
				<input type="number" class="input" name="telephone" id="telephone" placeholder="Enter Telephone Number">
				<p>Nic</p>
				<input type="text" class="input" name="nic" id="nic" placeholder="Enter the Nic Number">
				<p>Password</p>
				<input type="password" class="input" name="password" id="password" placeholder="Enter Password">
				<p>type</p>
				<input type="number" class="input" name="type" id="type" placeholder="Enter Type">
		</div>
		<input type="submit" name="submit" value="Add User">
	</form>
</body>
</html>