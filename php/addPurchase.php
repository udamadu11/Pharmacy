<?php include('include/connection.php'); ?><!-- Include database connection -->
<?php include('include/session.php');
	//Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '2'){
       header("Location:login.php");
       exit();
       }
 ?><!-- Include session -->
<?php 
	if(isset($_POST['submit'])){ 

		$supplier_id=$_POST['supplier_id'];
		$date= date("Y-m-d H:i:s");
		$invoice=$_POST['invoice'];
		
		//insert purchasing data to the table
		$sql = "INSERT INTO purchase (supplier_id,date,invoice) VALUES ('$supplier_id','$date','$invoice')";
		//performs a query on the database
		mysqli_query($con, $sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Purchase</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form class="form-3" method="post" style="margin-top: 100px;">
		<img src="../img/shopping-cart.png">
		<h2>Add Purchase</h2>
		<div class="input_field-3">
				
				<p>Supplier</p>
				<select name="supplier_id">
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
				
				<p>Price</p>
				<input type="text" class="input-2" name="invoice" id="invoice" placeholder="Enter the Invoice price">
				
		</div>
		<input type="submit" name="submit" value="Add Purchase" class="btn-4">
	</form>
</body>
</html>