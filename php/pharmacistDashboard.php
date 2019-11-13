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
				    		echo $_SESSION['f_name'];
				    	}
				    ?></p>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Pharmacist</p>
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
						        <h4 class="card-title">Issue Drug</h4>
						        <p class="card-text">Here You can Issue Drug</p>
						        <a href="issueDrug.php"><button class="btn btn-info"><i class="fa fa-ambulance">&nbsp;Issue Drug</i></button></a>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
<div id="columnchart_material" style="width: 800px; height: 500px;margin-top: 20px;margin-left: 200px;"></div>
		</div>
	</div>
		
</body>
</html>