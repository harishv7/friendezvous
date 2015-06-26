<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
	$mudt_id = mysqli_real_escape_string($connection, $_GET['mudt_id']);
	
	$query = "SELECT * FROM meeting_users WHERE meeting_id='".$meeting_id."' && user_id='".$user_id."'";
	$result = mysqli_query($connection, $query);
	if ($result){
		$mu = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$mu_id = $mu['mu_id'];
		
		$query = "DELETE FROM mu_date_time WHERE mu_id=$mu_id && mudt_id=$mudt_id";
		$result = mysqli_query($connection, $query);
		
		header("Location: meeting.php?meeting_id=$meeting_id");
	}	
?>