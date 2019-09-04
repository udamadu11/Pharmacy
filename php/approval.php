<?php 
include('include/connection.php');
if(isset($_POST['approve'])){ 

		$supplier_id = $_POST['approval'];
		$select = "SELECT * FROM tem WHERE supplier_id = '$supplier_id'";
		$result1 = $con->query($select);
		
		if (mysqli_num_rows($result1) > 0) {
		while ($row = mysqli_fetch_assoc($result1)) {

		$supplier_id = $row['supplier_id'];
		$supplier_name = $row['supplier_name'];
		$location = $row['location'];
		$email = $row['email'];
		$contact_no = $row['contact_no'];
		$credit_period_allowed = $row['credit_period_allowed'];

		$sql = "INSERT INTO supplier (supplier_id,supplier_name,location,email,contact_no,credit_period_allowed) VALUES ('$supplier_id','$supplier_name','$location','$email','$contact_no','$credit_period_allowed')";
		$result = mysqli_query($con, $sql);

		
		$delete_query ="DELETE FROM tem WHERE supplier_id = '$supplier_id' ";
		$delete_result = mysqli_query($con,$delete_query);
		$massage = base64_encode(urlencode("Confirmation Successfully"));
		header('Location:approvalList.php?msg=' .$massage);
		exit();
	}
	}
}

	if (isset($_POST['decline'])) {
	$s_id = $_POST['approval2'];
	$delete_query ="DELETE FROM tem WHERE supplier_id = '$s_id' ";
	$delete_result = mysqli_query($con,$delete_query);

	$massage = base64_encode(urlencode("Decline Successfully"));
	header('Location:approvalList.php?msg=' .$massage);
	exit();
	}


?>