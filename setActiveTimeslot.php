<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	include 'includes/library.php';
	
	$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
	$mudt_id = mysqli_real_escape_string($connection, $_GET['mudt_id']);
	
	// check if user is owner
	if ($user_id != getMeetingOwnerID($connection, $meeting_id)){
		header("Location: error.php");
		exit;
	}
	
	$query = "SELECT * FROM mu_date_time WHERE mudt_id='$mudt_id'";
	$result = mysqli_query($connection, $query);
	$mudt = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$date_time = $mudt['date_time'];
	
	$query = "UPDATE meetings SET date_time='$date_time' WHERE meeting_id=$meeting_id";
	$result = mysqli_query($connection, $query);
	
	header("Location: meeting.php?meeting_id=$meeting_id");
?>