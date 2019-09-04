<?php 
include('include/connection.php');
if(isset($_POST['approve'])){ 

		$select = "SELECT * FROM tem";
		$result1 = $con->query($select);
			
		$supplier_id = $_POST['supplier_id'];
		$supplier_name = $_POST['supplier_name'];
		$location = $_POST['location'];
		$email = $_POST['email'];
		$contact_no = $_POST['contact_no'];
		$credit_period_allowed = $_POST['credit_period_allowed'];

		$sql = "INSERT INTO supplier (supplier_id,supplier_name,location,email,contact_no,credit_period_allowed) VALUES ('$supplier_id','$supplier_name','$location','$email','$contact_no','$credit_period_allowed')";
		$result = mysqli_query($con, $sql);


		$delete_query ="DELETE FROM tem WHERE supplier_id = '$s_id' ";
		$delete_result = mysqli_query($con,$delete_query);


	}

?>