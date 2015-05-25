<!DOCTYPE html>
<html>
    
    <?php
		include 'head.php';
	?>
    
    <body>
        <?php
			include 'navigationBar.php';
		?>
		
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
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <form role="form" method="post" action="signUpProcess.php">
							<div class="form-group">
								<label><font color="#ffffff">Login particulars</font></label>
							</div>
                            <div class="form-group">
								<input type="email" class="form-control" placeholder="Your email (required)" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Your password (required)" id="password" name="password" required>
                            </div>
							<div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm your password (required)" id="passwordConfirm" name="passwordConfirm" required>
                            </div>
							<div class="form-group">
								<label><font color="#ffffff">Personal particulars</font></label>
							</div>
							<div class="form-group">
                                <input type="text" class="form-control" placeholder="Your full name (required)" id="name" name="name" required>
                            </div>
							<div class="checkbox">
								<label><input type="checkbox" id="agree" name="agree"><font color="#ffffff">I have read and agreed with Friendezvous' <a href="tc.php">terms & conditions<font></a></label>
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