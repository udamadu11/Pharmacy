<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>View Employee</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="margin-top: 50px;">
		<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>User Name</th>
		<th>Email</th>
		<th>Telephone</th>
		<th>Nic</th>
	</tr>
	<?php
		//retrive all the data from employee table
		$sql = "SELECT * FROM employee";
		//Performs a query on Database
		$result = mysqli_query($con,$sql);

		if ($result -> num_rows > 0) {//Return the number of rows in result set
			while ($row = $result -> fetch_assoc()) { //Fetch a result row as an associative array
				echo "
			<tr>
				<td>".$row['id']."</td>
				<td>".$row['f_name']."</td>
				<td>".$row['l_name']."</td>
				<td>".$row['u_name']."</td>
				<td>".$row['email']."</td>
				<td>".$row['telephone']."</td>
				<td>".$row['nic']."</td>
			</tr>
		";
			}
		echo "</table>";
		}
		else{
			echo "Result 0";
		}
		$con ->close();
		

	?>
</table>
	</div>

</body>
</html>