<?php
	session_start();
	
	include 'dbConnect.php';
	
	if (isset($_POST['login'])){
		$email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
		
		$query = "SELECT * FROM users WHERE email='".$email."' ";
		$result = mysqli_query($connection, $query);
		$numResult = mysqli_num_rows($result);
		
		if ($numResult == 1){
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$passwordHashed = $row['password'];
			if (password_verify($password, $passwordHashed)){
				$_SESSION['email'] = $row['email'];
				$_SESSION['name'] = $row['name'];
				
				header("Location: dashboard.php");
			}
			else {
				echo 'INVALID PASSWORD';
			}
		}
		else {
			echo 'INVALID USERNAME';
		}
	}
?>