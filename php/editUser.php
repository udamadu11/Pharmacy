<?php include('include/connection.php') ?>
<?php include('include/session.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Users</title>
	<link rel="stylesheet" type="text/css" href="../css/editUser.css">
</head>
<body>
<table>
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
			<th>Edit</th>
		</tr>
		<?php
			$sql = "SELECT * FROM employee";
			$result = mysqli_query($con,$sql);

			if ($result -> num_rows > 0) {
			while ($row = $result -> fetch_assoc()) {
					echo "<tr>
							<td>".$row['id']."</td>
							<td>".$row['f_name']."</td>
							<td>".$row['l_name']."</td>
							<td>".$row['u_name']."</td>
							<td>".$row['email']."</td>
							<td>".$row['tp']."</td>
							<td>".$row['nic']."</td>
							<td>".$row['password']."</td>
							<td>".$row['type']."</td>
							<td>
								<form method=\"post\" class=\"edit\" action=\"editUserNew.php\">
									<input type=\"hidden\" value=".$row['id']." name=\"edit\">
									<input class=\"btn\" type=\"submit\" name=\"submit\" value=\"Edit\">
								</form>

							</td>
						</tr>
					";
				}
				echo "</table";
			}
			else{
				echo "0 result";
			}
			$con ->close();
		?>

	</table>
</body>
</html>