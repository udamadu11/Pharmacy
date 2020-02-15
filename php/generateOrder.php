<!DOCTYPE html>
<html>
<head>
	<title>Generate Order</title>
</head>
<body>
<?php 
	include('include/connection.php');
	if(isset($_POST['order'])){
		$drug_id = $_POST['drug_id'];
		$supplier_id = $_POST['supplier_id'];

		$supplier = "SELECT * FROM supplier WHERE supplier_id = '$supplier_id'";
		$supplier_result = mysqli_query($con,$supplier);
		if(mysqli_num_rows($supplier_result) > 0){
			while($row = mysqli_fetch_assoc($supplier_result)){
				$supplier_name = $row['supplier_name'];
			}
		}

		$sql = "CREATE TABLE IF NOT EXISTS `".$supplier_name."`(
					id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					supplier_id INT(11) UNSIGNED,
					item_no INT(11) UNSIGNED,
					drug_name VARCHAR(50) NOT NULL,
					category VARCHAR(50) NOT NULL,
					email VARCHAR(50),
					order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
					quantity INT(50) UNSIGNED,
					invoice INT(50) UNSIGNED,
					sub_total INT(100) UNSIGNED
		)";
		$result = mysqli_query($con,$sql);
		if($result){
			echo "<script>window.open('lowDrugList.php','_self')</script>";
		}else{
			echo "<script>alert('Allraedy exist)</script>";
			echo "<script>window.open('lowDrugList.php','_self')</script>";	
		}
	}

	
?>
</body>
</html>