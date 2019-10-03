<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>View Employee</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 50px;">
		<table class="table table-hover">
	<tr class="table-info">
		<th>Id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>User Name</th>
		<th>Email</th>
		<th>Telephone</th>
		<th>Nic</th>
	</tr>
	<?php
		$sql = "SELECT * FROM employee";
		$result = mysqli_query($con,$sql);
		if ($result -> num_rows > 0) {
			while ($row = $result -> fetch_assoc()) {
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