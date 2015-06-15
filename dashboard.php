<?php
	session_start();
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
		
		<link rel="stylesheet" type="text/css" href="assets/css/component.css" />
		<script src="assets/js/modernizr.custom.js"></script>
		
		<div class="coverCustom">
		<div class="coverCustom-image" style="background-image: url(https://unsplash.imgix.net/photo-1418065460487-3e41a6c84dc5?q=25&amp;fm=jpg&amp;s=127f3a3ccf4356b7f79594e05f6c840e);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Dashboard</h1>
					</div>
				</div>
                <div class="row">
					<div class="col-md-12" style="background-color: rgba(255, 255, 255, 0.5); padding: 0.5em;">
						<ul id="cbp-ntaccordion" class="cbp-ntaccordion">
						<li>
							<h4 class="cbp-nttrigger">Your upcoming meetings</h4>
							<div class="cbp-ntcontent">
								
								<?php
									$user_id = $_SESSION['user_id'];
									$name = $_SESSION['name'];
									$email = $_SESSION['email'];
									
									include 'includes/dbConnect.php';
									
									$query = "SELECT * FROM meeting_users WHERE user_id = '".$user_id."'";
									$result = mysqli_query($connection, $query);
									
									$noMeetings = true;
									
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
										$query = "SELECT * FROM meetings WHERE meeting_id = '".$row['meeting_id']."'";
										$meetingObj = mysqli_query($connection, $query);
										
										$meeting = mysqli_fetch_array($meetingObj, MYSQLI_ASSOC);
										$meetingDate = new DateTime($meeting['date_time']);
										$currentDate = new DateTime();
										if ($meetingDate > $currentDate || $meeting['date_time'] == NULL){
											if ($noMeetings){
												echo '<ul class="cbp-ntsubaccordion">';
												$noMeetings = false;
											}
											echo '<li>';
												echo '<h5 class="cbp-nttrigger">';
													echo $meeting['name'];
												echo '</h5>';
												echo '<div class="cbp-ntcontent">';
												echo '<p>';
													echo 'Description: ';
													echo $meeting['description'];
													echo '<br>';
													echo 'Location: ';
													echo $meeting['latitude'];
													echo ', ';
													echo $meeting['longitude'];
													echo '<br>';
													echo 'Date/Time: ';
													echo $meeting['date_time'];
													echo '<br>';
												echo '</p>';
												echo '</div>';
											echo '</li>';
										}
									}
									if (!$noMeetings){
										echo '</ul>';
									}
									else {
										echo 'You have no upcoming meetings.';
									}
								?>
								
							</div>
						</li>
						
						<li>
							<h4 class="cbp-nttrigger">Create a new meeting</h4>
							<div class="cbp-ntcontent">
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
						<li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="assets/js/jquery.cbpNTAccordion.min.js"></script>
		<script>
			$( function() {
				/*
				- how to call the plugin:
				$( selector ).cbpNTAccordion( [options] );
				- destroy:
				$( selector ).cbpNTAccordion( 'destroy' );
				*/

				$( '#cbp-ntaccordion' ).cbpNTAccordion();

			} );
		</script>
		
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>							