<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	$query = "SELECT * FROM users WHERE user_id='$user_id'";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if (!$result || $row['access_level'] < 2){
		header("Location: error.php");
	}
	
	$query =	'CREATE TABLE users(
						user_id INT NOT NULL AUTO_INCREMENT, 
						fb_id VARCHAR(100) UNIQUE DEFAULT NULL, 
						email VARCHAR(255) UNIQUE NOT NULL, 
						password_hash VARCHAR(63) DEFAULT NULL, 
						full_name VARCHAR(255) NOT NULL, 
						birth_date DATETIME DEFAULT NULL, 
						gender CHAR(1) DEFAULT NULL, 
						location VARCHAR(255) DEFAULT NULL, 
						last_login DATETIME DEFAULT NULL, 
						activated BOOLEAN NOT NULL DEFAULT 0, 
						activate_hash VARCHAR(63) DEFAULT NULL, 
						access_level INT NOT NULL DEFAULT 0, 
						PRIMARY KEY(user_id), 
						UNIQUE INDEX(email)
					) ENGINE = INNODB';
					
	$result = mysqli_query($connection, $query);
	if ($result){
		echo 'TABLE users created succesfully.';
	}
	else {
		echo 'Error in creating TABLE users.';
		echo '<br>';
		echo $result;
	}
	
	echo '<br>';
	
	$query =	'CREATE TABLE meetings(
						meeting_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
						name VARCHAR(255) NOT NULL, 
						description VARCHAR(255) DEFAULT NULL, 
						finalized BOOLEAN NOT NULL DEFAULT 0, 
						location VARCHAR(255) DEFAULT NULL, 
						latitude FLOAT DEFAULT NULL, 
						longitude FLOAT DEFAULT NULL, 
						date_time DATETIME DEFAULT NULL, 
						PRIMARY KEY(meeting_id)
					) ENGINE = INNODB';
					
	$result = mysqli_query($connection, $query);
	if ($result){
		echo 'TABLE meetings created succesfully.';
	}
	else {
		echo 'Error in creating TABLE meetings.';
		echo '<br>';
		echo $result;
	}
	
	echo '<br>';
	
	$query =	'CREATE TABLE meeting_users(
						mu_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
						meeting_id INT UNSIGNED NOT NULL, 
						user_id INT UNSIGNED NOT NULL, 
						user_confirmed BOOLEAN DEFAULT 0, 
						user_location_id INT UNSIGNED DEFAULT NULL, 
						PRIMARY KEY(mu_id)
					) ENGINE = INNODB';
					
	$result = mysqli_query($connection, $query);
	if ($result){
		echo 'TABLE meeting_users created succesfully.';
	}
	else {
		echo 'Error in creating TABLE meeting_users.';
		echo '<br>';
		echo $result;
	}
	
	echo '<br>';
	
	$query =	'CREATE TABLE meeting_locations(
						ml_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
						meeting_id INT UNSIGNED NOT NULL, 
						location_id INT UNSIGNED NOT NULL, 
						num_votes INT UNSIGNED DEFAULT 1, 
						proposed_user_id INT UNSIGNED NOT NULL, 
						PRIMARY KEY(ml_id)
					) ENGINE = INNODB';
					
	$result = mysqli_query($connection, $query);
	if ($result){
		echo 'TABLE meeting_locations created succesfully.';
	}
	else {
		echo 'Error in creating TABLE meeting_locations.';
		echo '<br>';
		echo $result;
	}
	
	echo '<br>';
	
	$query =	'CREATE TABLE locations(
						location_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
						name VARCHAR(255) NOT NULL, 
						description VARCHAR(255) DEFAULT NULL, 
						latitude FLOAT DEFAULT NULL, 
						longitude FLOAT DEFAULT NULL, 
						rating FLOAT DEFAULT 0, 
						num_rating INT DEFAULT 0, 
						PRIMARY KEY(location_id)
					) ENGINE = INNODB';
					
	$result = mysqli_query($connection, $query);
	if ($result){
		echo 'TABLE locations created succesfully.';
	}
	else {
		echo 'Error in creating TABLE locations.';
		echo '<br>';
		echo $result;
	}
	
	echo '<br>';
	
	$query =	'CREATE TABLE mu_date_time(
						mudt_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
						mu_id INT UNSIGNED NOT NULL, 
						date_time DATETIME DEFAULT NULL, 
						PRIMARY KEY(mudt_id)
					) ENGINE = INNODB';
					
	$result = mysqli_query($connection, $query);
	if ($result){
		echo 'TABLE mu_date_time created succesfully.';
	}
	else {
		echo 'Error in creating TABLE mu_date_time.';
		echo '<br>';
		echo $result;
	}
	
	echo '<br>';
	
	$query =	'CREATE TABLE feedbacks(
						feedback_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
						feedback VARCHAR(255) NOT NULL, 
						date_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
						PRIMARY KEY(feedback_id)
					) ENGINE = INNODB';
					
	$result = mysqli_query($connection, $query);
	if ($result){
		echo 'TABLE feedbacks created succesfully.';
	}
	else {
		echo 'Error in creating TABLE feedbacks.';
		echo '<br>';
		echo $result;
	}
	
	echo '<br>';
	
	$query =	'CREATE TABLE friendships(
						friendship_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
						user1_id INT NOT NULL, 
						user2_id INT NOT NULL, 
						date_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
						PRIMARY KEY(friendship_id)
					) ENGINE = INNODB';
					
	$result = mysqli_query($connection, $query);
	if ($result){
		echo 'TABLE friendships created succesfully.';
	}
	else {
		echo 'Error in creating TABLE friendships.';
		echo '<br>';
		echo $result;
	}
	
	echo '<br>';
	
	$query =	'CREATE TABLE notifications(
						notification_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
						user_id INT NOT NULL, 
						notification_message VARCHAR(255) NOT NULL, 
						notification_link VARCHAR(255) DEFAULT NULL, 
						notification_read BOOLEAN NOT NULL DEFAULT 0, 
						date_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
						PRIMARY KEY(notification_id)
					) ENGINE = INNODB';
					
	$result = mysqli_query($connection, $query);
	if ($result){
		echo 'TABLE notifications created succesfully.';
	}
	else {
		echo 'Error in creating TABLE notifications.';
		echo '<br>';
		echo $result;
	}
?>