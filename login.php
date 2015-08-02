<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	require_once 'src/Facebook/autoload.php';

	$fb = new Facebook\Facebook([
	  'app_id' => '702074069897274',
	  'app_secret' => '7ea5f72a8ff92561c439d0c9a1676858',
	  'default_graph_version' => 'v2.2',
	]);

	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email', 'public_profile']; // optional
	//$loginUrl = $helper->getLoginUrl('http://polar-gorge-5952.herokuapp.com/login-callback.php', $permissions);
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
        <div class="cover">
            <div class="cover-image" style="background-image : url('https://unsplash.imgix.net/photo-1418479631014-8cbf89db3431?q=75&amp;fm=jpg&amp;s=478a9a2196033db7c0bf3c8ba3707f4d')"></div>
            <div class="container" style="background:#fff; opacity:0.8; border-radius:30px;">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Login</h1>
                        <p >Begin organising your meetings with Friendezvous!</p>
                        <br>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-left">
                        <form role="form" method="post" action="loginProcess.php">
                            <div class="form-group">
								<label><font color="#000">Email</font></label>
								<input type="email" class="form-control" placeholder="Email (required)" id="email" name="email" required>
                            </div>
                            <div class="form-group">
								<label><font color="#000">Password</font></label>
                                <input type="password" class="form-control" placeholder="Password (required)" id="password" name="password" required>
                            </div>
							
							<div class="form-group" align="center">
								<input type="submit" class="custom-btn3 btn-default hvr-grow" value="Login" id="login" name="login">
							</div>
                        </form>
						<hr>
						<div class="form-group" align="center">
							<font color="#000"><strong>OR</strong></font><br>
						</div>
						<div class="form-group facebook-login" align="center">
							<?php
								echo '<a href="' . $loginUrl . '" id="fblogin" name="fblogin"><p class="custom-btn3 btn-default hvr-grow">Login with Facebook</p></a>';
							?>
							<style>
							.facebook-login p{
								font-size: 15px;
							}
							</style>
						</div>
                    </div>
                </div>
            </div>
        </div>
        
		<?php
			include 'includes/footer.php';
		?>
    </body>

</html>