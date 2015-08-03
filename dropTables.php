<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';

	$query = "SELECT * FROM users WHERE user_id='$user_id'";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if (!$result || $row['access_level'] < 2){
		header("Location: error.php");
	}
	
	$query = "DROP TABLE users";
	$result1 = mysqli_query($connection, $query);
	
	$query = "DROP TABLE meetings";
	$result2 = mysqli_query($connection, $query);
	
	$query = "DROP TABLE meeting_users";
	$result3 = mysqli_query($connection, $query);
	
	$query = "DROP TABLE meeting_locations";
	$result4 = mysqli_query($connection, $query);
	
	$query = "DROP TABLE locations";
	$result5 = mysqli_query($connection, $query);
	
	$query = "DROP TABLE mu_date_time";
	$result6 = mysqli_query($connection, $query);
	
	$query = "DROP TABLE feedbacks";
	$result7 = mysqli_query($connection, $query);
	
	$query = "DROP TABLE friendships";
	$result8 = mysqli_query($connection, $query);
	
	$query = "DROP TABLE notifications";
	$result9 = mysqli_query($connection, $query);
	
	if ($result1 && $result2 && $result3 && $result4 && $result5 && $result6 && $result7 && $result8 && $result9){
		echo "Dropped all tables succesfully";
	}
	else {
		echo "Failed to drop one or more table(s)."
	}
?>