<!DOCTYPE html>
<html>
<head>
	<title>DashBoard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 50px; margin-left: 200px;">
		<div class="row">
			<div class="card text-white bg-info mb-3" style="width: 200px;margin-left:  20px;">
				<?php 
							include('include/connection.php');
							$queryUser = "SELECT * FROM employee";
							$selectUser = mysqli_query($con,$queryUser);
							$countUser = mysqli_num_rows($selectUser);
						?>
				<div class="card-header">Users &nbsp&nbsp&nbsp<?php echo $countUser;?></div>
				<a href="viewEmployee.php" style="color: black;text-decoration: none;"><div class="card-body"><img src="../img/team.png" width="50px;">  &nbsp&nbsp View Details</div></a>
			</div>

			<div class="card text-white bg-primary mb-3" style="width: 200px;margin-left:  20px;">
				<?php 
							include('include/connection.php');
							$queryDrug = "SELECT * FROM drug";
							$selectDrug = mysqli_query($con,$queryDrug);
							$countDrug = mysqli_num_rows($selectDrug);
						?>
				<div class="card-header">Drugs &nbsp&nbsp&nbsp<?php echo $countDrug;?></div>
				<a href="viewDrugs.php" style="color: black;text-decoration: none;"><div class="card-body"><img src="../img/drug.png" width="50px;">  &nbsp&nbsp View Details</div></a>
				
			</div>

			<div class="card text-white bg-success mb-3" style="width: 200px;margin-left:  20px;">
				<?php 
							include('include/connection.php');
							$querySupplier = "SELECT * FROM supplier";
							$selectSupplier = mysqli_query($con,$querySupplier);
							$countSupplier = mysqli_num_rows($selectSupplier);
						?>
				<div class="card-header">Suppliers &nbsp&nbsp&nbsp<?php echo $countSupplier;?></div>
				<a href="viewSupplier.php" style="color: black;text-decoration: none;"><div class="card-body"><img src="../img/cv.png" width="50px;">  &nbsp&nbsp View Details</div></a>
				
			</div>

			<div class="card text-white bg-dark mb-3" style="width: 200px;margin-left:  20px;">
				<?php 
							include('include/connection.php');
							$queryBatch = "SELECT * FROM batch";
							$selectBatch = mysqli_query($con,$queryBatch);
							$countBatch = mysqli_num_rows($selectBatch);
						?>
				<div class="card-header">Batches &nbsp&nbsp&nbsp<?php echo $countBatch;?></div>
				<div class="card-body"><img src="../img/batch.png" width="50px;">  &nbsp&nbsp View Details</div>
				
			</div>
        </div>
    </div>
			
		</div>

	</div>
	
</body>
</html>