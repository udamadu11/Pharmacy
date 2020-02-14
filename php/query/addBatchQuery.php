<?php require_once('../include/connection.php'); ?><!-- include database connection -->
<?php 
	if (isset($_POST['submit'])) {
	$batch_no = $_POST['batch_no'];
	$purchase_id = $_POST['purchase_id'];
	$drug_id = $_POST['drug_id'];
	$drug_name = $_POST['drug_name'];
	$brand = $_POST['brand'];
	$no_of_boxes = $_POST['no_of_boxes'];
	$quantity_box = $_POST['quantity_box'];
	$ex_date = $_POST['ex_date'];
	$available_quantity = $quantity_box * $no_of_boxes;

	//Insert query to batch table to add batch data
	$sql = "INSERT INTO batch(batch_no,purchase_id,drug_id,drug_name,brand,no_of_boxes,quantity_box,ex_date,available_quantity) VALUES('$batch_no','$purchase_id','$drug_id','$drug_name','$brand','$no_of_boxes','$quantity_box','$ex_date','$available_quantity')";

	//Performs a query on Database
	$result = mysqli_query($con,$sql);

	//after inserting to batch , updating stock here...
	if ($result) {
	$sql2 = "SELECT * FROM drug WHERE drug_id = '$drug_id'";
	$result2 = mysqli_query($con,$sql2);
	$rows = mysqli_fetch_array($result2);
	$category = $rows['category'];
	$price = $rows['price'];

	//Insert query to add batch data to stock
	$sql3 = "INSERT INTO stock(drug_id,drug_name,price,category) VALUES('$drug_id','$drug_name','$price','$category')";
	$result3 = mysqli_query($con,$sql3);
	
	}
	
	//Select Available Quantity from batch using drug id
	$sql4 = "SELECT available_quantity FROM batch WHERE drug_id = '$drug_id'";
	$result4 = mysqli_query($con,$sql4);

	//Get All Available Quantity to $array Variable
	$array = array();
	while ($data = mysqli_fetch_assoc($result4)) {
		$array[] = $data;
	}
	//Get all total quantity Value   
	$total = 0;
	foreach ($array as $arr1) {
		$total = $total + $arr1['available_quantity'];
	}
	//Update query of updating current stock using drug id
 	$sql5 = "UPDATE stock SET current_stock = '$total' WHERE drug_id = '$drug_id'";
	$result5 = mysqli_query($con,$sql5);
	if ($result5) {
		echo "<script>alert('Add new Stock SuccessFully')</script>";
		echo "<script>window.open('../view/addBatch.php','_self')</script>";
	}
	}
?>