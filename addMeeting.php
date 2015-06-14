<?php
	session_start();
	
	$user_id = $_SESSION['user_id'];
	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
	
	include 'includes/dbConnect.php';
	
	if (isset($_POST['submit'])){
		$name = mysqli_real_escape_string($connection, $_POST['name']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);
		
		$query = "INSERT INTO meetings (name, description) VALUES ('".$name."', '".$description."')";
		$result = mysqli_query($connection, $query);
		if ($result){
			$query = "SELECT * FROM meetings WHERE name='".$name."' ORDER BY meeting_id DESC LIMIT 1";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$meeting_id = $row['meeting_id'];
			$query = "INSERT INTO meeting_users (meeting_id, user_id) VALUES ('".$meeting_id."', '".$user_id."')";
			$result = mysqli_query($connection, $query);
			if ($result){
				header("Location: dashboard.php");
			}
			else {
				echo 'failed to insert to TABLE meeting_users, please contact the site administrator.';
			}
		}
		else {
			echo 'failed to insert to TABLE meetings, please contact the site administrator.';
		}
	}
?>