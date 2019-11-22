<?php 
include('include/connection.php');
include('include/session.php');
    //Unauthorized Access_Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '3'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container" style="margin-top: 50px;">
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
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Storekeeper</p>
				  </div>
				</div>
			</div>
		<div class="col-md-8">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h1>Welcome <?php if (isset($_SESSION['type'])) {
				    		echo $_SESSION['u_name'];
				    	}  ?></h1>
					<div class="row">
						<div class="col-sm-6">
							<iframe src="http://free.timeanddate.com/clock/i616j2aa/n1993/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>

						</div>
						<div class="col-sm-6">
							<div class="card">
						      <div class="card-body">
						        <h4 class="card-title">Update Stock</h4>
						        <p class="card-text">Here You can manage stock level</p>
						        <a href="addBatch.php"><button class="btn btn-info"><i class="fa fa-ambulance">&nbsp;Add Stock</i></button></a>
						        <a href="searchBatch.php"><button class="btn btn-info"><i class="fa fa-ambulance">&nbsp;Remove Stock</i></button></a>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div class="row">
				<div class="col-md-8">
					<div id="columnchart_material" style="width: 1000px; height: 400px;margin-top: 50px;"></div>
				</div>
				<div class="col-md-3" style="margin-top: 120px;">
				</div>
				</div>
			</div>
			<script type="text/javascript">
				<?php
				//Select drug name and current stock from stock table
					$queryStock = "SELECT drug_name,current_stock FROM stock";
				//Performs a query on database
					$selectStock = mysqli_query($con,$queryStock);

				 ?>
				 //Google developoer bar chart
		      google.charts.load('current', {'packages':['bar']});
		      google.charts.setOnLoadCallback(drawChart);

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
	</div>
	<?php 
  include('include/connection.php');
  $sql = "SELECT drug.drug_id,drug.drug_name,drug.reorder_level, stock.current_stock FROM drug INNER JOIN stock ON drug.drug_id = stock.drug_id";
  $query= mysqli_query($con,$sql);
  if (mysqli_num_rows($query) > 0) {
  while($row = mysqli_fetch_assoc($query)){
echo"
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.all.min.js'></script>
   <script type='text/javascript'>
    $(document).ready(function(){
Swal.fire('Stock Alert')
    })
     
   </script>";
      }
    }

?>
		
</body>
</html>