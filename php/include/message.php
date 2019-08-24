<?php
	if (isset($_GET['msg'])) {
		echo urldecode(base64_decode(($_GET['msg'])));
	}
?>