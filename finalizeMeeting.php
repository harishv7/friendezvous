<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
	$date_time = mysqli_real_escape_string($connection, $_GET['date_time']);
	
	$query = "UPDATE meetings SET finalized=1, date_time='$date_time' WHERE meeting_id=$meeting_id";
	$result = mysqli_query($connection, $query) OR DIE(mysqli_error($connection));
	
	header("Location: meeting.php?meeting_id=$meeting_id");
?>