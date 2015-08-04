<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	$target_email = mysqli_real_escape_string($connection, $_POST['target_email']);
	$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
	
	if (!isset($target_email) || !isset($meeting_id)){
		header("Location: error.php");
		exit;
	}
		
	$query = "SELECT * FROM users WHERE email='".$target_email."'";
	$result = mysqli_query($connection, $query);
	$target = mysqli_fetch_array($result);
	$target_id = $target['user_id'];
		
	$query = "SELECT * FROM meeting_users WHERE meeting_id='".$meeting_id."' && user_id='".$target_id."'";
	$result = mysqli_query($connection, $query);
	$numResult = mysqli_num_rows($result);
	
	if ($numResult){
		echo 'This user is already a participant of the meeting';
	}
	else {
		$query = "INSERT INTO meeting_users (meeting_id, user_id) VALUES ('".$meeting_id."', '".$target_id."')";
		$result = mysqli_query($connection, $query);
		if ($result){
			$query = "SELECT * FROM meetings WHERE meeting_id=$meeting_id";
			$result = mysqli_query($connection, $query);
			$meeting = mysqli_fetch_array($result);
			
			$query = "INSERT INTO notifications (user_id, notification_message, notification_link) VALUES ('".$target_id."', 'You have been invited to meeting $meeting[name]', 'meeting.php?meeting_id=$meeting_id')";
			$result = mysqli_query($connection, $query);
			
			header("Location: meeting.php?meeting_id=$meeting_id");
		}
		else {
			echo 'Database error occured. Please contact the system administrator.';
		}
	}
?>