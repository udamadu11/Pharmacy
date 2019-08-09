<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<?php 

	if (isset($_POST['submit'])) {
		
		$name = $_POST['name'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM employee WHERE u_name='$name' AND password='$password'";
		
		$res = mysqli_query($con, $sql);

		if (mysqli_num_rows($res) == 1) {
			$row = mysqli_fetch_array($res);

			//creating session
			checkSession();
			$_SESSION["u_name"] = $row['u_name'];
			$_SESSION["id"] = $row['id'];
			$_SESSION["type"] = $row['type'];

			$type = $row['type'];
			
			if($type == '1'){
				header("Location: owner.php");
			}
			elseif($type == '2'){
				header("Location: pharmacist.php");
			}
			elseif($type == '3'){
				header("Location: stockkeeper.php");
			}
			elseif($type == '4'){
				header("Location: admin.php");
			}
		}
		else{
			header("Location: login.php");
			exit();
		}

	}
	mysqli_close($con);
?>