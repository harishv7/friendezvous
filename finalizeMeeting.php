<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	include 'includes/library.php';
	
	$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
	$mudt_id = mysqli_real_escape_string($connection, $_GET['mudt_id']);
	
	if ($user_id != getMeetingOwnerID($connection, $meeting_id)){
		header("Location: error.php");
		exit;
	}
	
	$query = "SELECT * FROM mu_date_time WHERE mudt_id='$mudt_id'";
	$result = mysqli_query($connection, $query);
	$mudt = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$date_time = $mudt['date_time'];
	
	$query = "UPDATE meetings SET finalized=1, date_time='$date_time' WHERE meeting_id=$meeting_id";
	$result = mysqli_query($connection, $query);
	
	$query = "SELECT * FROM meetings WHERE meeting_id=$meeting_id";
	$result = mysqli_query($connection, $query);
	$meeting = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	$query = "SELECT * FROM meeting_users WHERE meeting_id=$meeting_id";
	$result = mysqli_query($connection, $query);
	while ($participant = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$participant_id = $participant['user_id'];
		$query = "INSERT INTO notifications (user_id, notification_message, notification_link) VALUES ('$participant_id', 'Meeting $meeting[name] has been finalized.', 'meeting.php?meeting_id=$meeting_id')";
		$result2 = mysqli_query($connection, $query);
	}
	
	header("Location: meeting.php?meeting_id=$meeting_id");
?>