<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<!DOCTYPE html>
<html> 
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/viewDrugs.css">
</head>
<body>
	<table>
		<tr>
			<th>Drug Id</th>
			<th>Drug Name</th>
			<th>Category</th>
			<th>Reoder Level</th>
			<th>Supplier Id</th>
			<th>Price</th>
			<th>Brand</th>
		</tr>
<?php
	$sql = "SELECT drug_id,drug_name,category,reorder_level,supplier_id,price,brand FROM drug";
	$result = $con->query($sql);
	if($result-> num_rows > 0 ){
		while ($row = $result-> fetch_assoc()){
			echo "<tr>
					<td>".$row['drug_id']."</td>
					<td>".$row['drug_name']."</td>
					<td>".$row['category']."</td>
					<td>".$row['reorder_level']."</td>
					<td>".$row['supplier_id']."</td>
					<td>".$row['price']."</td>
					<td>".$row['brand']."</td>
				</tr>";
		}
	echo "</table";
	}
	else{
		echo "0 result";
	}
	$con->close();
?>		

	</table>

</body>
</html>