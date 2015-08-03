<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
	$participant_id = mysqli_real_escape_string($connection, $_GET['participant_id']);
	
	$query = "SELECT * FROM meeting_users WHERE meeting_id='$meeting_id'";
	$result = mysqli_query($connection, $query);
	$owner = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if ($owner['user_id'] != $user_id){
		header("Location: error.php");
	}
	
	$query = "SELECT * FROM meeting_users WHERE meeting_id='".$meeting_id."' && user_id='".$participant_id."'";
	$result = mysqli_query($connection, $query);
	$mu = mysqli_fetch_array($result);
	$mu_id = $mu['mu_id'];
	
	$query = "DELETE FROM mu_date_time WHERE mu_id=$mu_id";
	$result = mysqli_query($connection, $query);
	
	$query = "DELETE FROM meeting_users WHERE meeting_id='".$meeting_id."' && user_id='".$participant_id."'";
	$result = mysqli_query($connection, $query);
	
	header("Location: meeting.php?meeting_id=$meeting_id");
?>