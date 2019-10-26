<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<!DOCTYPE html>
<html> 
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 50px">
		<table class="table">
		<tr>
			<th>Drug Id</th>
			<th>Drug Name</th>
			<th>Category</th>
			<th>Reoder Level</th>
			<th>Supplier Id</th>
			<th>Price</th>
			<th>Brand</th>
			<th>Remove</th>
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
							<td>
								<form method=\"post\">
								<input type=\"hidden\" name=\"remove\" value=".$row['drug_id'].">
								<input type=\"submit\" name=\"removeDrug\" value=\"Remove\" class=\"btn btn-danger\">
								</form>
							</td>
						</tr>";
				}
			echo "</table";
			}
			else{
				echo "0 result";
			}
			

			if (isset($_POST['removeDrug'])) {
				$drug_id = $_POST['remove'];
				$query = "DELETE  FROM drug WHERE drug_id = '$drug_id'";
				$resultQuery = mysqli_query($con,$query);
				if ($resultQuery) {
				 	echo "<script>alert('Remove Successfully..')</script>";
				 	echo "<script>window.open('updateDrug.php','_self')</script>";
				 } 
			}
		?>		

	</table>
	</div>
</body>
</html>