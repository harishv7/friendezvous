<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	$new_name = mysqli_real_escape_string($connection, $_POST['full_name']);
	$new_gender = mysqli_real_escape_string($connection, $_POST['gender']);
	$new_location = mysqli_real_escape_string($connection, $_POST['location']);
	
	$errorCode = "";
	
	if (strlen($new_name) < 2){
		$errorCode .= "n";
	}
	if ($new_gender != 'M' && $new_gender != 'F' && $new_gender != 'm' && $new_gender != 'f'){
		$errorCode .= "g";
	}
	
	if (strlen($errorCode) == 0){
		$new_gender = strtoupper($new_gender);
		
		$query = "UPDATE users SET full_name='$new_name', gender='$new_gender', location='$new_location' WHERE user_id='$user_id'";
		$result = mysqli_query($connection, $query);
			
		header("Location: profile.php");
	}
	else {
		header("Location: profile.php?errorCode=$errorCode");
	}
?>