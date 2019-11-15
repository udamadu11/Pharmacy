<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<!DOCTYPE html>
<html> 
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="margin-top: 50px">
		<table class="table table-hover">
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
			//retrive all the data from drug table
			$sql = "SELECT drug_id,drug_name,category,reorder_level,supplier_id,price,brand FROM drug";

			//Performs a query on Database
			$result = $con->query($sql);

			if($result-> num_rows > 0 ){//Return the number of rows in result set
				while ($row = $result-> fetch_assoc()){//Fetch a result row as an associative array
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
			$con->close();
		?>		

	</table>
	</div>
</body>
</html>