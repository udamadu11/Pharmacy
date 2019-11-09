<!DOCTYPE html>
<html>
<head>
	<title>DashBoard</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
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

   <?php 
   	$total = 0;
   	for ($i=1; $i < date("m")+1; $i++) { 
   		$SalesQuery = "SELECT total FROM invoice WHERE MONTH(date) = '$i'";
   		$resultSalesQuery = mysqli_query($con,$SalesQuery);
   			while($row = mysqli_fetch_array($resultSalesQuery)){
   				$total += $row['total'];
   			}
   		echo $total ." ";
   		$total = 0;
   }
   	
   
   	
   ?>
   <?php 
   	$total = 0;
   	for ($i=1; $i < date("m")+1; $i++) { 
   		$SalesQuery = "SELECT invoice FROM purchase WHERE MONTH(date) = '$i'";
   		$resultSalesQuery = mysqli_query($con,$SalesQuery);
   			while($row = mysqli_fetch_array($resultSalesQuery)){
   				$total += $row['invoice'];
   			}
   		echo $total ." ";
   		$total = 0;
   }
   	
   
   	
   ?>

      <script type="text/javascript">
		      google.charts.load('current', {'packages':['bar']});
		      google.charts.setOnLoadCallback(drawChart);

		      function drawChart() {
		        var data = google.visualization.arrayToDataTable([
		          ['Month', 'Sales', 'purchases', 'Profit'],
		          ['January', 1000, 400, 600],
		          ['2015', 1170, 460, 250],
		          ['2016', 660, 1120, 300],
		          ['2017', 1030, 540, 350]
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