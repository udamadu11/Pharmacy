<?php 
function checkSession()
{
	if(empty(session_id())){
		session_start();
	}
}
?>