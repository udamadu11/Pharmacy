<?php include('include/connection.php'); ?>
<?php include('include/session.php'); ?>
<?php 
	if(isset($_POST['submit'])){ 
		$supplier_id = $_POST['supplier_id'];
		$supplier_name = $_POST['supplier_name'];
		$location = $_POST['location'];
		$email = $_POST['email'];
		$contact_no = $_POST['contact_no'];
		$credit_period_allowed = $_POST['credit_period_allowed'];

		$sql = "INSERT INTO tem (supplier_id,supplier_name,location,email,contact_no,credit_period_allowed) VALUES ('$supplier_id','$supplier_name','$location','$email','$contact_no','$credit_period_allowed')";
		$result = mysqli_query($con, $sql);
		if($result){
			$to = $email;
			$subject = "Notification of PHARMA-PRO";
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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Supplier</title>
	<link rel="stylesheet" type="text/css" href="../css/addSupplier.css">
</head>
<body>
	<div class="addSupplier">
		<h3 class="error-msg"><?php include('include/message.php'); ?></h3>
	<form  method="post">
		<img src="../img/pharmacist.png">
		<h2>Add Supplier</h2>
		<div class="input_fields">
				<p>Supplier Id</p>
				<input type="text" class="input" name="supplier_id" id="supplier_id" placeholder="Enter Supplier Id">
				<p>Supplier Name</p>
				<input type="text" class="input" name="supplier_name" id="supplier_name" placeholder="Enter Supplier Name">
				<p>Location</p>
				<input type="text" class="input" name="location" id="location" placeholder="Enter  Location">
				<p>Email</p>
				<input type="email" class="input" name="email" id="email" placeholder="Enter the Email">
				<p>Contact No :</p>
				<input type="number" class="input" name="contact_no" id="contact_no" placeholder="Enter the Contact">
				<p>Credit Period</p>
				<input type="datetime-local" value="2000-01-01T00:00:00" class="input" name="credit_period_allowed" id="credit_period_allowed" placeholder="Enter the credit Period">
		</div>
		<input type="submit" name="submit" value="Add Supplier">
	</form>
</div>
</body>
</html>
