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
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/images/contact-us.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <form role="form" class="text-left">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Enter name:</label>
                                <input class="form-control" id="exampleInputEmail1" placeholder="Your name" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputPassword1">Enter email:</label>
                                <input class="form-control" id="exampleInputPassword1" placeholder="Your email" type="email">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Enter Comments:
                                    <br>
                                </label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
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
                            <a href="https://github.com/harishv7/friendezvous">Github</a>. Our project is hosted there, so feel free to take a look!</p>
                        <p></p>
                    </div>
                    <div class="col-md-6">
                        <img src="assets/images/social.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>


        
		<?php
			include 'includes/footer.php';
		?>
    </body>
</html>