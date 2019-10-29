<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Approval list..</title>
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
			<th>Approve</th>
			<th>Decline</th>
		</tr>
		<?php
			$sql = "SELECT * FROM tem4";
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
								<input type=\"submit\" name=\"removeDrug\" value=\"Approve\" class=\"btn btn-primary\">
								</form>
							</td>
							<td>
								<form method=\"post\">
								<input type=\"hidden\" name=\"remove1\" value=".$row['drug_id'].">
								<input type=\"submit\" name=\"notRemoveDrug\" value=\"Decline\" class=\"btn btn-danger\">
								</form>
							</td>
						</tr>";
				}
			echo "</table";
			}
			else{
				echo "0 result";
			}
		?>		

	</table>
	</div>
</body>
</html>
<?php 
if (isset($_POST['removeDrug'])) {
	$drug_id = $_POST['remove'];
	$delete_query ="DELETE FROM tem4 WHERE drug_id = '$drug_id' ";
	$delete_result = mysqli_query($con,$delete_query);

	$delete_query2 ="DELETE FROM drug WHERE drug_id = '$drug_id' ";
	$delete_result2 = mysqli_query($con,$delete_query2);

	if ($delete_result2) {
			echo "<script>alert('Approval Successfully..')</script>";
			echo "<script>window.open('approveRemoveDrug.php','_self')</script>";
		}
	
	}
if (isset($_POST['notRemoveDrug'])) {
	$id = $_POST['remove1'];
	$no_query ="DELETE FROM tem4 WHERE drug_id = '$id' ";
	$no_result = mysqli_query($con,$no_query);
	if ($no_result) {
			echo "<script>alert('Decline approval Successfully..')</script>";
			echo "<script>window.open('approveRemoveDrug.php','_self')</script>";
		}
}

?>
