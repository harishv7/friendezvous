<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
	$mudt_id = mysqli_real_escape_string($connection, $_GET['mudt_id']);
	
	$query = "SELECT * FROM meeting_users WHERE meeting_id='$meeting_id'";
	$result = mysqli_query($connection, $query);
	$owner = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if ($owner['user_id'] != $user_id || !$result){
		echo 'in';
		header("Location: error.php");
	}
	
	echo 'pass';
	
	$query = "SELECT * FROM meeting_users WHERE meeting_id='".$meeting_id."' && user_id='".$user_id."'";
	$result = mysqli_query($connection, $query);
	if ($result){
		$mu = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$mu_id = $mu['mu_id'];
		
		
		$query = "SELECT * FROM mu_date_time WHERE mu_id=$mu_id && mudt_id=$mudt_id";
		$result = mysqli_query($connection, $query) OR DIE(mysqli_error($connection));
		$mu_date_time = mysqli_fetch_array($result);
		$date_time = $mu_date_time['date_time'];
		
		// delete participant's timeslot
		$query = "SELECT * FROM meeting_users WHERE meeting_id=$meeting_id";
		$result = mysqli_query($connection, $query) OR DIE(mysqli_error($connection));
		while ($currentUser = mysqli_fetch_array($result)){
			$current_mu_id = $currentUser['mu_id'];
			if ($current_mu_id != $mu_id){
				$query = "DELETE FROM mu_Date_time WHERE mu_id=$current_mu_id && date_time='$date_time'";
				$result2 = mysqli_query($connection, $query) OR DIE(mysqli_error($connection));
			}
		}
		
		// delete owner's timeslot
		$query = "DELETE FROM mu_date_time WHERE mu_id=$mu_id && mudt_id=$mudt_id";
		$result = mysqli_query($connection, $query);
		
		header("Location: meeting.php?meeting_id=$meeting_id");
	}
	else {
		header("Location: error.php");
	}
?>