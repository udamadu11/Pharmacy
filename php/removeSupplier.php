<?php 
include ('include/connection.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Remove Supplier</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
<table class="table">
	<tr>
		<th>Supplier Id</th>
		<th>Supplier Name</th>
		<th>Location</th>
		<th>Email</th>
		<th>Contact No</th>
		<th>Credit Period</th>
		<th>Edit</th>
		<th>Remove</th>
		
	</tr>
	<?php 
		$sql = "SELECT * FROM supplier";
		$result = $con->query($sql);
		if($result-> num_rows > 0){
			while ($row = $result-> fetch_assoc()) {
				echo "<tr>
					<td>".$row['supplier_id']."</td>
					<td>".$row['supplier_name']."</td>
					<td>".$row['location']."</td>
					<td>".$row['email']."</td>
					<td>".$row['contact_no']."</td>
					<td>".$row['credit_period_allowed']."</td>
					<td>
						<form method=\"post\" action=\"editSupplier.php\">
						<input type=\"hidden\" name=\"edit\" value=".$row['supplier_id'].">
						<input type=\"submit\" name=\"submit1\" class=\"btn btn-primary\" value=\"Edit\" style=\"width:70px;\">
						</form>
					</td>
					<td>
						<form method=\"post\">
						<input type=\"hidden\" name=\"delete\" value=".$row['supplier_id'].">
						<input type=\"submit\" name=\"submit2\" class=\"btn btn-danger\" value=\"Delete\">
						</form>
					</td>
				</tr>
		";
				}	
		} 
	

		
		if(isset($_POST['submit2'])){ 

		$supplier_id = $_POST['delete'];
		$select = "SELECT * FROM supplier WHERE supplier_id = '$supplier_id'";
		$result1 = $con->query($select);
		
		if (mysqli_num_rows($result1) > 0) {
		while ($row = mysqli_fetch_assoc($result1)) {

		$supplier_id = $row['supplier_id'];
		$supplier_name = $row['supplier_name'];
		$location = $row['location'];
		$email = $row['email'];
		$contact_no = $row['contact_no'];
		$credit_period_allowed = $row['credit_period_allowed'];

		$sql = "INSERT INTO tem2 (supplier_id,supplier_name,location,email,contact_no,credit_period_allowed) VALUES ('$supplier_id','$supplier_name','$location','$email','$contact_no','$credit_period_allowed')";
		$result = mysqli_query($con, $sql);

		if($result){
			$to = "udaramadumalka3@gmail.com";
			$subject = "Notification of PHARMA-PRO To REMOVE SUPPLIER";
			$message = "<a href='http://localhost/approvalList.php'>Approval for Request</a>";

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$headers .= 'From: <udaramadumalka3@gmail.com>' . "\r\n";
			$mail = mail($to,$subject,$message,$headers);
			if ($mail) {
				echo "<script>alert('Thank You..!..We have sent an email with a confirmation link to your Requesting.')</script>";
			}
			else{
				echo "<script>alert('Error.')</script>";
			}
			
    		
		}

		
	}
	}
}
	


	?>
	</div>
</body>
</html>