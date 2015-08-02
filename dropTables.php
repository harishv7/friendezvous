<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';

	$query = "DROP TABLE users";
	$result = mysqli_query($connection, $query);
	
	$query = "DROP TABLE meetings";
	$result = mysqli_query($connection, $query);
	
	$query = "DROP TABLE meeting_users";
	$result = mysqli_query($connection, $query);
	
	$query = "DROP TABLE meeting_locations";
	$result = mysqli_query($connection, $query);
	
	$query = "DROP TABLE locations";
	$result = mysqli_query($connection, $query);
	
	$query = "DROP TABLE mu_date_time";
	$result = mysqli_query($connection, $query);
	
	$query = "DROP TABLE feedbacks";
	$result = mysqli_query($connection, $query);
	
	$query = "DROP TABLE friendships";
	$result = mysqli_query($connection, $query);
	
	$query = "DROP TABLE notifications";
	$result = mysqli_query($connection, $query);
	
	echo "Dropped all tables succesfully";
?>