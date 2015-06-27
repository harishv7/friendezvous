<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	if (isset($_POST['add'])){
		$target_email = mysqli_real_escape_string($connection, $_POST['target_email']);
		$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
		
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
				echo "Succesfully added $target_email as meeting participant.";
			}
			else {
				echo "Failed to add $target_email as meeting participant. Please contact our system administrator.";
			}
		}
		
		header("Location: meeting.php?meeting_id=$meeting_id");
	}
?>