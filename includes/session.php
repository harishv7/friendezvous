<?php
	session_start();
	
	if (isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
	}
	if (isset($_SESSION['name'])){
		$name = $_SESSION['name'];
	}
	if (isset($_SESSION['email'])){
		$email = $_SESSION['email'];
	}
?>