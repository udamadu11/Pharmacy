<?php 
if(isset($_POST['submit'])){ 
		$supplier_id = $_POST['supplier_id'];
		$supplier_name = $_POST['supplier_name'];
		$location = $_POST['location'];
		$email = $_POST['email'];
		$contact_no = $_POST['contact_no'];
		$credit_period_allowed = $_POST['credit_period_allowed'];

		$sql = "INSERT INTO supplier (supplier_id,supplier_name,location,email,contact_no,credit_period_allowed) VALUES ('$supplier_id','$supplier_name','$location','$email','$contact_no','$credit_period_allowed')";
		$result = mysqli_query($con, $sql);
	}

?>