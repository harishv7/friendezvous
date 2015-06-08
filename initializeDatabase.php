<?php
	include 'dbConnect.php';
	
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
	
	$query =	'CREATE TABLE schedules(
						user_id INT NOT NULL AUTO_INCREMENT, 
						email VARCHAR(255) UNIQUE NOT NULL, 
						mon_avail_hash INT UNSIGNED NOT NULL DEFAULT 0, 
						tue_avail_hash INT UNSIGNED NOT NULL DEFAULT 0, 
						wed_avail_hash INT UNSIGNED NOT NULL DEFAULT 0, 
						thu_avail_hash INT UNSIGNED NOT NULL DEFAULT 0, 
						fri_avail_hash INT UNSIGNED NOT NULL DEFAULT 0, 
						sat_avail_hash INT UNSIGNED NOT NULL DEFAULT 0, 
						sun_avail_hash INT UNSIGNED NOT NULL DEFAULT 0, 
						PRIMARY KEY(user_id)
					) ENGINE = INNODB';
					
	$result = mysqli_query($connection, $query);
	if ($result){
		echo 'TABLE schedules created succesfully.';
	}
	else {
		echo 'Error in creating TABLE schedules.';
		echo '<br>';
		echo $result;
	}
	
	echo '<br>';
	
	$query =	'CREATE TABLE meetings(
						meeting_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
						name VARCHAR(255) NOT NULL, 
						description VARCHAR(255) DEFAULT NULL, 
						location INT NOT NULL DEFAULT 0, 
						date_time DATETIME NOT NULL, 
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
	
	$query =	'CREATE TABLE meetings_to_users(
						mapping_id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
						meeting_id INT UNSIGNED NOT NULL, 
						user_id INT UNSIGNED NOT NULL, 
						confirmed BOOLEAN DEFAULT 0, 
						user_location INT DEFAULT 0, 
						PRIMARY KEY(mapping_id)
					) ENGINE = INNODB';
					
	$result = mysqli_query($connection, $query);
	if ($result){
		echo 'TABLE meetings_to_users created succesfully.';
	}
	else {
		echo 'Error in creating TABLE meetings_to_users.';
		echo '<br>';
		echo $result;
	}
	
	echo '<br>';
?>