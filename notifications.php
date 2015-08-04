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
			if (!isset($_SESSION['user_id'])){
				header("Location: error.php");
				exit;
			}
		?>
		
		<div class="section" style="background-image : url('assets/images/image1.jpeg')">
			<div class="container overlay-general">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">
							Notifications
						</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php
							$query = "SELECT * FROM notifications WHERE user_id=$user_id && notification_read=0";
							$result = mysqli_query($connection, $query);
							$numUnreadNotifications = mysqli_num_rows($result);
							
							$query = "SELECT * FROM notifications WHERE user_id=$user_id ORDER BY date_time DESC";
							$result = mysqli_query($connection, $query);
							$numNotifications = mysqli_num_rows($result);
							
							echo "You have <b>$numUnreadNotifications unread notifications</b> out of <b>$numNotifications notifications</b>.<hr>";
							
							if ($numNotifications){
								echo '<ul class="list-unstyled">';
								while ($notification = mysqli_fetch_array($result)){
									echo "<li>";
									if (!$notification['notification_read']){
										echo '(Unread) ';
									}
									echo $notification['date_time'];
									echo ' | ';
									if (isset($notification['notification_link'])){
										echo "<a href='$notification[notification_link]'>";
										echo $notification['notification_message'];
										echo "</a>";
									}
									else {
										echo $notification['notification_message'];
									}
									echo "</li>";
								}
								echo '</ul>';
							}
							echo '<p align="right">';
							echo '<a href="notificationsRead.php" class="custom-btn6 hvr-grow-shadow">';
							echo 'Mark all as read';
							echo '</a>';
							echo '<a href="clearNotifications.php" class="custom-btn6 hvr-grow-shadow">';
							echo 'Clear all notifications';
							echo '</a>';
							echo '</p>';
						?>
						<style>
							a:hover{
								text-decoration: none;
								color: #000;
							}
						</style>
					</div>
				</div>
			</div>
		</div>
		
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>