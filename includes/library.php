<?php
	require_once 'includes/session.php';
	require_once 'includes/dbConnect.php';

	function getReal($var){
		return mysqli_real_escape_string($connection, $var);
	}

	// get the a specified meeting's fields from the meetings table
	function getMeetingFields($meeting_id){
		$query = "SELECT * FROM meetings WHERE meeting_id=$meeting_id LIMIT 1";
		$result = mysqli_query($connection, $query);
		return mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	
	// get the owner's user id of the meeting
	function getMeetingOwner($meeting_id){
		$query = "SELECT * FROM meeting_users WHERE meeting_id=$meeting_id LIMIT 1";
		$result = mysqli_query($connection, $query);
		$owner = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $owner['user_id'];
	}
	
	// check if this user is a meeting participant
	function isMeetingParticipant($meeting_id){
		$query = "SELECT * FROM meeting_users WHERE meeting_id=$meeting_id && user_id=$user_id LIMIT 1";
		$result = mysqli_query($connection, $query);
		$numResult = mysqli_num_rows($result);
		
		if ($numResult){
			return true;
		}
		else {
			return false;
		}
	}
	
	function getNumAttending($meeting_id, $date_time){
		$query = "SELECT * FROM meeting_users WHERE meeting_id=$meeting_id";
		$participant_list = mysqli_query($connection, $query);
		
		$numAttending = 0;
		while ($participant = mysqli_fetch_array($participant_list)){
			$participant_mu_id = $participant['mu_id'];
			$query = "SELECT * FROM mu_date_time WHERE mu_id=$participant_mu_id && date_time=$date_time";
			$mudt_list = mysqli_query($connection, $query);
			$isAttending = mysqli_num_rows($mudt_list);
			if ($isAttending) $numAttending++;
		}
		
		return $numAttending;
	}
?>