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
                        <h1 class="text-center" style="color:#000;">
							<?php
								echo $name;
								echo "'s ";
							?>
							Profile
						</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php
							$query = "SELECT * FROM users WHERE user_id='$user_id'";
							$result = mysqli_query($connection, $query);
							$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						?>
						
						<form role="form" method="post" class="profile-form" action="updateProfile.php" style="float: none;margin-left: auto;margin-right: auto;">
						<h4>Profile picture:</h4>
						<?php
							if (isset($fb_id)){
								echo "<img src='http://graph.facebook.com/$fb_id/picture?type=large&width=200&height=200'>";
							}
							else {
								echo "<img src='assets/images/empty-profile-picture.jpg' width=200 height=200>";
							}
						?>
						<br>
						<hr>
						
						<h4>Full name:</h4>
						<b>
						<input type="text" name="full_name" size="32" style="border: 0" value="<?php echo $row['full_name']; ?>" readonly required />
						<input name="Edit" class="custom-btn5 hvr-bob btn-default" type="button" value="Edit">
						</b>
						<br>
						<hr>
						
						<h4>Email:</h4>
						<b>
						<input type="text" name="email" size="32" style="border: 0; background: none;" value="<?php echo $row['email']; ?>" disabled />
						</b>
						<br>
						<hr>
						
						<h4>Birth date:</h4>
						<b>
						<input type="text" name="birth_date" size="32" style="border: 0; background: none;" value="<?php if (isset($row['birth_date'])) echo date_format(date_create($row['birth_date']), 'jS F Y'); ?>" disabled />
						</b>
						<br>
						<hr>
						
						<h4>Gender:</h4>
						<b>
						<input type="text" name="gender" size="32" style="border: 0" value="<?php echo $row['gender']; ?>" readonly required />
						<input name="Edit" class="custom-btn5 hvr-bob btn-default" type="button" value="Edit">
						</b>
						<br>
						<hr>
						
						<h4>Location:</h4>
						<b>
						<input type="text" name="location" size="32" style="border: 0" value="<?php echo $row['location']; ?>" readonly required />
						<input name="Edit" class="custom-btn5 hvr-bob btn-default" type="button" value="Edit">
						</b>
						<br>
						<hr>
						
						<h4>Last login:</h4>
						<b>
						<input type="text" name="last_login" size="32" style="border: 0; background: none;" value="<?php echo $row['last_login']; ?>" disabled />
						</b>
						<br>
						<hr>
						
						<script type="text/javascript">
							$('[name="Edit"]').on('click', function() {
								var prev = $(this).prev('input'),
									ro   = prev.prop('readonly');
								prev.prop('readonly', !ro).focus();
								$(this).val(ro ? 'Save' : 'Edit');
							});
						</script>
						<input type="submit" class="custom-btn3 hvr-float btn-default" name="update" value="Save Changes">
						<button onclick="window.location.href='profile.php'" class="custom-btn3 hvr-float btn-default" name="cancel">Cancel</button>
						
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