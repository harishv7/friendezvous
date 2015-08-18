<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	include 'includes/library.php';
	
	$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
	$location_id = mysqli_real_escape_string($connection, $_GET['location_id']);
	
	// check if user is owner
	if ($user_id != getMeetingOwnerID($connection, $meeting_id)){
		header("Location: error.php");
		exit;
	}
	
	$query = "SELECT * FROM locations WHERE location_id='$location_id'";
	$result = mysqli_query($connection, $query);
	$location = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$location_name = $location['name'];
	$location_latitude = $location['latitude'];
	$location_langitude = $location['longitude'];
	
	$query = "UPDATE meetings SET location='$location_name', latitude='$location_latitude', longitude='$location_longitude' WHERE meeting_id=$meeting_id";
	$result = mysqli_query($connection, $query);
	
	header("Location: meeting.php?meeting_id=$meeting_id");
?>