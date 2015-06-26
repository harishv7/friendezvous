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
		
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center">Organize Meeting</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php
							$meeting_id = $_GET['meeting_id'];
							
							$query = "SELECT * FROM meeting_users WHERE meeting_id='".$meeting_id."' && user_id='".$user_id."'";
							$result = mysqli_query($connection, $query);
							$numResult = mysqli_num_rows($result);
							
							if (!$numResult){
								echo '<h3 class="text-center">You are not authorized.</h3>';
							}
							else {
								$mu = mysqli_fetch_array($result, MYSQLI_ASSOC);
								$mu_id = $mu['mu_id'];
							
								$query = "SELECT * FROM meetings WHERE meeting_id='".$meeting_id."'";
								$result = mysqli_query($connection, $query);
								$meeting = mysqli_fetch_array($result, MYSQLI_ASSOC);
								
								echo '<h3 class="text-center">';
								echo $meeting['name'];
								echo '</h3>';
							}
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4>Your declared timeslots</h4>
						<?php
							$query = "SELECT * FROM mu_date_time WHERE mu_id='".$mu_id."'";
							$result = mysqli_query($connection, $query);
							$numResult = mysqli_num_rows($result);
							if (!$numResult){
								echo 'You have no declared timeslots for this meeting.';
							}
							else {
								while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
									echo $row['date_time'];
									echo '<br>';
								}
							}
						?>
						<hr>
						<h4>Declare a new timeslot</h4>
						<form role="form" method="post" action="declareTimeslot.php?meeting_id=<?php echo $meeting_id; ?>">
							<div class="form-group">
								<label><font color="#000000">Date/Time:</font></label><br>
								<div class="row">
									<div class='col-sm-6'>
										<input type='text' class="form-control" id='datetimepicker4' name="date_time">
									</div>
									<script type="text/javascript">
										$(function () {
											$('#datetimepicker4').datetimepicker({
												format: 'YYYY-MM-DD HH:mm:ss'
											});
										});
									</script>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-default" value="Declare" id="declare" name="declare">
							</div>
						</form>
						<hr>
						<h4>Invite your friends</h4>
						<?php
							if ($numResult == 0){
								echo 'You have to declare at least one timeslot to invite your friend(s).';
							}
							else {
								$query = "SELECT * FROM friendships WHERE user1_id='".$user_id."' || user2_id='".$user_id."'";
								$result = mysqli_query($connection, $query);
								$numResult = mysqli_num_rows($result);
								
								if ($numResult == 0){
									echo 'You have not added any friends into your friends list.';
								}
								else {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
										if ($row['user1_id'] == $user_id){
											$friend_id = $row['user2_id'];
										}
										else {
											$friend_id = $row['user1_id'];
										}
										$query = "SELECT * FROM users WHERE user_id='".$friend_id."'";
										$result2 = mysqli_query($connection, $query);
										$friend = mysqli_fetch_array($result2);
										echo $friend['full_name'].'<br>';
									}
								}
							}
						?>
						<hr>
						<h4>Finalize your meeting</h4>
						<button onclick="location.href='finalizeMeeting.php?meeting_id=<?php echo $meeting_id; ?>'" class="btn btn-default" id="finalize" name="finalize">Finalize</button>
					</div>
				</div>
			</div>
		</div>
		
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>