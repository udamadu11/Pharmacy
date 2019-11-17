<?php include('include/connection.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Users</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
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
				//Retrive employee table data
					$sql = "SELECT * FROM employee";
					//Performs query on database
					$result = mysqli_query($con,$sql);
					//Return number of result in result set
					if ($result -> num_rows > 0) {
					//Fetch a result row as an associative array
					while ($row = $result -> fetch_assoc()) {
						//Display employee table data to update
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