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
	<title>Chat Room</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container" style="margin-top: 75px;">
		<div class="row">
			<div class="col-md-3 col-xs-12 left-sidebar">
				<div class="input-group searchbox">
					<center>
						<button class="btn btn-info">All Users</button>
					</center>
				</div>
			</div>
			<div class="left-chat">
				<ul>
					<?php ?>
				</ul>
			</div>
		</div>
		<div class="col-md-9 col-xm-9 col-xs-12 right-sidebar">
			<div class="row">
				<?php 
					$user = $_SESSION['u_name'];
					$get_user = "SELECT * FROM employee WHERE u_name = '$user'";
					$result = mysqli_query($con,$get_user);
					$row = mysqli_fetch_array($result);
					$user_id = $row['id'];
					$u_name = $row['u_name'];
				?>
				<?php 
					if (isset($_GET['u_name'])) {
						global $con;
						$get_username = $_GET['u_name'];
						$get_user = "SELECT * FROM employee WHERE u_name= '$get_username'";
						$rUser = mysqli_query($con,$get_user);
						$row_user = mysqli_fetch_array($rUser);

						$username =$row_user['u_name'];
						
					}

				?>
			</div>
		</div>
	</div>
</body>
</html>