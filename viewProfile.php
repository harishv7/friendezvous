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
		
		<div class="section" style="background-image: url(assets/images/try.jpg);">
			<div class="container overlay-profile-box">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">
							<?php
								$target_id = mysqli_real_escape_string($connection, $_GET['target_id']);
								$query = "SELECT * FROM users WHERE user_id='$target_id'";
								$result = mysqli_query($connection, $query);
								$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
								echo $row['full_name'];
								echo "'s ";
							?>
							Profile
						</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php
							echo '<h4>Profile picture: ';
							echo '<br>';
							$query = "SELECT fb_id FROM users WHERE user_id='$target_id'";
							$target = mysqli_query($connection, $query);
							$target_fb = mysqli_fetch_array($target, MYSQLI_ASSOC);
							$target_fb_id = $target_fb['fb_id'];
							if (isset($target_fb_id)){
								echo "<img src='http://graph.facebook.com/$target_fb_id/picture?type=large&width=200&height=200'>";
							}
							else {
								echo "<img src='assets/images/empty-profile-picture.jpg' width=200 height=200>";
							}
							echo '<br><br>';
						
							echo '<h4>Full name: </h4>';
							echo '<br><b>';
							echo $row['full_name'];
							echo '</b><br>';
							echo '<br>';
							
							echo '<h4>Email: </h4>';
							echo '<br><b>';
							echo $row['email'];
							echo '</b><br>';
							echo '<br>';
							
							echo '<h4>Birth date: </h4>';
							echo '<br><b>';
							if (isset($row['birth_date'])){
								$birthdate = date_create($row['birth_date']);
								echo date_format($birthdate, 'jS F Y');
							}
							echo '</b><br>';
							echo '<br>';
							
							echo '<h4>Gender: </h4>';
							echo '<br><b>';
							echo $row['gender'];
							echo '</b><br>';
							echo '<br>';
							
							echo '<h4>Location: </h4>';
							echo '<br><b>';
							echo $row['location'];
							echo '</b><br>';
							echo '<br>';
							
							echo '<h4>Last login: </h4>';
							echo '<br><b>';
							echo $row['last_login'];
							echo '</b><br>';
							echo '<br>';
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