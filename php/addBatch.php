<?php require_once('include/connection.php') ?>
<?php 
	if (isset($_POST['submit'])) {
	$drug_id = $_POST['drug_id'];
	$purchase_id = $_POST['purchase_id'];
	$drug_name = $_POST['drug_name'];
	$quantity_box = $_POST['quantity_box'];
	$no_of_boxes = $_POST['no_of_boxes'];
	$manu_date = $_POST['manu_date'];
	$ex_date = $_POST['ex_date'];
	$sales_value = $_POST['sales_value'];
	$available_quantity = $quantity_box * $no_of_boxes;

	$sql = "INSERT INTO batch(drug_id,purchase_id,drug_name,quantity_box,no_of_boxes,manu_date,ex_date,sales_value,available_quantity) VALUES('$drug_id','$purchase_id','$drug_name','$quantity_box','$no_of_boxes','$manu_date','$ex_date','$sales_value','$available_quantity')";
	mysqli_query($con,$sql);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add batch</title>
	<link rel="stylesheet" type="text/css" href="../css/addBatch.css">
</head>
<body>
	<form class="addBatch" method="post">
		<h2>Add Batch</h2>
	<div class="input-field">
		<p>Drug Id</p>
		<input type="text" name="drug_id">
		<p>Purchase Id</p>
		<input type="text" name="purchase_id">
		<p>Drug Name</p>
		<input type="text" name="drug_name">
		<p>Quantity Box</p>
		<input type="number" name="quantity_box">
		<p>NO of Boxes</p>
		<input type="number" name="no_of_boxes">
		<p>Manufacturing Date</p>
		<input type="date" name="manu_date">
		<p>Expiry Date</p>
		<input type="date" name="ex_date">
		<p>value</p>
		<input type="number" name="sales_value">
	</div>
		<input type="submit" name="submit" value="Add">
		<input type="reset" name="reset" value="reset">
	
	</form>
</body>
</html>