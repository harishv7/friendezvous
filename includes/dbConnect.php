<?php
	include 'dbCredentials.php';
	
	$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die(mysqli_error($connection));
?>