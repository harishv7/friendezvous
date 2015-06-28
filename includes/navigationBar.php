<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hvr-wobble-vertical" href="index.php"><span>Friendezvous</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="custom-nav hvr-underline-reveal">
                    <a href="index.php">Home</a>
                </li>

                <?php
					if (isset($_SESSION['name'])){
						echo '
						<li class="custom-nav hvr-underline-reveal">
							<a href="dashboard.php">Dashboard</a>
						</li>
						';
						$query = "SELECT * FROM notifications WHERE user_id=$user_id && notification_read=0";
						$result = mysqli_query($connection, $query);
						$numResult = mysqli_num_rows($result);
						echo '
							<li class="custom-nav hvr-underline-reveal">
								<a href="notifications.php">Notifications
							<sup>
						';
						echo $numResult;
						echo '
							</sup>
								</a>
							</li>
						';
					}
                ?>
                <li class="custom-nav hvr-underline-reveal">
                    <a href="about.php">About</a>
                </li>
                <li class="custom-nav hvr-underline-reveal">
                    <a href="contactUs.php">Contact Us</a>
                </li>


                <?php
					if (isset($_SESSION['name'])){
						echo '
							<li class="custom-nav hvr-underline-reveal">
								<a href="profile.php">'; echo $_SESSION['name']; echo '</a>
							</li>
							<li class="custom-nav hvr-underline-reveal">
								<a href="logout.php">Logout</a>
							</li>
						';
					}
					else {
						echo '
							<li class="dropdown custom-nav">
								<a class="dropdown-toggle hvr-underline-reveal" href="#" data-toggle="dropdown"> Login </a>
								<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px; min-width: 200px;">

									<form role="form" method="post" action="loginProcess.php">
										<div class="form-group">
											<label for="username">Email:</label>
											<input type="email" class="form-control" placeholder="Your email" id="email" name="email">
										</div>
										<div class="form-group">
											<label for="password">Password:</label>
											<input type="password" class="form-control" placeHolder="Your password" id="password" name="password">
										</div>
										<div class="checkbox">
											<label><input type="checkbox" id="remember" name="remember">Remember me</label>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-default" value="Login" id="login" name="login">
										</div>
									</form>

								</div>
							</li>
							<li class="custom-nav hvr-underline-reveal">
								<a href="signUp.php">Sign Up</a>
							</li>
						';
					}
                ?>

            </ul>
        </div>
    </div>
</div>