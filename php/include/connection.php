<?php
	$dbsevername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "pharmacy";

	$con = mysqli_connect($dbsevername, $dbUsername, $dbPassword,$dbName);
	if(!$con){
		echo "No Connection";
	}
?>