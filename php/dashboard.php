<!DOCTYPE html>
<html>
<head>
	<title>DashBoard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

   

      <script type="text/javascript">
		      google.charts.load('current', {'packages':['bar']});
		      google.charts.setOnLoadCallback(drawChart);

		      function drawChart() {
		        var data = google.visualization.arrayToDataTable([
		          ['Year', 'Sales', 'Expenses', 'Profit','Income'],
		          ['2014', 1000, 400, 600,122],
		          ['2015', 1170, 460, 250,900],
		          ['2016', 660, 1120, 300,876],
		          ['2017', 1030, 540, 350,122]
		        ]);

		        var options = {
		          chart: {
		            title: 'Company Performance',
		            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
		          }
		        };

		        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

		        chart.draw(data, google.charts.Bar.convertOptions(options));
		      }
    </script>
<div id="columnchart_material" style="width: 800px; height: 500px;margin-top: 50px;"></div>

    </div>


	
</body>
</html>