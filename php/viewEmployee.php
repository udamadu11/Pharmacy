<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>View Employee</title>
	<link rel="stylesheet" type="text/css" href="../css/viewEmployee.css">
</head>
<body>
<table>
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
				<td>".$row['tp']."</td>
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
</body>
</html>