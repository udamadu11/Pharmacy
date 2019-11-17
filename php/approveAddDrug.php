<?php require_once('include/connection.php'); ?><!-- include database connection -->
<?php require_once('include/session.php'); ?><!-- include sessions -->
<!DOCTYPE html>
<html> 
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="margin-top: 100px">
		<table class="table">
		<tr>
			<th>Drug Id</th>
			<th>Drug Name</th>
			<th>Category</th>
			<th>Reoder Level</th>
			<th>Supplier Id</th>
			<th>Price</th>
			<th>Brand</th>
			<th></th>
			<th></th>
		</tr>
		<?php
			$sql = "SELECT * FROM tem3";
			$result = $con->query($sql);//Perform query
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
							<td>
								<form method=\"post\">
									<input type=\"hidden\" value=".$row['drug_id']." name=\"approveDrug\">
									<input class=\"btn btn-primary\" type=\"submit\" name=\"approve\" value=\"Approve\">
								</form>
							</td>
							<td>
								<form method=\"post\">
									<input type=\"hidden\" value=".$row['drug_id']." name=\"declineDrug\">
									<input class=\"btn btn-danger\" type=\"submit\" name=\"decline\" value=\"Decline\">
								</form>
							</td>
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
<?php 
include('include/connection.php');
if(isset($_POST['approve'])){ 

		$drug_id = $_POST['approveDrug'];
		//Select Query from tem3 table using drug id
		$select = "SELECT * FROM tem3 WHERE drug_id = '$drug_id'";
		//Perform Query
		$result1 = $con->query($select);
		
		if (mysqli_num_rows($result1) > 0) {//Return the number of rows in result set
		while ($row = mysqli_fetch_assoc($result1)) {//Fetch a result row as an associative array

		$drug_id=$row['drug_id'];
		$drug_name=$row['drug_name'];
		$brand=$row['brand'];
		$category=$row['category'];
		$supplier_id=$row['supplier_id'];
		$reorder_level=$row['reorder_level'];
		$price=$row['price'];

		//Insert Query to drug table
		$sql = "INSERT INTO drug (drug_id,drug_name,brand,category,supplier_id,reorder_level,price) VALUES ('$drug_id','$drug_name','$brand','$category','$supplier_id','$reorder_level','$price')";
		$result = mysqli_query($con, $sql);

		//Delete Query from tem3 table
		$delete_query ="DELETE FROM tem3 WHERE drug_id = '$drug_id' ";
		$delete_result = mysqli_query($con,$delete_query);
		if ($delete_query) {
			echo "<script>alert('Approve Successfully..')</script>";
			echo "<script>window.open('approveAddDrug.php','_self')</script>";
		}
	}
	}
}
if (isset($_POST['decline'])) {
	$drug_id = $_POST['declineDrug'];
	//Delete drug data from tem3 table by drug id
	$delete_query ="DELETE FROM tem3 WHERE drug_id = '$drug_id' ";
	$delete_result = mysqli_query($con,$delete_query);

	if ($delete_result) {
			echo "<script>alert('Decline Successfully..')</script>";
			echo "<script>window.open('approveAddDrug.php','_self')</script>";
		}
	
	}


?>