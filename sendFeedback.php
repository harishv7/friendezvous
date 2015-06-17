<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	if (isset($_POST['submit'])){
        $feedback = mysqli_real_escape_string($connection, $_POST['feedback']);
		$query = "INSERT INTO feedbacks (feedback) VALUES ('".$feedback."')";
		$result = mysqli_query($connection, $query);
		if ($result){
			header("Location: contactUs.php?success=1");
		}
		else {
			header("Location: contactUs.php?success=0");
		}
	}
?>