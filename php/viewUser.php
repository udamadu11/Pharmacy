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
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/viewUser.css">
</head>
<body>
	<table>
		<tr>
			<th>id</th>
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