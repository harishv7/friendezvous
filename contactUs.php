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
                    <div class="col-md-12">
                        <!-- Begin MailChimp Signup Form -->
                        <link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
                        <style type="text/css">
                            #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
                            /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                               We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                        </style>
                        <div id="mc_embed_signup">
                            <form action="//herokuapp.us11.list-manage.com/subscribe/post?u=5ac2a1ef0bf760e38b4467086&amp;id=902e45a1c4" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                                    <h2>Subscribe to our mailing list</h2>
                                    <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                                    <div class="mc-field-group">
                                        <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                                        </label>
                                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                                    </div>
                                    <div class="mc-field-group">
                                        <label for="mce-FNAME">First Name </label>
                                        <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                                    </div>
                                    <div class="mc-field-group">
                                        <label for="mce-LNAME">Last Name </label>
                                        <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                                    </div>
                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_5ac2a1ef0bf760e38b4467086_902e45a1c4" tabindex="-1" value=""></div>
                                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                </div>
                            </form>
                        </div>

                        <!--End mc_embed_signup-->
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