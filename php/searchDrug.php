<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/searchDrug.css">
</head>
<body>
	<div class="error-msg"><h3><?php include('include/message.php'); ?></h3></div>
	<form class="search_by_name" method="post">
		<h2>Search by Name</h2>
		<div class="input_fields1">
				<input type="text" class="input1" class="img" name="search_name" id="search_name" placeholder="Enter the Name">
		</div>
		<input type="submit" name="submit1" value="Search Name">

	</form>
	<form class="search_by_category" method="post">
		<h2>Search by Category</h2>
		<div class="input_fields2">
				<input type="text" class="input2" name="search_category" id="search_category" placeholder="Enter the Category Name">
		</div>
		<input type="submit" name="submit2" value="Search Category">

	</form>
	<?php
		if (isset($_POST['submit1'])) {
			$drug_name = $_POST['search_name'];

			 $search_name ="SELECT drug.drug_id,drug.drug_name,drug.price, batch.batch_no,batch.ex_date,batch.available_quantity FROM drug INNER JOIN batch ON drug.drug_name = batch.drug_name AND drug.drug_name = '$drug_name'";

			$query= mysqli_query($con,$search_name);

			echo "

						<table>
							<tr>
									<th>Drug Id</th>
									<th>Drug Name</th>
									<th>Drug Price</th>
									<th>Batch No</th>
									<th>Expiry Date</th>
									<th>Available Quantity</th>
							</tr>


			";

			if (mysqli_num_rows($query) > 0) {
						while($row = mysqli_fetch_assoc($query)){
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
			$search_category = "SELECT * FROM drug WHERE category ='$drug_category'";
			$query= mysqli_query($con,$search_category);

			echo "
				
							<table>
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

</body>
</html>