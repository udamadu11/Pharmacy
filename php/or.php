<?php 
include('include/connection.php');

// if (isset($_POST['create'])) {
// 	$invoice = $_POST['invoice'];
// 	$date = $_POST['date'];
// 	$supplier = $_POST['supplier'];

// 	$sub_total = 0;
// 	for ($j=0; $j < $item_no; $j++) { 
// 		$drug_name = $_POST['item'.$j];
		$date = date('Y-H-S');
// 		$price = $_POST['price'.$j];
// 		$qty = $_POST['quantity'.$j];
// 		$total = $price * $qty;
// 		$supplier = $_POST['supplier'];
// 		$sub_total = $sub_total + $total;
// 		$sql = "INSERT INTO purchase_item (supplier,drug_name,pdate,price,qty,total) VALUES ('$supplier','$drug_name','$date','$price','$qty','$total')";
//     	mysqli_query($con, $sql);
//     	$sql2 = "INSERT INTO purchase_temp (supplier,invoice,drug_name,pdate,price,qty,total) VALUES ('$supplier','$invoice','$drug_name','$date','$price','$qty','$total')";
//     	mysqli_query($con, $sql2);
// 	}

// 	$insert = "INSERT INTO porder(pdate,supplier,item_no,invoice,sub_total) VALUES ('$date','$supplier','$item_no','$invoice','$sub_total');";
// 	$ins = mysqli_query($con,$insert);

// 	 header("location:purchaseLetter.php");
// }
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
                <input type="text" name="invoice" id="invoice" class="form-control">
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
			<table class="table table-hover">
				<?php 
							echo "<tr>
								<form method=\"post\">
							 <td>";
							$result = mysqli_query($con, "SELECT supplier.supplier_id,supplier.supplier_name, drug.drug_id,drug.drug_name,drug.price  FROM supplier INNER JOIN drug ON supplier.supplier_id = drug.supplier_id AND supplier.supplier_id = '$supplier';");
							echo "<select name = 'drug_name' class = 'form-control'>";
							while($row = mysqli_fetch_assoc($result)){
								echo " <option value = '".$row['drug_name']."'> ".$row['drug_name']."</option>";
							}
							echo "
							</select>
							</td> ";
							echo"<td> <input type='number' min='1' name='quantity' class = 'form-control'>
                  				<td><input type=\"submit\" value=\"Add\" name=\"add\" class=\"btn btn-info\"></td>
                  				</form>
							";
						
					?>
			</table>
	</div>
</form>
</div>
</body>
</html>