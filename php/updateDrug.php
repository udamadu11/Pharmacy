<?php include('include/connection.php'); ?><!-- Include database connection -->
<?php include('include/session.php');
	//Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '2'){
       header("Location:login.php");
       exit();
       }
 ?><!-- Include session -->
<!DOCTYPE html>
<html> 
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="margin-top: 50px">
		<div class="alert alert-info" role="alert" style="font-weight:bold;font-size: 24px;">
  		<center>List of Drugs</center>
		</div>
		<a href="AddDrug.php"><button class="btn btn-success" style="margin-left:935px;margin-bottom: 20px;">Add New Drug</button></a>
		<table class="table table-hover">
		<tr>
			<th>Drug Id</th>
			<th>Drug Name</th>
			<th>Category</th>
			<th>Reoder Level</th>
			<th>Supplier Id</th>
			<th>Price</th>
			<th>Brand</th>
			<th>Edit</th>
			<th>Remove</th>
		</tr>
		<?php
			//Retrive data from drug table
			$sql = "SELECT drug_id,drug_name,category,reorder_level,supplier_id,price,brand FROM drug";
			//Performs a query on Database
			$result = $con->query($sql);

			if($result-> num_rows > 0 ){//Return the number of rows in result set
				while ($row = $result-> fetch_assoc()){//Fetch a result row as an associative array
					echo "<tr>
							<td>".$row['drug_id']."</td>
							<td>".$row['drug_name']."</td>
							<td>".$row['category']."</td>
							<td>".$row['reorder_level']."</td>
							<td>".$row['supplier_id']."</td>
							<td>".$row['price']."</td>
							<td>".$row['brand']."</td>
							<td>
								<form method=\"post\" action=\"editDrugPharmacist.php\">
								<input type=\"hidden\" name=\"edit\" value=".$row['drug_id']."> 
								<input type=\"submit\" name=\"editDrug\" value=\"Edit\" class=\"btn btn-info\" style=\"width:100px;\">
								</form>
							</td>
							<td>
								<form method=\"post\">
								<input type=\"hidden\" name=\"remove\" value=".$row['drug_id']."> 
								<input type=\"submit\" name=\"removeDrug\" value=\"Remove\" class=\"btn btn-danger\" style=\"width:100px;\">
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
	

	if (isset($_POST['removeDrug'])) {
	$drug_id = $_POST['remove'];
	//Delete Data from tem4(temporary) table by drug id
	$delete_query ="DELETE FROM drug WHERE drug_id = '$drug_id' ";
	//Performs a query on database
	$delete_result = mysqli_query($con,$delete_query);

	if ($delete_result) {
			echo "<script>alert('Delete Successfully..')</script>";
			echo "<script>window.open('updateDrug.php','_self')</script>";
		

		//Select All Data from drug table by drug id
		// $drug_id = $_POST['remove'];
		// $select = "SELECT * FROM drug WHERE drug_id = '$drug_id'";
		// //Performs a query on Database
		// $result1 = $con->query($select);
		
		// if (mysqli_num_rows($result1) > 0) {//Return the number of rows in result set
		// while ($row = mysqli_fetch_assoc($result1)) {//Fetch a result row as an associative array

		// $drug_id=$row['drug_id'];
		// $drug_name=$row['drug_name'];
		// $brand=$row['brand'];
		// $category=$row['category'];
		// $supplier_id=$row['supplier_id'];
		// $reorder_level=$row['reorder_level'];
		// $price=$row['price'];
		// //Insert to drug data to temporary table to approve
		// $sql = "INSERT INTO tem4 (drug_id,drug_name,brand,category,supplier_id,reorder_level,price) VALUES ('$drug_id','$drug_name','$brand','$category','$supplier_id','$reorder_level','$price')";
		// $result = mysqli_query($con, $sql);

		// if($result){
		// 	//Send mail after inserting data to tem table
		// 	$to = "udaramadumalka3@gmail.com";
		// 	$subject = "Notification of PHARMA-PRO To REMOVE DRUG";
		// 	$message = "<a href='http://localhost/approvalList.php'>Approval for Request</a>";

		// 	$headers = "MIME-Version: 1.0" . "\r\n";
		// 	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// 	$headers .= 'From: <udaramadumalka3@gmail.com>' . "\r\n";
		// 	$mail = mail($to,$subject,$message,$headers);
		// 	if ($mail) {
		// 		echo "<script>alert('Thank You..!..We have sent an email with a confirmation link to your Requesting.')</script>";
		// 	}
		// 	else{
		// 		echo "<script>alert('Error.')</script>";
		// 	}
			
    		
		// }

		
	
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