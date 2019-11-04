<?php include('include/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Low drug List</title>
</head>
<body>
<?php 
	$sql = "SELECT drug.drug_id,drug.drug_name,drug.reorder_level, stock.current_stock FROM drug INNER JOIN stock ON drug.drug_id = stock.drug_id";
	$query= mysqli_query($con,$sql);
	echo "
				<table>
							<tr>
									<th>Drug Id</th>
									<th>Drug Name</th>
									<th>Reoder Level</th>
									<th>Current Stock</th>
							</tr>

	";
	if (mysqli_num_rows($query) > 0) {
			while($row = mysqli_fetch_assoc($query)){
							echo "
						
							<tr>
									<td>".$row['drug_id']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['reorder_level']."</td>
									<td>".$row['current_stock']."</td>
							</tr>";
						}
				}	
?>
</table>
</body>
</html>
