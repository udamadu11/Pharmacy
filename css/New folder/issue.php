<?php 
include ('include/connection.php');
	if (isset($_POST['btn'])) {

		$sql = "SELECT * FROM invoice_temp";
		$res = mysqli_query($con,$sql);
		
		while($row=mysqli_fetch_array($res)){
			$id = $row['id'];
			$drug_id = $row['drug_id'];
			$drug_name = $row['drug_name'];
			$price = $row['price'];
			$qty = $row['qty'];
			$tot = $row['total'];

			$sq = "INSERT INTO invoice_items(id,drug_id,drug_name,price,qty,total)VALUES('$id','$drug_id','$drug_name','$price','$qty','$tot')";
		$query = mysqli_query($con,$sq);
			
		}
	}
	

?>
