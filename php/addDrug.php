<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<?php 
	if(isset($_POST['submit'])){ 
		$drug_id=$_POST['drug_id'];
		$drug_name=$_POST['drug_name'];
		$category=$_POST['category'];
		$reorder_level=$_POST['reorder_level'];
		$supplier_id=$_POST['supplier_id'];
		$price=$_POST['price'];
		$brand=$_POST['brand'];

		$sql = "INSERT INTO drug (drug_id,drug_name,category,reorder_level,supplier_id,price,brand) VALUES ('$drug_id','$drug_name','$category','$reorder_level','$supplier_id','$price','$brand')";
		mysqli_query($con, $sql);
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
		<!--<img src="../img/pharmacist.png">-->
		<h2>Add Drug</h2>
		<div class="input_fields">
				<p>Drug Id</p>
				<input type="text" class="input" name="drug_id" id="drug_id" placeholder="Enter Drug Id">
				<p>Drug Name</p>
				<input type="text" class="input" name="drug_name" id="drug_name" placeholder="Enter Drug Name">
				<p>Category</p>
				<input type="text" class="input" name="category" id="category" placeholder="Enter  Category Name">
				<p>Reorder Level</p>
				<input type="text" class="input" name="reorder_level" id="reorder_level" placeholder="Enter Reorder level">
				<p>Supplier Id</p>
				<input type="text" class="input" name="supplier_id" id="supplier_id" placeholder="Enter Supplier id">
				<p>Price</p>
				<input type="text" class="input" name="price" id="price" placeholder="Enter the Price">
				<p>Brand</p>
				<input type="text" class="input" name="brand" id="brand" placeholder="Enter the Brand Name">
		</div>
		<input type="submit" name="submit" value="Add Drug">
	</form>
</body>
</html>