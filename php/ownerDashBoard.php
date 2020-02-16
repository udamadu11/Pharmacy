<?php include('include/session.php') ?>
<?php include('include/connection.php') ?><!--include databse connection -->

<?php
    //Unauthorized Access_Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '1'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>

	<title>Dash Board</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



 </head>
<body>


	<br/><br/>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card mx-auto">
				  <img class="card-img-top mx-auto" style="width:40%;margin-top: 10px;" src="../img/man11.png" alt="Card image cap">
				  <div class="card-body">
				    <h4 class="card-title">Profile Info</h4>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i><?php 
				    	if (isset($_SESSION['type'])) {
				    		echo $_SESSION['u_name'];
				    	}
				    ?></p>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Lalith Liyanage</p>
				    <?php 
				    	include('include/connection.php');
				    	$ownerQuery = "SELECT  * FROM employee";

				    ?>
				    <a href="#"><button class="btn btn-primary" data-toggle="modal" data-target="#form_profile"><i class="fa fa-edit">&nbsp;</i>Edit Profile</button></a>
				    <a href="viewEmployee.php" class="btn btn-primary" style="margin-left: 10px;">Manage Users</a>
				    <?php include ('ownerProfile.php'); ?>
				  </div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h1>Welcome Owner</h1>
					<div class="row">
						<div class="col-sm-6">
							<iframe src="http://free.timeanddate.com/clock/i616j2aa/n1993/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>

						</div>
						<div class="col-sm-6">
							<div class="card">
						      <div class="card-body">
						        <h4 class="card-title">Notifications</h4>
						        <p class="card-text">Here you can Manage your notifications</p>
						        <div class="btn-group">
									 <button type="button" class="btn btn-primary">
 										 Notifications <span class="badge badge-light"><?php echo counts() ?></span>
									</button>
									  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <div class="dropdown-menu">
									  	<?php 
									  		function counts(){
									  		include('include/connection.php');
									  		//Select All data from tem table
									  		$sql1 = "SELECT * FROM tem";
									  		//Performs query on database
											$result1 = $con->query($sql1);
											//Return number of rows in result set
											if($result1-> num_rows > 0 ){
												echo "<a class=\"dropdown-item\" href=\"approvalList.php\" target=\"main\">Add Supplier Appro:</a>";
											}
									  	
									  		//Select All data from tem2 table
									  		$sql2 = "SELECT * FROM tem2";
									  		//Performs query on database
											$result2 = $con->query($sql2);
											//Return number of rows in result set
											if($result2-> num_rows > 0 ){
												echo "<a class=\"dropdown-item\" href=\"approvalListRemove.php\" target=\"main\">remove Supplier Appro:</a>";
											}
									  
									  		//Select All data from tem3 table
									  		$sql3 = "SELECT * FROM tem3";
									  		//Performs query on database
											$result3 = $con->query($sql3);
											//Return number of rows in result set
											if($result3-> num_rows > 0 ){
												echo "<a class=\"dropdown-item\" href=\"approveAddDrug.php\" target=\"main\">Add Drug Appro:</a>";
											}
									 
									  		//Select All data from tem4 table
									  		$sql4 = "SELECT * FROM tem4";
									  		//Performs query on database
											$result4 = $con->query($sql4);
											//Return number of rows in result set
											if($result4-> num_rows > 0 ){
												echo "<a class=\"dropdown-item\" href=\"approveRemoveDrug.php\" target=\"main\">remove Drug Appro:</a>";
											}
}
									  	?>
									</div>
						      </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<p></p>
	<p></p>
</div>
	
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div id="piechart" style="width: 400px; height: 400px;margin-top: 50px;"></div>
				</div>
				<div class="col-md-8">
					<div id="columnchart_material" style="width: 600px; height: 400px;margin-top: 50px;margin-left: 100px;"></div>
				</div>
			</div>
			</div>

		</div>

			<script type="text/javascript">
				<?php
				//Select drug name and current stock from stock table
					$queryStock = "SELECT drug_name,current_stock FROM stock";
				//Performs a query on database
					$selectStock = mysqli_query($con,$queryStock);

					$result_fast_move = mysqli_query($con, "SELECT i.drug_name AS 'name',SUM(iv.qty) AS 'qtys' FROM invoice_items iv LEFT JOIN batch i ON iv.drug_id=i.drug_id WHERE iv.qty>0 GROUP BY iv.drug_id");

				 ?>
				 //Google developoer bar chart
		      google.charts.load('current', {'packages':['bar']});
		      google.charts.setOnLoadCallback(drawChart);

		      	//pie chart
		      google.charts.load('current', {'packages': ['corechart']});
    		  google.charts.setOnLoadCallback(drawChartFastMoving);


    		  // Draw the chart and set the chart values
	    	function drawChartFastMoving() {
	        var data = new google.visualization.DataTable();
	        data.addColumn('string', 'Item');
	        data.addColumn('number', 'Populartiy');

	        <?php
				while ($row = mysqli_fetch_row($result_fast_move)) {
   			 ?>
            data.addRows([
                ['<?php echo $row[0]; ?>', <?php echo $row[1]; ?>]
            ]);
			<?php } ?>

        // Optional; add a title and set the width and height of the chart
        var options = {'title': 'Selling Items', 'width': 500, 'height': 500};
        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);

	    	}

		      function drawChart() {
		        var data = new google.visualization.DataTable();
		        data.addColumn('string', 'Drug');
        		data.addColumn('number', 'Stock Level');

		<?php
			while ($row = mysqli_fetch_row($selectStock)) {
		 ?>
			            data.addRows([
			                ['<?php echo $row[0]; ?>', <?php echo $row[1]; ?>]
			            ]);
			<?php } ?>
		        var options = {
		          chart: {
		            title: 'Company Performance',
		            subtitle: 'Current Stock Level',
		          }
		        };

		        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

		        chart.draw(data, google.charts.Bar.convertOptions(options));
		      }
    </script>
</div>
</body>
</html>