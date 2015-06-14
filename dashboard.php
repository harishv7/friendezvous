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
		
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Dashboard</h1>
					</div>
				</div>
                <div class="row">
					<div class="col-md-12">
						<h3 class="text-left">Your upcoming meetings:</h3>
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
										echo '<table border=1 width="100%" style="table-layout: fixed;">';
										echo '<tr align="center">';
											echo '<td>';
												echo 'Meeting Name';
											echo '</td>';
											echo '<td>';
												echo 'Description';
											echo '</td>';
											echo '<td>';
												echo 'Latitude';
											echo '</td>';
											echo '<td>';
												echo 'Longitude';
											echo '</td>';
											echo '<td>';
												echo 'Date/Time';
											echo '</td>';
										echo '</tr>';
										$noMeetings = false;
									}
									echo '<tr>';
										echo '<td>';
											echo $meeting['name'];
										echo '</td>';
										echo '<td>';
											if (!isset($meeting['description'])){
												echo 'N/A';
											}
											else {
												echo $meeting['description'];
											}
										echo '</td>';
										echo '<td>';
											if (!isset($meeting['latitude'])){
												echo 'N/A';
											}
											else {
												echo $meeting['latitude'];
											}
										echo '</td>';
										echo '<td>';
											if (!isset($meeting['longitude'])){
												echo 'N/A';
											}
											else {
												echo $meeting['longitude'];
											}
										echo '</td>';
										echo '<td>';
											if (!isset($meeting['date_time'])){
												echo 'N/A';
											}
											else {
												echo $meeting['date_time'];
											}
										echo '</td>';
									echo '</tr>';
								}
							}
							if (!$noMeetings){
								echo '</table>';
							}
							else {
								echo 'You have no upcoming meetings.';
							}
						?>
						
						<hr>
						
						<h3 class="text-left">Create a new meeting:</h3>
						
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
				</div>
			</div>
		</div>
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>							