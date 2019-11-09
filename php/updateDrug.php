<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<!DOCTYPE html>
<html> 
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="margin-top: 50px">
		<table class="table">
		<tr>
			<th>Drug Id</th>
			<th>Drug Name</th>
			<th>Category</th>
			<th>Reoder Level</th>
			<th>Supplier Id</th>
			<th>Price</th>
			<th>Brand</th>
			<th>Remove</th>
		</tr>
		<?php
			$sql = "SELECT drug_id,drug_name,category,reorder_level,supplier_id,price,brand FROM drug";
			$result = $con->query($sql);
			if($result-> num_rows > 0 ){
				while ($row = $result-> fetch_assoc()){
					echo "<tr>
							<td>".$row['drug_id']."</td>
							<td>".$row['drug_name']."</td>
							<td>".$row['category']."</td>
							<td>".$row['reorder_level']."</td>
							<td>".$row['supplier_id']."</td>
							<td>".$row['price']."</td>
							<td>".$row['brand']."</td>
							<td>
								<form method=\"post\">
								<input type=\"hidden\" name=\"remove\" value=".$row['drug_id'].">
								<input type=\"submit\" name=\"removeDrug\" value=\"Remove\" class=\"btn btn-danger\">
								</form>
							</td>
						</tr>";
				}
			echo "</table";
			}
			else{
				echo "0 result";
			}
		?>		

	</table>
	</div>
</body>
</html>
<?php
	
	if(isset($_POST['removeDrug'])){ 

		$drug_id = $_POST['remove'];
		$select = "SELECT * FROM drug WHERE drug_id = '$drug_id'";
		$result1 = $con->query($select);
		
		if (mysqli_num_rows($result1) > 0) {
		while ($row = mysqli_fetch_assoc($result1)) {

		$drug_id=$row['drug_id'];
		$drug_name=$row['drug_name'];
		$brand=$row['brand'];
		$category=$row['category'];
		$supplier_id=$row['supplier_id'];
		$reorder_level=$row['reorder_level'];
		$price=$row['price'];

		$sql = "INSERT INTO tem4 (drug_id,drug_name,brand,category,supplier_id,reorder_level,price) VALUES ('$drug_id','$drug_name','$brand','$category','$supplier_id','$reorder_level','$price')";
		$result = mysqli_query($con, $sql);

		if($result){
			$to = "udaramadumalka3@gmail.com";
			$subject = "Notification of PHARMA-PRO To REMOVE DRUG";
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
<!-- 
if (isset($_POST['removeDrug'])) {
				$drug_id = $_POST['remove'];
				$query = "DELETE  FROM drug WHERE drug_id = '$drug_id'";
				$resultQuery = mysqli_query($con,$query);
				if ($resultQuery) {
				 	echo "<script>alert('Remove Successfully..')</script>";
				 	echo "<script>window.open('updateDrug.php','_self')</script>";
				 } 
			}
-->