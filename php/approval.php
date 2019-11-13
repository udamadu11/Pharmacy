<?php 
include('include/connection.php');// include database connection
if(isset($_POST['approve'])){ 

		$supplier_id = $_POST['approval'];

		//select tem table data using supplier id
		$select = "SELECT * FROM tem WHERE supplier_id = '$supplier_id'";
		$result1 = $con->query($select);
		
		if (mysqli_num_rows($result1) > 0) { //Return the number of rows in result set
		while ($row = mysqli_fetch_assoc($result1)) {//Fetch a result row as an associative array

		$supplier_id = $row['supplier_id'];
		$supplier_name = $row['supplier_name'];
		$location = $row['location'];
		$email = $row['email'];
		$contact_no = $row['contact_no'];
		$credit_period_allowed = $row['credit_period_allowed'];

		//If approve , insert supplier data to supplier table 
		$sql = "INSERT INTO supplier (supplier_id,supplier_name,location,email,contact_no,credit_period_allowed) VALUES ('$supplier_id','$supplier_name','$location','$email','$contact_no','$credit_period_allowed')";
		$result = mysqli_query($con, $sql);

		//Delete that data from tem table,after approving
		$delete_query ="DELETE FROM tem WHERE supplier_id = '$supplier_id' ";
		$delete_result = mysqli_query($con,$delete_query);

		//Display successfully message
		$massage = base64_encode(urlencode("Confirmation Successfully"));
		header('Location:approvalList.php?msg=' .$massage);
		exit();
	}
	}
}
	//If decline , delete data from tem table
	if (isset($_POST['decline'])) {
	$s_id = $_POST['approval2'];
	$delete_query ="DELETE FROM tem WHERE supplier_id = '$s_id' ";
	$delete_result = mysqli_query($con,$delete_query);

	//Display successfully message
	$massage = base64_encode(urlencode("Decline Successfully"));
	header('Location:approvalList.php?msg=' .$massage);
	exit();
	}


?>