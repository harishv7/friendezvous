<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	if (isset($_POST['register'])){
		$email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
		$passwordConfirm = mysqli_real_escape_string($connection, $_POST['passwordConfirm']);
		$name = mysqli_real_escape_string($connection, $_POST['name']);
		$birthdate = mysqli_real_escape_string($connection, $_POST['birthdate']);
		$gender = mysqli_real_escape_string($connection, $_POST['gender']);
		$location = mysqli_real_escape_string($connection, $_POST['location']);
		$agree = mysqli_real_escape_string($connection, $_POST['agree']);
		
		$query = "SELECT email FROM users WHERE email='".$email."'";
		$result = mysqli_query($connection, $query);
		$numResult = mysqli_num_rows($result);
		
		$success = true;
		
		if ($numResult > 0){
			$errorCode .= "e";
			$success = false;
		}
		
		if ($password != $passwordConfirm){
			$errorCode .= "p";
			$success = false;
		}
			
		if ($agree != "agree"){
			$errorCode .= "a";
			$success = false;
		}
		
		if (!$success){
			header("Location: signUp.php?success=$success&errorCode=$errorCode");
		}
		else {
			$passwordHash = password_hash($password, PASSWORD_BCRYPT);
			$activateHash = md5(rand(0, 255));
			$query = "INSERT INTO users (email, password_hash, full_name, birth_date, gender, location, activate_hash) VALUES ('".$email."', '".$passwordHash."','".$name."', '".$birthdate."', '".$gender."', '".$location."', '".$activateHash."')";
			$result = mysqli_query($connection, $query);
			if ($result){
				include 'sendVerification.php';
				
				header("Location: signUp.php?success=$success");
			}
			else {
				echo 'failed to insert to TABLE users, please contact the site administrator.';
			}
		}
	}
?>