<?php

	require_once 'includes/session.php';
	require_once 'includes/dbConnect.php';

	function getReal($var){
		return mysqli_real_escape_string($connection, $var);
	}

?>