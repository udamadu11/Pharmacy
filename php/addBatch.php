<?php require_once('include/connection.php') ?>
<?php 
	if (isset($_POST['submit'])) {
	$batch_no = $_POST['batch_no'];
	$drug_name = $_POST['drug_name'];
	$brand = $_POST['brand'];
	$quantity_box = $_POST['quantity_box'];
	$no_of_boxes = $_POST['no_of_boxes'];
	$manu_date = $_POST['manu_date'];
	$ex_date = $_POST['ex_date'];
	$sales_value = $_POST['sales_value'];
	$supplier_id = $_POST['supplier_id'];

	$sql = "INSERT INTO batch(batch_no,drug_name,brand,quantity_box,no_of_boxes,manu_date,ex_date,sales_value,supplier_id) VALUES('$batch_no','$drug_name','$brand','$quantity_box','$no_of_boxes','$manu_date','$ex_date','$sales_value','$supplier_id')";
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
		<p>Batch no</p>
		<input type="text" name="batch_no">
		<p>Drug Name</p>
		<input type="text" name="drug_name">
		<p>Brand</p>
		<input type="text" name="brand">
		<p>Quantity Box</p>
		<input type="number" name="quantity_box">
		<p>NO of boxes</p>
		<input type="number" name="no_of_boxes">
		<p>Manufacturing Date</p>
		<input type="date" name="manu_date">
		<p>Expiry Date</p>
		<input type="date" name="ex_date">
		<p>value</p>
		<input type="number" name="sales_value">
		<p>Supplier Id</p>
		<input type="text" name="supplier_id">
	</div>
		<input type="submit" name="submit" value="Add">
		<input type="reset" name="reset" value="reset">
	
	</form>
</body>
</html>