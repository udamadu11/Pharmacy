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
		$supplier = $_POST['supplier'];
		$sql = "INSERT INTO purchase_item (supplier,drug_name,pdate,qty) VALUES ('$supplier','$drug_name','$date','$qty')";
    	mysqli_query($con, $sql);
    	$sql2 = "INSERT INTO purchase_temp (supplier,invoice,drug_name,pdate,qty) VALUES ('$supplier','$invoice','$drug_name','$date','$qty')";
    	mysqli_query($con, $sql2);
	}

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
			<div class="alert alert-info" role="alert" style="font-weight:bold;font-size: 24px;">
  		<center>List of Low Drugs</center>
		</div>
		<table class="table table-hover">
							<tr>
									<th>Drug Id</th>
									<th>Drug Name</th>
									<th>supplier Id</th>
									<th>Reoder Level</th>
									<th>Current Stock</th>
							</tr>
<?php 
	//Retrive data from drug table and stock table using inner join
	$sql = "SELECT drug.drug_id,drug.drug_name,drug.supplier_id,drug.reorder_level, stock.current_stock FROM drug INNER JOIN stock ON drug.drug_id = stock.drug_id WHERE drug.supplier_id = '$supplier'";
	//Performs a query on databse
	$query= mysqli_query($con,$sql);
	//Return number of rows in result set
	if (mysqli_num_rows($query) > 0) {
	//Fetch result row as an associative array
	while($row = mysqli_fetch_assoc($query)){
	$drugId = $row['drug_id'];
	$drugName = $row['drug_name'];
	$reoderLevel = $row['reorder_level'];
	$currentStock = $row['current_stock'];

	//if current stock less than or equal to reorder level generate alert  
	if ($currentStock <= $reoderLevel) {
		echo "
					<tr>
									<td>".$row['drug_id']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['supplier_id']."</td>
									<td>".$row['reorder_level']."</td>
									<td>".$row['current_stock']."</td>
							</tr>
					</div>
				";
	}
}
}
?>
</table>
	<div class="alert alert-info" role="alert" style="text-align: center;">
		<h2>Purchase Order Generation</h2>
	</div>
	<hr>
	<form method="post">
		<div class="row">
		<div class="col-3">P/O</div>
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
							echo"
							<td> <input type='number' min='1' name='quantity".$i."' class = 'form-control'></td>
                  
							";
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