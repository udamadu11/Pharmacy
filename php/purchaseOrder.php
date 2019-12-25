<?php 
include('include/connection.php');
if (isset($_POST['generate'])) {
	$invoice = $_POST['invoice'];
	$date = $_POST['date'];
	$supplier = $_POST['supplier'];
	$item_no = $_POST['item'];
}
if (isset($_POST['create'])) {
	$invoice = $_POST['invoice'];
	$date = $_POST['date'];
	$supplier = $_POST['supplier'];
	$item_no = $_POST['item'];
	$sub_total = 0;
	for ($j=0; $j < $item_no; $j++) { 
		$drug_name = $_POST['item'.$j];
		$date = $_POST['date'];
		$price = $_POST['price'.$j];
		$qty = $_POST['quantity'.$j];
		$total = $price * $qty;
		$supplier = $_POST['supplier'];
		$sub_total = $sub_total + $total;
		$sql = "INSERT INTO purchase_item (supplier,drug_name,pdate,price,qty,total) VALUES ('$supplier','$drug_name','$date','$price','$qty','$total')";
    	mysqli_query($con, $sql);
    	$sql2 = "INSERT INTO purchase_temp (supplier,drug_name,pdate,price,qty,total) VALUES ('$supplier','$drug_name','$date','$price','$qty','$total')";
    	mysqli_query($con, $sql2);
	}

	$insert = "INSERT INTO porder(pdate,supplier,item_no,invoice,sub_total) VALUES ('$date','$supplier','$item_no','$invoice','$sub_total');";
	mysqli_query($con,$insert);

	 header("location:purchaseLetter.php");
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
						for ($i=0; $i < $item_no; $i++) { 
							echo "<tr> <td>";
							$result = mysqli_query($con, "SELECT supplier.supplier_id,supplier.supplier_name, drug.drug_id,drug.drug_name,drug.price  FROM supplier INNER JOIN drug ON supplier.supplier_id = drug.supplier_id AND supplier.supplier_id = '$supplier';");
							echo "<select name = 'item".$i."' class = 'form-control'>";
							while($row = mysqli_fetch_assoc($result)){
								echo " <option value = '".$row['drug_name']."'> ".$row['drug_name']."</option>";
							}
							echo "
							</select>
							</td> ";
							echo "<td><select name = 'price".$i."' class = 'form-control'>";
							$result1 = mysqli_query($con, "SELECT supplier.supplier_id,supplier.supplier_name, drug.drug_id,drug.drug_name,drug.price  FROM supplier INNER JOIN drug ON supplier.supplier_id = drug.supplier_id AND supplier.supplier_id = '$supplier';");
							while($row1 = mysqli_fetch_assoc($result1)){
								echo " <option value = '".$row1['price']."'> ".$row1['price']."</option>";
							}
							echo"
							</td></select><td> <input type='number' min='1' name='quantity".$i."' class = 'form-control'>
                  
							";
						}
					?>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="create" value="Create" class="btn btn-primary btn-lg btn-block"></td>
				</tr>
			</table>
	<?php 
	if (isset($_POST['btn'])) {
		$drug_id = $_POST['drug_id'];
		$drug_name = $_POST['drug_name'];
		$price = $_POST['price'];
		$pdate = $_POST['pdate'];
		$supplier_id = $_POST['supplier_id'];
	}

	?>
</div>
</body>
</html>