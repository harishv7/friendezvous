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
			</div>
		</div>
	</body>
</html>