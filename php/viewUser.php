<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

<?php
    //Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '4'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Users</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
	<table class="table table-hover">
		<tr>
			<th>Id</th>
			<th>F_Name</th>
			<th>L_Name</th>
			<th>U_Name</th>
			<th>Email</th>
			<th>Telephone</th>
			<th>Nic</th>
			<th>Password</th>
			<th>Type</th>
		</tr>
		<?php
			//retrive all the data from employee table
			$sql = "SELECT * FROM employee"; 
			//Performs a query on Database
			$result = mysqli_query($con,$sql);

			if ($result -> num_rows > 0) { //Return the number of rows in result set
			while ($row = $result -> fetch_assoc()) { //Fetch a result row as an associative array
					echo "<tr>
							<td>".$row['id']."</td>
							<td>".$row['f_name']."</td>
							<td>".$row['l_name']."</td>
							<td>".$row['u_name']."</td>
							<td>".$row['email']."</td>
							<td>".$row['telephone']."</td>
							<td>".$row['nic']."</td>
							<td>".$row['password']."</td>
							<td>".$row['type']."</td>
						</tr>
					";
				}
				echo "</table";
			}
			$con ->close();
		?>

	</table>
</div>
</body>
</html>