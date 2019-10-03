<?php include('include/connection.php'); ?>
<?php include('include/session.php'); ?>
<?php 
	if(isset($_POST['submit'])){ 
		
		$drug_id=$_POST['drug_id'];
		$drug_name=$_POST['drug_name'];
		$brand=$_POST['brand'];
		$category=$_POST['category'];
		$supplier_id=$_POST['supplier_id'];
		$reorder_level=$_POST['reorder_level'];
		$price=$_POST['price'];
		

		$sql = "INSERT INTO drug (drug_id,drug_name,brand,category,supplier_id,reorder_level,price) VALUES ('$drug_id','$drug_name','$brand','$category','$supplier_id','$reorder_level','$price')";
		$result = mysqli_query($con, $sql);

		if ($result) {
			$sql2 = "INSERT INTO stock (drug_id,drug_name,price,category) VALUES ('$drug_id','$drug_name','$price','$category')";
			$result2 = mysqli_query($con, $sql2);
		}
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Drug</title>
	<link rel="stylesheet" type="text/css" href="../css/addDrug.css">
</head>
<body>
	<form class="addDrug" method="post">
		<img src="../img/pharmacist.png">
		<h2>Add Drug</h2>
		<div class="input_fields">
				
				<p>Drug Id</p>
				<input type="number" class="input" name="drug_id" id="drug_id" placeholder="Enter Drug Id">

				<p>Drug Name</p>
				<input type="text" class="input" name="drug_name" id="drug_name" placeholder="Enter Drug Name">

				<p>Brand</p>
				<input type="text" class="input" name="brand" id="brand" placeholder="Enter the Brand Name">

				<p>Category</p>
				<input type="text" class="input" name="category" id="category" placeholder="Enter  Category Name">

				<p>Supplier Id</p>
				<select class="form-control" name="supplier_id">
						<?php
							include ('include/connection.php');
							$sqlSupplier = "SELECT * FROM supplier";
							$resultSupplier = mysqli_query($con,$sqlSupplier);
							while ($row = mysqli_fetch_array($resultSupplier)) {
							$sName = $row['supplier_name'];
							$sid = $row['supplier_id'];
							echo '<option value="'.$sid.'">'.$sName.'</option>';
						}
					?>
						
				</select>

				<p>Reorder Level</p>
				<input type="number" class="input" name="reorder_level" id="reorder_level" placeholder="Enter Reorder level">
				
				<p>Price</p>
				<input type="number" class="input" name="price" id="price" placeholder="Enter the Price">
				
		</div>
		<input type="submit" name="submit" value="Add Drug">
	</form>
</body>
</html>