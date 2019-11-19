<?php include('include/connection.php'); ?><!-- include database connection -->
<?php include('include/session.php'); ?><!-- include session -->
<?php 
	if(isset($_POST['submit'])){ 
		$supplier_name = $_POST['supplier_name'];
		$location = $_POST['location'];
		$email = $_POST['email'];
		$contact_no = $_POST['contact_no'];
		$credit_period_allowed = $_POST['credit_period_allowed'];
		//insert supplier data to temparary table to approving from owner 
		$sql = "INSERT INTO tem (supplier_name,location,email,contact_no,credit_period_allowed) VALUES ('$supplier_name','$location','$email','$contact_no','$credit_period_allowed')";
		//performs a query on the table
		$result = mysqli_query($con, $sql);
		//send notification here for approving supplier data to owner
		if($result){
			$to = "udaramadumalka3@gmail.com";
			$subject = "NOTIFICATION OF PHARMA-PRO TO ADD SUPPLIERS";
			$message = "<a href='http://localhost/Pharmacy/php/approvalList.php'>Approval for Request</a>";
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
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="form-4">
	<form  method="post">
		<img src="../img/pharmacist.png">
		<h2>Add Supplier</h2>
		<div class="input_field-4">
				<p>Supplier Name</p>
				<input type="text" class="input-3" name="supplier_name" id="supplier_name" placeholder="Enter Supplier Name" required>
				<p>Location</p>
				<input type="text" class="input-3" name="location" id="location" placeholder="Enter  Location" required>
				<p>Email</p>
				<input type="email" class="input-3" name="email" id="email" placeholder="Enter the Email" required>
				<p>Contact No :</p>
				<input type="number" class="input-3" name="contact_no" id="contact_no" placeholder="Enter the Contact" title="The Valid Number" required>
				<p>Credit Period</p>
				<input type="number"  class="input-3" name="credit_period_allowed" id="credit_period_allowed" placeholder="Enter the credit Period" required>
		</div>
		<input type="submit" name="submit" value="Add Supplier" class="btn-5">
	</form>
</div>
</body>
</html>