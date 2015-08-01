<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
?>
<!DOCTYPE html>
<html>
	
    <?php
		include 'includes/header.php';
	?>
	
    <body>
        <?php
			include 'includes/navigationBar.php';
		?>

		<div class="dashboard">
		<div class="dashboard-image" style="background-image: url(assets/images/2.jpg);"></div>
            <div class="container" style="margin-top: 35px;">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center" style="color:#fff">Dashboard</h1>
					</div>
				</div>
                <div class="row">
					<div class="col-md-12" id="accordion">
						<p>View your upcoming meetings</p>
						<div class="meeting-container">
							<?php								
								$query = "SELECT * FROM meeting_users WHERE user_id = '".$user_id."' ORDER BY meeting_id DESC";
								$result = mysqli_query($connection, $query);
								
								$noMeetings = true;
								
								while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
									$query = "SELECT * FROM meetings WHERE meeting_id = '".$row['meeting_id']."'";
									$meetingObj = mysqli_query($connection, $query);
									$meeting = mysqli_fetch_array($meetingObj, MYSQLI_ASSOC);
									$meetingDate = new DateTime($meeting['date_time']);
									$currentDate = new DateTime();
									if ($meetingDate > $currentDate){
										if ($noMeetings){
											$noMeetings = false;
										}
										echo '<a href="';
										echo "meeting.php?meeting_id=$meeting[meeting_id]";
										echo '" style="color:#00FF00;">';
										echo $meeting['name'];
										echo '</a>';
										echo '<br>';
									}
									else if ($meeting['date_time'] == NULL){
										if ($noMeetings){
											$noMeetings = false;
										}
										echo '<a href="';
										echo "meeting.php?meeting_id=$meeting[meeting_id]";
										echo '" style="color:#000000;">';
										echo $meeting['name'];
										echo '</a>';
										echo '<br>';
									}
								}
								if ($noMeetings) {
									echo 'You have no upcoming meetings.';
								}
								echo '<hr>* Meetings in <font color="#00FF00">green</font> are finalized.';
							?>
						</div>
					
						<p>Create a new meeting</p>
						<div class="create-meeting-container">
							<form role="form" method="post" action="addMeeting.php">
								<div class="form-group">
									<label><font color="#000000">Meeting name:</font></label>
									<input type="text" class="form-control" placeholder="Meeting name (required)" id="name" name="name" required>
								</div>
								<div class="form-group">
									<label><font color="#000000">Meeting description:</font></label>
									<input type="text" class="form-control" placeholder="Meeting description (optional)" id="description" name="description">
								</div>
								<div class="form-group">
									<input type="submit" class="custom-btn3 btn-default" value="Submit" id="submit" name="submit">
								</div>
							</form>
						</div>
						
						<p>Your friends</p>
						<div class="row">
							<div class="friendlist-container col-md-6">
								Your friends list
								<hr>
								<?php
									$query = "SELECT * FROM friendships WHERE user1_id=$user_id || user2_id=$user_id";
									$result = mysqli_query($connection, $query);
									$numResult = mysqli_num_rows($result);
									if ($numResult == 0){
										echo 'You have not added any friends.';
									}
									else {
										while ($row = mysqli_fetch_array($result)){
											if ($row['user1_id'] == $user_id){
												$query = "SELECT * FROM users WHERE user_id=$row[user2_id]";
											}
											else {
												$query = "SELECT * FROM users WHERE user_id=$row[user1_id]";
											}
											$result2 = mysqli_query($connection, $query);
											$currentFriend = mysqli_fetch_array($result2);

											echo "<a href='viewProfile.php?target_id=$currentFriend[user_id]'>";
											echo $currentFriend['full_name'];
											echo "</a>";
											echo "&nbsp";
										}
									}
								?>
							</div>
							<div class="add-friend-container col-md-6">
								<form role="form" method="post" action="addFriend.php" autocomplete="off">
									<div class="form-group">Type in your friends' name to look for them:</div>
									<div class="form-group">
										<div class="input_container">
											<input type="text" class="form-control" id="user_id" name="target_email" onkeyup="autocomplet()">
											<ul id="user_list_id"></ul>
										</div>
									</div>
									<div class="form-group" align="right">
										<input type="submit" class="custom-btn3 btn-default" value="Add as friend" id="add" name="add">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>							