<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	if (isset($_POST['add'])){
		$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
		$latitude = mysqli_real_escape_string($connection, $_POST['latitude']);
		$longitude = mysqli_real_escape_string($connection, $_POST['longitude']);
		$location = mysqli_real_escape_string($connection, $_POST['location']);
		
		$query = "SELECT location_id FROM locations WHERE name='$location'";
		$result = mysqli_query($connection, $query);
		$numResult = mysqli_num_rows($result);
		
		if ($numResult){
			$place = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$location_id = $place['location_id'];
		}
		else {
			$query = "INSERT INTO locations (name, latitude, longitude) VALUES ('$location', '$latitude', '$longitude')";
			$result = mysqli_query($connection, $query);
			
			$query = "SELECT location_id FROM locations WHERE name='$location'";
			$result = mysqli_query($connection, $query);
			
			$place = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$location_id = $place['location_id'];
		}
		
		$query = "SELECT * FROM meeting_locations WHERE meeting_id='$meeting_id' && location_id='$location_id'";
		$result = mysqli_query($connection, $query);
		$numResult = mysqli_num_rows($result);
		
		if (!$numResult){
			$query = "INSERT INTO meeting_locations (meeting_id, location_id, proposed_user_id) VALUES ('$meeting_id', '$location_id', '$user_id')";
			$result = mysqli_query($connection, $query);
			
			$query = "UPDATE meeting_users SET user_location_id='$location_id' WHERE meeting_id='$meeting_id' && user_id='$user_id'";
			$result = mysqli_query($connection, $query);
			
			header("Location: meeting.php?meeting_id=$meeting_id");
		}
		else {
			echo 'The location you specified has already been proposed.';
		}
	}
?>