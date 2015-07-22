<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	
	if (isset($_POST['add'])){
		$target_email = mysqli_real_escape_string($connection, $_POST['target_email']);
		
		$query = "SELECT * FROM users WHERE email='".$target_email."'";
		$result = mysqli_query($connection, $query);
		$numResult = mysqli_num_rows($result);
		
		if ($numResult == 1){
			$friend = mysqli_fetch_array($result);
			$friend_id = $friend['user_id'];
			
			$query = "SELECT * FROM friendships WHERE (user1_id=$user_id && user2_id=$friend_id) || (user1_id=$friend_id && user2_id=$user_id)";
			$result = mysqli_query($connection, $query);
			$numResult = mysqli_num_rows($result);
			
			if ($numResult){
				echo 'You are both already friends.';
			}
			else if ($user_id == $friend_id){
				echo 'You can not add yourself as a friend.';
			}
			else {
				if ($user_id < $friend_id){
					$lower_id = $user_id;
					$higher_id = $friend_id;
				}
				else {
					$lower_id = $friend_id;
					$higher_id = $user_id;
				}
				$query = "INSERT INTO friendships (user1_id, user2_id) VALUES ($lower_id, $higher_id)";
				$result = mysqli_query($connection, $query);
				
				$query = "INSERT INTO notifications (user_id, notification_message) VALUES ('$friend_id', '$name has added you as a friend.')";
				$result = mysqli_query($connection, $query);
			}
			
			header("Location: dashboard.php");
		}
		else {
			echo 'Not found';
		}
	}
?>