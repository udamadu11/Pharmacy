<?php  include ('include/connection.php');?><!-- include database connection -->
<!DOCTYPE html>
<html>
<head>
	<title>Remove Supplier</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="margin-top: 50px;">
		<div class="alert alert-info" role="alert" style="font-weight:bold;font-size: 24px;">
  		<center>List of Supplier</center>
		</div>
		<hr  style="margin-top:10px;">
		<a href="addSupplier.php"><button class="btn btn-success" style="margin-left:935px;">Add New Supplier</button></a>
		<hr  style="margin-top:10px;">
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
		//Retrive Data from supplier table
		$sql = "SELECT * FROM supplier";
		//Performs query on database
		$result = $con->query($sql);
		if($result-> num_rows > 0){//Return the number of rows in result set
			while ($row = $result-> fetch_assoc()) {//Fetch a result row as an associative array
				//Show Supplier data as table with edit and delte button
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
						<input type=\"submit\" name=\"submit1\" class=\"btn btn-primary\" value=\"Edit\" style=\"width:100px;\">
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
	
		echo "</table>";
		
		if(isset($_POST['submit2'])){ 

		$supplier_id = $_POST['delete'];
		//Select Data from supplier table by supplier id
		$select = "SELECT * FROM supplier WHERE supplier_id = '$supplier_id'";
		//Performs query on databse
		$result1 = $con->query($select);
		
		if (mysqli_num_rows($result1) > 0) {//Return number of rows in result set
		while ($row = mysqli_fetch_assoc($result1)) {//Fetch result row as an associative array

		$supplier_id = $row['supplier_id'];
		$supplier_name = $row['supplier_name'];
		$location = $row['location'];
		$email = $row['email'];
		$contact_no = $row['contact_no'];
		$credit_period_allowed = $row['credit_period_allowed'];
		//Insert supllier data to temporary table to approve for delete
		$sql = "INSERT INTO tem2 (supplier_id,supplier_name,location,email,contact_no,credit_period_allowed) VALUES ('$supplier_id','$supplier_name','$location','$email','$contact_no','$credit_period_allowed')";
		//performs a query on database
		$result = mysqli_query($con, $sql);

		if($result){
			//if performs a query on database , send message to owner 
			$to = "udaramadumalka3@gmail.com";
			$subject = "Notification of PHARMA-PRO To REMOVE SUPPLIER";
			$message = "<a href='http://localhost/approvalList.php'>Approval for Request</a>";

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$headers .= 'From: <udaramadumalka3@gmail.com>' . "\r\n";
			$mail = mail($to,$subject,$message,$headers) or die("Your message was not sent");;
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