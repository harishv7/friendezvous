<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
	$location_id = mysqli_real_escape_string($connection, $_GET['location_id']);
	
	$query = "SELECT * FROM meeting_users WHERE meeting_id='$meeting_id' && user_id='$user_id'";
	$result = mysqli_query($connection, $query);
	$numResult = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	if (!$numResult || isset($row['user_location_id'])){
		header("Location: error.php");
	}
	else {
		$query = "UPDATE meeting_locations SET num_votes=num_votes+1 WHERE meeting_id='$meeting_id' && location_id='$location_id'";
		$result = mysqli_query($connection, $query);
		
		if ($result){
			header("Location: meeting.php?meeting_id=$meeting_id");
		}
		else {
			header("Location: error.php");
		}
	}
?>