<?php 
include ('include/connection.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Remove Supplier</title>
	<link rel="stylesheet" type="text/css" href="../css/removeSupplier.css">
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
		<th>Remove</th>
	</tr>
	<?php 
		$sql = "SELECT * FROM supplier";
		$result = $con->query($sql);
		if($result-> num_rows > 0){
			while ($row = $result-> fetch_assoc()) {
				echo "<tr>
					<td>".$row['supplier_id']."</td>
					<td>".$row['supplier_name']."</td>
					<td>".$row['location']."</td>
					<td>".$row['email']."</td>
					<td>".$row['contact_no']."</td>
					<td>".$row['credit_period_allowed']."</td>
					<td>
						<form method=\"post\" action=\"removeSupplier.php\">
						<input type=\"hidden\" name=\"delete\" value=".$row['supplier_id'].">
						<input type=\"submit\" name=\"submit\" class=\"remove\" value=\"Delete\">
						</form>
					</td>
				</tr>
		";
				}	
		} 
		if (isset($_POST['submit'])) {
		$d_id = $_POST['delete'];
		$delete_query ="DELETE FROM supplier WHERE supplier_id = '$d_id' ";
		$delete_result = mysqli_query($con,$delete_query);
		}
		$con->close();	
	?>
</body>
</html>