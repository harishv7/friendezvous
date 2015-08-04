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
		
		<?php
			$meeting_id = mysqli_real_escape_string($connection, $_GET['meeting_id']);
			$query = "SELECT * FROM meeting_users WHERE meeting_id=$meeting_id";
			$result = mysqli_query($connection, $query);
			$owner = mysqli_fetch_array($result);
			$owner_id = $owner['user_id'];
			if ($owner_id == $user_id) $owner = true;
			else $owner = false;
			
			$query = "SELECT * FROM meeting_users WHERE meeting_id=$meeting_id && user_id=$user_id";
			$result = mysqli_query($connection, $query);
			$numResult = mysqli_num_rows($result);
			
			if (!$numResult){
				header("Location: error.php");
				exit;
			}
		?>

		<div class="section" style="background-image: url(assets/images/pattern.jpg);">
			<div class="container overlay-meeting">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center">Organize Meeting</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php
							$query = "SELECT * FROM meeting_users WHERE meeting_id=$meeting_id && user_id=$user_id";
							$result = mysqli_query($connection, $query);
							$numResult = mysqli_num_rows($result);
							
							if (!$numResult){
								echo '<h3 class="text-center">You are not authorized.</h3>';
							}
							else {
								$mu = mysqli_fetch_array($result, MYSQLI_ASSOC);
								$mu_id = $mu['mu_id'];
							
								$query = "SELECT * FROM meetings WHERE meeting_id=$meeting_id";
								$result = mysqli_query($connection, $query);
								$meeting = mysqli_fetch_array($result, MYSQLI_ASSOC);
								
								echo '<h3 class="text-center">';
								echo $meeting['name'];
								echo '</h3>';
								echo '<h4 class="text-center">';
								echo $meeting['description'];
								echo '</h4>';
								echo '<hr>';
							}
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php
							if (!$meeting['finalized']){
								echo '<h4>Your declared timeslots</h4>';
								$query = "SELECT * FROM mu_date_time WHERE mu_id=$mu_id";
								$result = mysqli_query($connection, $query);
								$numResult = mysqli_num_rows($result);
								if (!$numResult){
									echo '<b>You have no declared timeslots for this meeting.</b>';
								}
								else {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
										echo "<b>";
										echo $row['date_time'];
										echo "</b>";
										echo '&nbsp';
										echo "<a href='removeTimeslot.php?";
										echo "meeting_id=$meeting_id&mudt_id=$row[mudt_id]' class='custom-btn5 hvr-grow-shadow'>remove</a>";
										if ($owner){
											echo "<a href='finalizeMeeting.php?";
											$encoded_date_time = urlencode($row['date_time']);
											echo "meeting_id=$meeting_id&date_time=$encoded_date_time' class='custom-btn5 hvr-grow-shadow'>finalize</a>";
											echo ' --> ';
											$query = "SELECT * FROM meeting_users WHERE meeting_id=$meeting_id";
											$participant_list = mysqli_query($connection, $query);
											
											$numAttending = 0;
											
											while ($participant = mysqli_fetch_array($participant_list)){
												$participant_mu_id = $participant['mu_id'];
												$query = "SELECT * FROM mu_date_time WHERE mu_id=$participant_mu_id && date_time='$row[date_time]'";
												$result2 = mysqli_query($connection, $query);
												$isAttending = mysqli_num_rows($result2);
												if ($isAttending) $numAttending++;
											}
											
											echo $numAttending;
											echo ' person(s) attending';
										}
										echo '<br>';
									}
									if ($owner){
										echo '<br>';
										echo '<font color="red">* Participants will not be able to change their accepted timeslots once you finalize the meeting.</font>';
									}
								}
								echo '<hr>';
						
						
						
								echo '<h4>Declare a new timeslot</h4>';
								if ($owner){
									echo '
										<form role="form" method="post" action="declareTimeslot.php?meeting_id=';
										echo $meeting_id;
										echo '">
											<div class="form-group">
												<label><font color="#000000">Date/Time:</font></label><br>
												<div class="row">
													<div class="col-sm-6">
														<input type="text" class="form-control" id="datetimepicker4" name="date_time" style="color:#000;">
													</div>
													<script type="text/javascript">
														$(function () {
															$("#datetimepicker4").datetimepicker({
																format: "YYYY-MM-DD HH:mm", 
																sideBySide: true
															});
														});
													</script>
												</div>
											</div>
											<div class="form-group">
												<input type="submit" class="custom-btn5 hvr-grow-shadow btn-default" value="Declare" id="declare" name="declare">
											</div>
										</form>
									';
								}
								else {
									$query = "SELECT * FROM meeting_users WHERE meeting_id=$meeting_id && user_id=$owner_id";
									$result = mysqli_query($connection, $query);
									$owner_mu = mysqli_fetch_array($result);
									$owner_mu_id = $owner_mu['mu_id'];
									
									$query = "SELECT * FROM mu_date_time WHERE mu_id=$owner_mu_id";
									$result = mysqli_query($connection, $query);
									
									$i=0;
									while ($row = mysqli_fetch_array($result)){
										$query = "SELECT * FROM mu_date_time WHERE mu_id=$mu_id && date_time='$row[date_time]'";
										$result2 = mysqli_query($connection, $query);
										$exist = mysqli_num_rows($result2);
										if (!$exist){
											echo $row['date_time'];
											echo '&nbsp';
											echo '<a href="acceptTimeslot.php?meeting_id=';
											echo $meeting_id;
											echo '&date_time=';
											$encoded_date_time = urlencode($row['date_time']);
											echo $encoded_date_time;
											echo '">';
											echo 'accept';
											echo '</a>';
											echo '<br>';
										}
									}
								}
								echo '<hr>';
						

						
								echo '<h4>Meeting participants</h4>';
								$query = "SELECT * FROM meeting_users WHERE meeting_id=$meeting_id";
								$result = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
									$query = "SELECT * FROM users WHERE user_id=$row[user_id]";
									$result2 = mysqli_query($connection, $query);
									$participant = mysqli_fetch_array($result2, MYSQLI_ASSOC);
									echo "<a href='viewProfile.php?target_id=$participant[user_id]'>";
									echo "<b>";
									echo $participant['full_name'];
									echo "</b>";
									echo "</a>";
									if ($owner){
										echo '&nbsp';
										echo "<a href='removeParticipant.php?";
										echo "meeting_id=$meeting_id&participant_id=$participant[user_id]' class='custom-btn5 hvr-grow-shadow'>remove</a>";
									}
									echo '<br>';
								}
								echo '<hr>';
		
								if ($owner){
									echo '<h4>Add participants</h4>';
									$query = "SELECT * FROM mu_date_time WHERE mu_id=$mu_id";
									$result = mysqli_query($connection, $query);
									$numResult = mysqli_num_rows($result);
									if (!$numResult){
										echo 'You have to declare at least one timeslot to invite your friend(s).';
									}
									else {
										$query = "SELECT * FROM friendships WHERE user1_id=$user_id || user2_id=$user_id";
										$result = mysqli_query($connection, $query);
										$numResult = mysqli_num_rows($result);
										
										if ($numResult == 0){
											echo 'You have not added any friends into your friends list.';
										}
										else {
											echo '
											<form id="addParticipant" role="form" method="post" action="addParticipant.php?meeting_id=';
											echo $meeting_id;
											echo '" autocomplete="off">
												<div class="form-group">
													<div class="row">
														<div class="col-sm-6">
															<div class="input_container">
																<input type="text" style="color:#000;" class="form-control" id="user_id" name="target_email" onkeyup="autocomplet()">
																<ul id="user_list_id"></ul>
															</div>
														</div>
													</div>
												</div>
											</form>';
											
											echo "<script type='text/javascript'>
														$('#selectUser').on('click', function() {
															$('#addParticipant').submit()
														})
													 </script>";
										}
									}
									echo '<hr>';
								}
								
								echo '<h4>Proposed meeting locations</h4>';
								$query = "SELECT * FROM meeting_users WHERE meeting_id='$meeting_id' && user_id='$user_id'";
								$result = mysqli_query($connection, $query);
								$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
								if (isset($row['user_location_id'])){
									$user_location_declared = true;
									$user_location_id = $row['user_location_id'];
								}
								else {
									$user_location_declared = false;
								}
								
								$query = "SELECT * FROM meeting_locations WHERE meeting_id='$meeting_id'";
								$result = mysqli_query($connection, $query);
								$numResult = mysqli_num_rows($result);
								if (!$numResult){
									echo 'No meeting locations have been suggested.';
								}
								else {
									while ($meeting_location = mysqli_fetch_array($result, MYSQLI_ASSOC)){
										$location_id = $meeting_location['location_id'];
										$query = "SELECT * FROM locations WHERE location_id='$location_id'";
										$result2 = mysqli_query($connection, $query);
										$location = mysqli_fetch_array($result2, MYSQLI_ASSOC);
										echo "<a href='viewLocation.php?location_id=$location_id'>";
										echo $location['name'];
										echo "</a>";
										echo " --> ";
										echo "$meeting_location[num_votes] person(s) voted this.";
										
										if (!$user_location_declared){
											echo " ";
											echo "<a href='voteLocation.php?meeting_id=$meeting_id&location_id=$location_id'>";
											echo "Vote";
											echo "</a>";
										}
										else if ($user_location_declared && $user_location_id == $location['location_id']){
											echo " ";
											echo "You voted this.";
											echo " ";
											echo "<a href='unvoteLocation.php?meeting_id=$meeting_id&location_id=$location_id'>";
											echo "Unvote";
											echo "</a>";
										}
										echo '<br>';
									}
								}
								echo '<br>';
								if (!$user_location_declared){
									echo "<a href='addLocation.php?meeting_id=$meeting_id' class='custom-btn6 hvr-grow-shadow'>Suggest a new location</a> 
									<style>
										a:hover {
											text-decoration: none;
											color:#000;
										}
									</style>";
								}
							}
							else {
								echo "This meeting has been finalized and scheduled to take place on <b>$meeting[date_time]</b>.";
							}
						?>
					</div>
				</div>
			</div>
		</div>
		
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>