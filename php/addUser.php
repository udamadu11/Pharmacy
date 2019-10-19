<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<?php 

	$errors = array('f_name'=>'', 'l_name'=>'', 'u_name'=>'', 'email'=>'', 'telephone'=>'', 'nic'=>'', 'password'=>'', 'type'=>'');

	if(isset($_POST['submit'])){ 
		$f_name=$_POST['f_name'];
		$l_name=$_POST['l_name'];
		$u_name=$_POST['u_name'];
		$email=$_POST['email'];
		$telephone=$_POST['telephone'];
		$nic=$_POST['nic'];
		$password=$_POST['password'];
		$type=$_POST['type'];

		if (empty($_POST['f_name'])||empty($_POST['l_name'])||empty($_POST['u_name'])||empty($_POST['email'])||empty($_POST['telephone'])||empty($_POST['nic'])||empty($_POST['password'])||empty($_POST['type'])) {
			
			//check first Name:
		if (empty($_POST['f_name'])) {
			$errors['f_name'] = 'First Name is Required';
		}

		// check Last name:
		if (empty($_POST['l_name'])) {
			$errors['l_name'] = 'Last Name is Required';
		}

		//check User name:
		if (empty($_POST['u_name'])) {
			$errors['u_name'] = 'User Name is Required';
		}

		//check an email
		if (empty($_POST['email'])) {
			$errors['email'] = 'An Email is Required';
		}else{
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = 'An Email Must Be Valid Email Address';
			}
		}

		//check telephone number:
		if (empty($_POST['telephone'])) {
			$errors['telephone'] = 'Telephone number is Required';
		}

		//check nic
		if (empty($_POST['nic'])) {
			$errors['nic'] = 'National Identity Number is Required';
		}

		//check password
		if (empty($_POST['password'])) {
			$errors['password'] = 'Password is Required';
		}

		// check type:
		if (empty($_POST['type'])) {
			$errors['type'] = 'Type is Required';
		}
		}

		else{
			$sql = "INSERT INTO employee (f_name,l_name,u_name,email,telephone,nic,password,type) VALUES ('$f_name','$l_name','$u_name','$email','$telephone','$nic','$password','$type')";
				mysqli_query($con, $sql);
			$massage = base64_encode(urlencode("Successfully Added"));
			header('Location:addUser.php?msg=' .$massage);
			exit();
		}
		
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
		<h3 class="error-msg"><?php include('include/message.php'); ?></h3>
		<h2>Add User</h2>
		<div class="input_fields">
				<p>First Name</p>
				<input type="text" class="input" name="f_name" id="f_name" placeholder="Enter First Name">
				<div class="redText"> <?php echo $errors['f_name']; ?>	</div>
				<p>Last Name</p>
				<input type="text" class="input" name="l_name" id="l_name" placeholder="Enter Last Name">
				<div class="redText"> <?php echo $errors['l_name']; ?>	</div>
				<p>User Name</p>
				<input type="text" class="input" name="u_name" id="u_name" placeholder="Enter User Name">
				<div class="redText"> <?php echo $errors['u_name']; ?>	</div>
				<p>Email</p>
				<input type="text" class="input" name="email" id="email" placeholder="Enter Email">
				<div class="redText"> <?php echo $errors['email']; ?>	</div>
				<p>Telephone</p>
				<input type="number" class="input" name="telephone" id="telephone" placeholder="Enter Telephone Number">
				<div class="redText"> <?php echo $errors['telephone']; ?>	</div>
				<p>Nic</p>
				<input type="text" class="input" name="nic" id="nic" placeholder="Enter the Nic Number">
				<div class="redText"> <?php echo $errors['nic']; ?>	</div>
				<p>Password</p>
				<input type="password" class="input" name="password" id="password" placeholder="Enter Password">
				<div class="redText"> <?php echo $errors['password']; ?>	</div>
				<p>type</p>
				<input type="number" class="input" name="type" id="type" placeholder="Enter Type">
				<div class="redText"> <?php echo $errors['type']; ?>	</div>
		</div>
		<input type="submit" name="submit" value="Add User">
	</form>
</body>
</html>