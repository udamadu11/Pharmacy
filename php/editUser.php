<?php include('include/connection.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<table class="table">
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
									<td>".$row['telephone']."</td>
									<td>".$row['nic']."</td>
									<td>".$row['password']."</td>
									<td>".$row['type']."</td>
									<td>
										<form method=\"post\" action=\"editUserNew.php\">
											<input type=\"hidden\" value=".$row['id']." name=\"edit\">
											<input class=\"btn btn-info\" type=\"submit\" name=\"submit\" value=\"Edit\">
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
		</div>
	</body>
	</html>