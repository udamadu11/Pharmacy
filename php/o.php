<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Purchase Order</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top: 100px;box-shadow: 0 0 15px 0 lightgrey;padding: 10px 10px;">
	<div class="alert alert-info" role="alert" style="text-align: center;">
		<h2>Purchase Order Generation</h2>
	</div>
	<div class="col-md-6" style="margin-left: 300px;">
		<form method="post" action="or.php">
			<label>Invoice No: </label>
			<input type="number" name="invoice" id="invoice" class="form-control">
			<label>Date</label>
			<input type="date" name="date" id="date" class="form-control">
			<label>Supplier</label>
			<select class="form-control" name="supplier">
				<?php 
					$supplier = "SELECT * FROM supplier";
					$result = mysqli_query($con,$supplier);
					while($row = mysqli_fetch_assoc($result)){
						$supplier_id = $row['supplier_id'];
						$supplier_name = $row['supplier_name'];
						echo '<option value='.$supplier_id.'>'.$supplier_name.'</option>';
					}
				?>
			</select>
			<div style="margin-top: 20px;">
				<input type="submit" name="generate" id="generate" onclick='generate()' value="Generate" class="btn btn-info" style="margin-left: 100px;width: 100px;">
				<input type="reset" name="reset" value="reset" class="btn btn-danger" style="margin-left: 100px;width: 100px;">
			</div>
		</form>
	</div>
</div>
</body>
</html>