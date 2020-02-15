<!DOCTYPE html>
<html>
<head>
	<title>Get Order</title>
</head>
<body>
	<?php
		include('include/connection.php'); 
		$supplier = "SELECT * FROM supplier";
		$supplier_result = mysqli_query($con,$supplier);
		$supplierInfo = array();
		if(mysqli_num_rows($supplier_result) > 0){
			while($rows = mysqli_fetch_assoc($supplier_result)){
				$supplierInfo[] = $rows['supplier_name']; 
			}
		}
		foreach($supplierInfo as $sup){
			echo $sup."<br/>";
		}
	?>
</body>
</html>