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
			if (isset($_SESSION['user_id'])){
				header("Location: error.php");
			}
		?>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("#picker").birthdaypicker({
					placeholder: false
				});
			});
		</script>
		
		
        <div class="cover">
            <div class="cover-image" style="background-image : url('assets/images/image1.jpeg')"></div>
            <div class="container" style="background:#fff; opacity:0.8; border-radius:30px; padding:10px;";>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Sign Up</h1>
                        <p>Begin organising your meetings with Friendezvous!</p>
                        <br>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-left">
                        <form role="form" method="post" action="signUpProcess.php">
							<?php
								if (isset($_GET['success'])){
									if ($_GET['success'] == false){
										$errorCode = $_GET['errorCode'];
									
										echo '
											<div class="form-group">
												<label><font color="#ff0000">
													<ul>
										';
										if (strpos($errorCode, 'e') !== false){
											echo '<li>The specified email already exists.</li>';
										}
										if (strpos($errorCode, 'p') !== false){
											echo '<li>Passwords do not match.</li>';
										}
										if (strpos($errorCode, 'a') !== false){
											echo '<li>You have not agreed to our terms & conditions.</li>';
										}
										echo '
													</ul>
												</font></label>
											</div>
										';
									}
									else {
										echo '
											<div class="form-group">
												<label><font color="ForestGreen">
													<ul>
										';
										echo '<li>You have registered succesfully.</li>';
										echo '<li>An activation link has been sent to your email.</li>';
										echo '<li>Please click on it to activate your account.</li>';
										echo '
													</ul>
												</font></label>
											</div>
										';
									}
								}
								else if (isset($_GET['activatedSuccess'])){
									if ($_GET['activatedSuccess'] == false){
										echo '
											<div class="form-group">
												<label><font color="#ff0000">
													<ul>
										';
										echo '<li>The specified account does not exist or is already activated.</li>';
										echo '
													</ul>
												</font></label>
											</div>
										';
									}
									else {
										echo '
											<div class="form-group">
												<label><font color="ForestGreen">
													<ul>
										';
										echo '<li>Your account is now activated.</li>';
										echo '<li>You may now login.</li>';
										echo '
													</ul>
												</font></label>
											</div>
										';
									}
								}
							?>
                            <div class="form-group">
								<label><font color="#000">Email</font></label>
								<input type="email" class="form-control" style="color:black;" placeholder="Email (required)" id="email" name="email" required>
                            </div>
                            <div class="form-group">
								<label><font color="#000">Password</font></label>
                                <input type="password" class="form-control" style="color:black;" placeholder="Password (required)" id="password" name="password" required>
                            </div>
							<div class="form-group">
								<label><font color="#000">Confirm password</font></label>
                                <input type="password" class="form-control" style="color:black;" placeholder="Confirm password (required)" id="passwordConfirm" name="passwordConfirm" required>
                            </div>
							<div class="form-group">
								<label><font color="#000">Full name</font></label>
                                <input type="text" class="form-control" style="color:black;" placeholder="Full name (required)" id="name" name="name" required>
                            </div>
							<div class="form-group">
								<label><font color="#000">Birthdate</font></label>
								<div class="picker" id="picker"></div>
							</div>
							<div class="form-group">
								<label><font color="#000">Gender</font></label>
								<br>
								<input type="radio" name="gender" value="M"><font color="#000"> Male</font>&nbsp &nbsp
								<input type="radio" name="gender" value="F"><font color="#000"> Female</font>&nbsp &nbsp
								<input type="radio" name="gender" value="" checked="yes"><font color="#000"> Do not specify</font>
							</div>
							<div class="form-group">
								<label><font color="#000">Location</font></label>
                                <input type="text" class="form-control" style="color:black;"  placeholder="Location (optional)" id="location" name="location">
                            </div>
							<div class="checkbox">
								<label><input type="checkbox" id="agree" name="agree" value="agree"><font color="#000">I have read and agreed with Friendezvous' <a href="tc.php">terms & conditions</a></font></label>
							</div>
							<div class="form-group" align="center">
								<input type="submit" class="custom-btn3 btn-default hvr-grow" value="Register" id="register" name="register">
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