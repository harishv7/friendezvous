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
                        <h1 class="text-center">Contact Us</h1>
                    </div>
					<?php
						if (isset($_GET['success'])){
							echo '<div class="row">';
								echo '<div class="col-md-12" align="center">';
									if ($_GET['success']){
										echo '<font color="#00FF00">Feedbacks received. Thank you for your feedbacks.</font>';
									}
									else {
										echo '<font color="#FF0000">Error in retrieving your feedbacks. Please contact our administrator.</font>';
									}
								echo '</div>';
							echo '</div>';
						}
					?>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/images/contact.png" class="img-responsive">
                    </div>
                    <div class="col-md-6">
						<h3 class="text-center">Leave us a feedback</h3>
                        <form role="form" method="post" action="sendFeedback.php">
                            <div class="form-group">
                                <label class="control-label" for="feedback">Your feedback(s):</label>
                                <textarea class="form-control" style="color:black;" id="feedback" name="feedback" placeholder="Enter your feedback(s) here"></textarea>
                            </div>
							<div class="form-group">
								<font color="#FF0000">* We will not store any credentials along with your feedback. (This feedback is anonymous)</font>
							</div>
                            <div class="form-group">
								<input type="submit" class="custom-btn3 hvr-grow-shadow btn-default" value="Submit" id="submit" name="submit">
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <img src="assets/images/Facebook_logo_(square).png" class="img-responsive img-rounded">
                        <h3>Find us on Facebook!</h3>
                        <p></p>
                        <p>Contact us via
                            <a href="https://www.facebook.com/ProjectFriendezvous?fref=ts">Facebook</a>. Remember to like our page and support Friendezvous!</p>
                        <p></p>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <img src="assets/images/github.png" class="img-circle img-responsive">
                        <h3>Find us on Github!</h3>
                        <p></p>
                        <p>Contact us via
                            <a href="https://github.com/harishv7/friendezvous">Github</a>. Friendezvous is hosted there, so feel free to take a look!</p>
                        <p></p>
                    </div>
                    <div class="col-md-6">
                        <img src="assets/images/social.png" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>


        
		<?php
			include 'includes/footer.php';
		?>
    </body>
</html>