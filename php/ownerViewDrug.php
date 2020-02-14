<!DOCTYPE html>
<html>
<head>
	<title>View Drug Owner</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<table class="table table-hover" style="margin-top: 100px;">
			<tr>
				<td>Drug Name</td>
				<td>Brand</td>
				<td>Category</td>
				<td>Supplier_id</td>
				<td>Reorder Level</td>
				<td>Price</td>
			</tr>
			<?php
				include('include/connection.php');
				$select = "SELECT * FROM drug";
				$result = mysqli_query($con,$select);
				if($result-> num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "
						<tr>
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
							<td>
								<form method=\"post\" action=\"editDrug.php\">
								<input type=\"hidden\" name=\"edit\" value=".$row['drug_id']."> 
								<input type=\"submit\" name=\"editDrug\" value=\"Edit\" class=\"btn btn-info\" style=\"width:100px;\">
								</form>
							</td>
							<tr>
						";
					}
					echo "</table>";
					echo "<hr  style=\"margin-top:50px;\">";
					echo"<a href=\"ownerViewAddDrug.php\"><button class=\"btn btn-success\" style=\"margin-left:935px;\">Add New Drug</button></a>";
				}
			 ?>
		</table>
	</div>
</body>
</html>
<?php
	
	if(isset($_POST['removeDrug'])){ 
	$d_id = $_POST['remove'];
	//Delete Data from employee table by id After clicking delete button
	$delete_query ="DELETE FROM drug WHERE drug_id = '$d_id' ";
	$delete_result = mysqli_query($con,$delete_query);
	if ($delete_result) {
		//after performs a query on database get alet 
		echo "<script>alert('Successfuly Removed...')</script>";
            echo "<script>window.open('ownerViewDrug.php','_self')</script>";
		}
	}


?>