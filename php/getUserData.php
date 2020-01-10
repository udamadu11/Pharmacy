
<?php 
	$con = mysqli_connect("localhost","root","","pharmacy");
	$user = "SELECT * FROM employee";
	$rUser = mysqli_query($con,$user);

	while ($row_user = mysqli_fetch_array($rUser)) {
		$userId = $row_user['id'];
		$user_name = $row_user['u_name'];
		$login = $row_user['log_in'];

		echo "
			<li>
				<div class='chat-left-datail'>
					<p><a href='chatRoom.php?u_name=$user_name'>$user_name</a></p>";
				if ($login == "online") {
					echo "<span><i class='fa fa-circle' aria-hidden='true'></i>Online<span>";
				}else{
					echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i>Offline</span>";
				}
				"
				</div>
			</li>
			";
	
	}
?>
