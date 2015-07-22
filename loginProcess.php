<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	if (isset($_POST['login'])){
		$email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
		
		$query = "SELECT * FROM users WHERE email='".$email."' AND activated='1'";
		$result = mysqli_query($connection, $query);
		$numResult = mysqli_num_rows($result);
		
		if ($numResult == 1){
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$passwordHashed = $row['password_hash'];
			if (password_verify($password, $passwordHashed)){
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['name'] = $row['full_name'];
				
				$query = "UPDATE users SET last_login=NOW() WHERE user_id='$row[user_id]'";
				$result = mysqli_query($connection, $query);
				
				header("Location: dashboard.php");
			}
			else {
				echo 'invalid email/password combination';
			}
		}
		else {
			echo 'invalid email/password combination';
		}
	}
?>