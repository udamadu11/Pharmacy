<?php 
include ('include/connection.php');
	if (isset($_POST['btn'])) {

		
		
		$sql = "INSERT INTO invoice_item(drug_id,drug_name,price,qty,total)SELECT drug_id,drug_name,price,qty,total FROM invoice_temp";
		$query = mysqli_query($con,$sql);
	}
	

?>