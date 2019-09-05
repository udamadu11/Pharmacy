<?php 
include('include/connection.php');
$query = "SELECT * FROM batch";
$query = mysqli_query($con,$query);


while($row = mysqli_fetch_assoc($query)){
		$exp_date = $row['ex_date'];
		$today = date('Y-m-d H:i:s');
		$exp =strtotime($exp_date);
		$td = strtotime($today);

		if ($td>$exp) {
			$diff = $td - $exp;
			$x =abs(floor($diff/ (60 * 60 *24)));
			echo "expire";
			echo "expireed :".$x;
		}else{
			$diff = $td - $exp;
			$x =abs(floor($diff/ (60 * 60 *24)));
			echo "not expire";
			echo "expire remininig :".$x;
		}

}
?>