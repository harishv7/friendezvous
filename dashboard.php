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
		<div class="dashboard-image" style="background-image: url(https://unsplash.imgix.net/photo-1418065460487-3e41a6c84dc5?q=25&amp;fm=jpg&amp;s=127f3a3ccf4356b7f79594e05f6c840e);"></div>
            <div class="container" style="margin-top: 35px;">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Dashboard</h1>
					</div>
				</div>
                <div class="row">
					<div class="col-md-12" id="accordion">
						<p>View your schedule</p>
						<div class="schedule-container">
						</div>
						
						<p>View your upcoming meetings</p>
						<div class="meeting-container">
							<?php								
								$query = "SELECT * FROM meeting_users WHERE user_id = '".$user_id."'";
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
									<input type="submit" class="btn btn-default" value="Submit" id="submit" name="submit">
								</div>
							</form>
						</div>
						
						<p>Find your friends</p>
						<div class="add-friend-container">
							<form role="form" method="post" action="addFriend.php" autocomplete="off">
								<div class="form-group">Type in your friends' name to look for them:</div>
								<div class="form-group">
									<div class="input_container">
										<input type="text" class="form-control" id="user_id" name="target_email" onkeyup="autocomplet()">
										<ul id="user_list_id"></ul>
									</div>
								</div>
								<div class="form-group" align="right">
									<input type="submit" class="btn btn-default" value="Add as friend" id="add" name="add">
								</div>
							</form>
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