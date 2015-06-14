<?php
	include 'includes/dbConnect.php';
	
	$query =	'CREATE TABLE users(
						user_id INT NOT NULL AUTO_INCREMENT, 
						email VARCHAR(255) UNIQUE NOT NULL, 
						password_hash VARCHAR(63) NOT NULL, 
						full_name VARCHAR(255) NOT NULL, 
						birth_date DATETIME DEFAULT NULL, 
						gender CHAR(1) DEFAULT NULL, 
						location VARCHAR(255) DEFAULT NULL, 
						last_login DATETIME DEFAULT NULL, 
						activated BOOLEAN NOT NULL DEFAULT 0, 
						activate_hash VARCHAR(63) NOT NULL, 
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
						user_latitude FLOAT DEFAULT NULL, 
						user_longitude FLOAT DEFAULT NULL, 
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
						date_time DATETIME NOT NULL DEFAULT NOW(),
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
?>