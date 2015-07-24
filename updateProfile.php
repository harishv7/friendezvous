<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	if (isset($_POST['update'])){
		$new_name = mysqli_real_escape_string($connection, $_POST['full_name']);
		$new_gender = mysqli_real_escape_string($connection, $_POST['gender']);
		$new_location = mysqli_real_escape_string($connection, $_POST['location']);
		
		$query = "UPDATE users SET full_name='$new_name', gender='$new_gender', location='$new_location' WHERE user_id='$user_id'";
		$result = mysqli_query($connection, $query);
		
		header("Location: profile.php");
	}
?>