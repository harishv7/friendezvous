<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'friendezvous';
	
	$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die(mysqli_error($connection));
?>