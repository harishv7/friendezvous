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
		exit;
	}
	else {
		$query = "UPDATE meeting_users SET user_location_id=NULL WHERE meeting_id='$meeting_id' && user_id='$user_id'";
		$result = mysqli_query($connection, $query);
		
		$query = "UPDATE meeting_locations SET num_votes=num_votes-1 WHERE meeting_id='$meeting_id' && location_id='$location_id'";
		$result = mysqli_query($connection, $query);
		
		$query = "SELECT ml_id, num_votes FROM meeting_locations WHERE meeting_id='$meeting_id' && location_id='$location_id'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if ($row['num_votes'] <= 0){
			$query = "DELETE FROM meeting_locations WHERE ml_id='$row[ml_id]'";
			$result = mysqli_query($connection, $query);
		}
		
		header("Location: meeting.php?meeting_id=$meeting_id");
	}
?>