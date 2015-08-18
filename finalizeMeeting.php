<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	include 'includes/library.php';
	
	$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
	
	// check if user is owner
	if ($user_id != getMeetingOwnerID($connection, $meeting_id)){
		header("Location: error.php?errorCode=authError");
		exit;
	}
	
	$meeting = getMeetingFields($connection, $meeting_id);
	
	if (!isset($meeting['date_time']) || !isset($meeting['location'])){
		header("Location: error.php?errorCode=finalizeError");
		exit;
	}
	
	$query = "UPDATE meetings SET finalized=1 WHERE meeting_id=$meeting_id";
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