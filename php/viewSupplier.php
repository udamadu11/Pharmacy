<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/viewSupplier.css">
</head>
<body> 
	<table>
		<tr>
			<th>Supplier Id</th>
			<th>Supplier Name</th>
			<th>Location</th>
			<th>Email</th>
			<th>Contact No</th>
			<th>Credit Period</th>
		</tr>
		<?php
		$sql = "SELECT * FROM supplier";
		$result = mysqli_query($con,$sql);
		if ($result -> num_rows > 0) {
			while ($row = $result -> fetch_assoc()) {
				echo "
			<tr>
				<td>".$row['supplier_id']."</td>
				<td>".$row['supplier_name']."</td>
				<td>".$row['location']."</td>
				<td>".$row['email']."</td>
				<td>".$row['contact_no']."</td>
				<td>".$row['credit_period_allowed']."</td>
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