<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	$query = "UPDATE notifications SET notification_read=1 WHERE user_id=$user_id";
	$result = mysqli_query($connection, $query);
	
	header("Location: notifications.php");
?>