<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	if (isset($_POST['declare'])){
		$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
		$date_time = mysqli_real_escape_string($connection, $_POST['date_time']);
		
		if (new DateTime($date_time) < new DateTime()){
			echo "Can't declare a past timeslot.";
			header("Location: error.php");
			exit;
		}
		
		$query = "SELECT * FROM meeting_users WHERE meeting_id='".$meeting_id."' && user_id='".$user_id."'";
		$result = mysqli_query($connection, $query);
		if ($result){
			$mu = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$mu_id = $mu['mu_id'];
			
			$query = "INSERT INTO mu_date_time (mu_id, date_time) VALUES ('".$mu_id."', '".$date_time."')";
			$result = mysqli_query($connection, $query);
			
			header("Location: meeting.php?meeting_id=$meeting_id");
		}
	}
?>