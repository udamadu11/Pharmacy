<?php 
include('include/connection.php');
if (isset($_POST['generate'])) {
	$invoice = $_POST['invoice'];
	$date = $_POST['date'];
	$supplier = $_POST['supplier'];
	$item_no = $_POST['item'];
}
if (isset($_POST['create'])) {
	$drug_name = $_POST['drug_name'];
	$date = $_POST['date'];
	$price = $_POST['price'];
	$qty = $_POST['quantity'];
	$total = $price * $qty;

	$sql = "INSERT INTO purchase_item (drug_name,pdate,price,qty,total) VALUES ('$drug_name','$date','$price','$qty','$total')";
    mysqli_query($con, $sql);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Purchase Order Generation</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top: 100px;">
	<div class="alert alert-info" role="alert" style="text-align: center;">
		<h2>Purchase Order Generation</h2>
	</div>
	<hr>
	<form method="post">
		<div class="row">
		<div class="col-3">Invoice number</div>
            <div class="col-9">
                <input type="text" name="invoice" id="invoice" value = "<?php echo $invoice;?>" class="form-control" readonly>
           </div>
		</div>
		<br>
		<div class="row">
			<div class="col-3">Date</div>
	            <div class="col-9">
	                <input type="date" name="date" id="date" value = "<?php echo $date;?>" class="form-control" readonly>
	           </div>
		</div>
		<br>
		<div class="row">
			<div class="col-3">Supplier</div>
	            <div class="col-9">
	                <input type="text" name="supplier" id="supplier" value = "<?php echo $supplier;?>" class="form-control" readonly>
	           </div>
		</div>
		<br>
		<div class="row">
			<div class="col-3">No of Item</div>
	            <div class="col-9">
	                <input type="number" name="item" id="item" value = "<?php echo $item_no;?>" class="form-control" readonly>
	           </div>
		</div>
		<br>
		<div class="row">
			<table class="table table-hover">
				<tr>
					<th>Drug Name</th>
					<th>Price</th>
					<th>Quantity</th>
				</tr>
					<?php 
						$search_id = "SELECT supplier.supplier_id,supplier.supplier_name, drug.drug_id,drug.drug_name,drug.price  FROM supplier INNER JOIN drug ON supplier.supplier_id = drug.supplier_id AND supplier.supplier_id = '$supplier'";
						$query= mysqli_query($con,$search_id);
						if (mysqli_num_rows($query) > 0) {
						while($row = mysqli_fetch_assoc($query)){
							echo "<tr>
									<td>".$row['drug_name']."</td>
									<td>".$row['price']."</td>
									<td>
										<div class=\"form-group\">
											<input type=\"hidden\" value=".$row['drug_name']." name=\"drug_name\">
										<input type=\"hidden\" value=".$row['price']." name=\"price\">
	    									<input type=\"number\" class=\"form-control\"  placeholder=\"Add Drug Quantity\" name=\"quantity\" min=\"1\">
	 									</div>
	 								</td>
								</tr>";
						}
}
					?>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="create" value="Create" class="btn btn-primary btn-lg btn-block"></td>
				</tr>
			</table>
		</div>
	</form>
	
</div>
</body>
</html>