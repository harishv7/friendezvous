<!DOCTYPE html>
<html>
    
    <?php
		include 'head.php';
	?>
    
    <body>
        <?php
			include 'navigationBar.php';
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#picker").birthdaypicker({
					placeholder: false
				});
			});
		</script>
		
		
        <div class="cover">
            <div class="cover-image" style="background-image : url('https://unsplash.imgix.net/photo-1418479631014-8cbf89db3431?q=75&amp;fm=jpg&amp;s=478a9a2196033db7c0bf3c8ba3707f4d')"></div>
            <div class="container" style="background:rgba(0, 0, 0, 0.5);";>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-inverse">Sign Up</h1>
                        <p class="text-inverse">Begin organising your meetings with Friendezvous!</p>
                        <br>
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
												<label><font color="#00ff00">
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
												<label><font color="#00ff00">
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
								<label><font color="#ffffff">Email</font></label>
								<input type="email" class="form-control" placeholder="Email (required)" id="email" name="email" required>
                            </div>
                            <div class="form-group">
								<label><font color="#ffffff">Password</font></label>
                                <input type="password" class="form-control" placeholder="Password (required)" id="password" name="password" required>
                            </div>
							<div class="form-group">
								<label><font color="#ffffff">Confirm password</font></label>
                                <input type="password" class="form-control" placeholder="Confirm password (required)" id="passwordConfirm" name="passwordConfirm" required>
                            </div>
							<div class="form-group">
								<label><font color="#ffffff">Full name</font></label>
                                <input type="text" class="form-control" placeholder="Full name (required)" id="name" name="name" required>
                            </div>
							<div class="form-group">
								<label><font color="#ffffff">Birthdate</font></label>
								<div class="picker" id="picker"></div>
							</div>
							<div class="form-group">
								<label><font color="#ffffff">Gender</font></label>
								<br>
								<input type="radio" name="gender" value="M"><font color="#ffffff"> Male</font></input> &nbsp &nbsp
								<input type="radio" name="gender" value="F"><font color="#ffffff"> Female</font></input> &nbsp &nbsp
								<input type="radio" name="gender" value="" checked="yes"><font color="#ffffff"> Do not specify</font></input>
							</div>
							<div class="form-group">
								<label><font color="#ffffff">Location</font></label>
                                <input type="text" class="form-control" placeholder="Location (optional)" id="location" name="location">
                            </div>
							<div class="checkbox">
								<label><input type="checkbox" id="agree" name="agree" value="agree"><font color="#ffffff">I have read and agreed with Friendezvous' <a href="tc.php">terms & conditions<font></a></label>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-default" value="Register" id="register" name="register">
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
		<?php
			include 'footer.php';
		?>
    </body>

</html>