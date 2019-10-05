<!DOCTYPE html>
<html>
<head>
	<title>Issue Drug</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 50px;">
		<div class="alert alert-primary" role="alert" style="text-align: center;">
  			<h2>Issue Drug</h2>
  		</div>
  			<form method="post">
  		<div class="row">
			<div class="col-md-4">
      			<select class="form-control" name="drug_id" style="margin-left: 150px;">
					<?php
						include ('include/connection.php');
						$sql = "SELECT * FROM batch";
						$result = mysqli_query($con,$sql);
						while ($row = mysqli_fetch_array($result)) {
			
						echo '<option value="'.$row['drug_id'].'">'.$row['drug_id'].'</option>';
				}
				?>			
				</select>
    		</div>
    	<div class="col-md-6">
    		<input type="submit" name="submit" value="Search" class="btn btn-info" style="width: 200px;margin-left: 150px;">
    	</div>
    </div>
    </form>
    	<hr>

	<?php

	if (isset($_POST['submit'])) {
			$drug_id = $_POST['drug_id'];
			$search_id = "SELECT * FROM batch WHERE drug_id ='$drug_id'";
			$query= mysqli_query($con,$search_id);

			echo "<table class=\"table\">
				<tr>
					<th>Batch No</th>
					<th>Drug Id</th>
					<th>Drug Name</th>
					<th>Available</th>
					<th>Issue Quantity</th>
					<th>Action</th>
					
				</tr>";

			if (mysqli_num_rows($query) > 0) {
						while($row = mysqli_fetch_assoc($query)){
							echo "<tr>
									<td>".$row['batch_no']."</td>
									<td>".$row['drug_id']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['available_quantity']."</td>
									<td>
										<form method=\"post\">
											<div class=\"form-group\">
	    								
	    										<input type=\"number\" class=\"form-control\"  placeholder=\"Issue Drug Quantity\" name=\"quantity\">
	 										</div>
	 								</td>
	 								<td>
											<input type=\"hidden\" value=".$row['drug_id']." name=\"reStk\">
											<input type=\"submit\" name=\"btn\" class=\"btn btn-success\" value=\"Issue\">
										

									</td>
										</form>
								</tr>
								
								";
						}
					}else{
			$message = base64_encode(urlencode("Invalid Drug id"));
        	header('Location:addStock.php?msg=' . $message);
        	exit();
		}		
		}
		?>
		</div>
</body>
</html>
