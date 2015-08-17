<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	include 'includes/library.php';
	
	$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
	$mudt_id = mysqli_real_escape_string($connection, $_GET['mudt_id']);
	
	$query = "SELECT * FROM meeting_users WHERE meeting_id='".$meeting_id."' && user_id='".$user_id."'";
	$result = mysqli_query($connection, $query);
	if ($result){
		$query = "SELECT * FROM mu_date_time WHERE mudt_id=$mudt_id";
		$mudt = mysqli_query($connection, $query) OR DIE(mysqli_error($connection));
		$mu_date_time = mysqli_fetch_array($mudt);
		$date_time = $mu_date_time['date_time'];
		
		$mu = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$mu_id = $mu['mu_id'];
		
		$query = "INSERT INTO mu_date_time (mu_id, date_time) VALUES ('$mu_id', '$date_time')";
		$result = mysqli_query($connection, $query);
		
		header("Location: meeting.php?meeting_id=$meeting_id");
	}
	else {
		header("Location: error.php?errorCode=authError");
		exit;
	}
	?>