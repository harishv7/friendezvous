<?php
	session_start();
	
	include 'includes/dbConnect.php';
	
	if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['activateHash']) && !empty($_GET['activateHash'])){
		$email = mysqli_real_escape_string($connection, $_GET['email']);
		$activateHash = mysqli_real_escape_string($connection, $_GET['activateHash']);
		
		$query = "SELECT * FROM users WHERE email='".$email."' AND activate_hash='".$activateHash."' AND activated='0'";
		$result = mysqli_query($connection, $query);
		$numResult = mysqli_num_rows($result);
		
		if ($numResult == 1){
			$query = "UPDATE users SET activated='1' WHERE email='".$email."' AND activate_hash='".$activateHash."' AND activated='0'";
			$result = mysqli_query($connection, $query);
			
			header("Location: signUp.php?activatedSuccess=true");
		}
		else {
			header("Location: signUp.php?activatedSuccess=false");
		}
	}
	else {
		echo 'You are not authorized.';
	}
?>