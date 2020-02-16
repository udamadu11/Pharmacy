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
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="container">
	<div class="error-msg"><h3><?php include('include/message.php'); ?></h3></div>
	<form class="form-7" method="post">
		<h2>Search by Name</h2>
		<div class="input_field-5">
				<input type="text" class="input-5" name="search_name" id="search_name" placeholder="Enter the Name">
		</div>
		<input type="submit" name="submit1" value="Search Name" class="btn-7">

	</form>
	<form class="form-8" method="post">
		<h2>Search by Category</h2>
		<div class="input_field-6">
				<input type="text" class="input-6" name="search_category" id="search_category" placeholder="Enter the Category Name">
		</div>
		<input type="submit" name="submit2" value="Search Category" class="btn-7">

	</form>
	<?php
		if (isset($_POST['submit1'])) {
			$drug_name = $_POST['search_name'];
			//Retrive data from batch and drug table using inner join by drug name
			 $search_name ="SELECT drug.drug_id,drug.drug_name,drug.price, batch.batch_no,batch.ex_date,batch.available_quantity FROM drug INNER JOIN batch ON drug.drug_name = batch.drug_name AND drug.drug_name = '$drug_name'";
			 //Performs a query on Database
			$query= mysqli_query($con,$search_name);

			echo "
				<br>

						<table class=\"table\">
							<tr>
									<th>Drug Id</th>
									<th>Drug Name</th>
									<th>Drug Price</th>
									<th>Batch No</th>
									<th>Expiry Date</th>
									<th>Available Quantity</th>
							</tr>


			";

			if (mysqli_num_rows($query) > 0) {//Return the number of rows in result set
						while($row = mysqli_fetch_assoc($query)){//Fetch a result row as an associative array
							echo "
							

							<tr>
									<td>".$row['drug_id']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['price']."</td>
									<td>".$row['batch_no']."</td>
									<td>".$row['ex_date']."</td>
									<td>".$row['available_quantity']."</td>
								</tr>";
						}
					}else{
			//$message = base64_encode(urlencode("Invalid Drug Name"));
        	//header('Location:searchDrug.php?msg=' . $message);
        	//exit();
        	echo "<script>alert('Invalid Drug Name !')</script>";
		}		
		}
		if (isset($_POST['submit2'])) {
			$drug_category = $_POST['search_category'];
			//Retrive All drug data from drug table by category
			$search_category = "SELECT * FROM drug WHERE category ='$drug_category'";
			//Performs a query on Database
			$query= mysqli_query($con,$search_category);

			echo "
				<br>
							<table class=\"table table-hover\">
								<tr>
									<th>Drug Id</th>
									<th>Drug Name</th>
									<th>Drug Category</th>
									<th>Drug Price</th>
									<th>Drug Brand</th>
								</tr>
			";
			if (mysqli_num_rows($query) > 0) {
						while($row = mysqli_fetch_assoc($query)){
							echo "
								<tr>
									<td>".$row['drug_id']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['category']."</td>
									<td>".$row['price']."</td>
									<td>".$row['brand']."</td>
								</tr>";
						}
					}else{
			//$message = base64_encode(urlencode("Invalid Drug Category"));
        	//header('Location:searchDrug.php?msg=' . $message);
        	//exit();
			echo "<script>alert('Invalid Drug Category !')</script>";
        	}		
		}
	?>
</div>
</body>
</html>