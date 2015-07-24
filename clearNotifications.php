<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	$query = "DELETE FROM notifications WHERE user_id=$user_id";
	$result = mysqli_query($connection, $query);
	
	header("Location: notifications.php");
?>