<?php
	session_start();
	
	include 'dbConnect.php';
	
	if (isset($_POST['register'])){
		$email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
		$passwordConfirm = mysqli_real_escape_string($connection, $_POST['passwordConfirm']);
		$name = mysqli_real_escape_string($connection, $_POST['name']);
		
		$query = "SELECT email FROM users WHERE email='".$email."'";
		$result = mysqli_query($connection, $query);
		$numResult = mysqli_num_rows($result);
		
		if ($numResult == 0){
			$passwordHashed = password_hash($password, PASSWORD_BCRYPT);
			$query = "INSERT INTO users (email, password, name) VALUES ('".$email."', '".$passwordHashed."','".$name."')";
			$result = mysqli_query($connection, $query);
			if ($result){
				$_SESSION['email'] = $email;
				$_SESSION['name'] = $name;
				
				header("Location: dashboard.php");
			}
			else {
				echo 'FAILED';
			}
		}
		else {
			$message = $email." Email already exist!!";
			echo $message;
		}
	}
?>