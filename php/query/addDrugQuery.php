<?php include('../include/connection.php'); ?><!-- Include database connection -->
<?php include('../include/session.php'); ?><!-- Include session -->
<?php 
	if(isset($_POST['submit'])){ 
		
		$drug_id=$_POST['drug_id'];
		$drug_name=$_POST['drug_name'];
		$brand=$_POST['brand'];
		$category=$_POST['category'];
		$supplier_id=$_POST['supplier_id'];
		$reorder_level=$_POST['reorder_level'];
		$price=$_POST['price'];
		
		//Insert temporary table to approve from owner
		$sql = "INSERT INTO tem3 (drug_id,drug_name,brand,category,supplier_id,reorder_level,price) VALUES ('$drug_id','$drug_name','$brand','$category','$supplier_id','$reorder_level','$price')";

		//performs a query on the database
		$result = mysqli_query($con, $sql);

		//if inserting , this system send notification to owner for appoving
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
				echo "<script>window.open('../view/addDrug.php','_self')</script>";
			}
			else{
				echo "<script>alert('Error.')</script>";
				echo "<script>window.open('../view/addDrug.php','_self')</script>";
			}
			
    		
		}
	}
?>