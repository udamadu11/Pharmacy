<?php 


$exp_date = "2019/09/4";
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
	

?>