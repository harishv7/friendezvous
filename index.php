<?php
	/* Done by HARISH & ALVIAN */
	include 'includes/session.php';
	include 'includes/dbConnect.php';
?>
<!DOCTYPE html>
<html>
	
    <?php
		include 'includes/header.php';
    ?>
	
	<script type="text/javascript">
		$('#container img').hide();
		
		var isFirstIteration = true;
		
		function roll() {
			$("#container img").first().appendTo('#container').fadeOut(5000);
			$("#container img").first().fadeIn(5000);
			
			if (isFirstIteration){
				isFirstIteration = false;
				setTimeout(roll, 5000);
			}
			else {
				setTimeout(roll, 10000);
			}
		}
		roll();
	</script>
    <body>
        <div class="cover">
		
            <?php
				include 'includes/navigationBar.php';
            ?>
			
			<div id="container">
				<?php
					$bgImages = array("Agreement.jpg", "38.jpg", "beach.jpeg", "76.jpg", "52.jpg");
					shuffle($bgImages);
				?>
				<img src="assets/images/bg/<?php echo $bgImages[0]; ?>" class="cover-image">
				<img src="assets/images/bg/<?php echo $bgImages[1]; ?>" class="cover-image" style="display: none;">
				<img src="assets/images/bg/<?php echo $bgImages[2]; ?>" class="cover-image" style="display: none;">
                <img src="assets/images/bg/<?php echo $bgImages[3]; ?>" class="cover-image" style="display: none;">
                <img src="assets/images/bg/<?php echo $bgImages[4]; ?>" class="cover-image" style="display: none;">
			</div>
            <div class="container color-box">
                <div class="row">
                    <div class="col-md-12 text-center">

                        <p align="center"><img src="assets/images/logo.png" class="img-responsive"></p>

                        <p class="">Organising meetings, redefined.</p>
                        <br>
                        <br>
                        
                    </div>
                    <div class="col-md-12 text-center">
						<?php
							if (!isset($_SESSION['user_id'])){
								echo '
									<a href="login.php"><p class="custom-btn3 hvr-grow-shadow">Login</p></a>
									
									<a href="signUp.php"><p class="custom-btn3 hvr-grow-shadow">Sign Up</p></a> <br>
								';
							}
						?>
                        <button type="button" class="custom-btn3 hvr-grow-shadow">Know More...</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="section main-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-right close">
                        <span class="glyphicon glyphicon-remove close-button hvr-pulse-grow" ></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="assets/images/mockup2.jpg" class="img-responsive">
                        <h4 class="text-center">Create a meeting</h4>
                        <p class="text-center">Simply create a new meeting through your dashboard and select the timeslots you are available in.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="assets/images/mockup3.jpg" class="img-responsive" style="height:px;">

                        <h4 contenteditable="true" class="text-center">Invite your friends</h4>

                        <p class="text-center">Invite your friends and colleagues you want to meet up with to let them select their favoured timeslots.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="assets/images/mockup4.jpg" class="img-responsive">

                        <h4 class="text-center">Let us do the rest!</h4>

                        <p class="text-center">Friendezvous will immediately work out the best time and place for all
                            of you to meet.<br> Yes, it's that simple!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
						<?php
							if (!isset($_SESSION['user_id'])){
								echo '
									<a href="login.php"><p class="custom-btn4 hvr-grow-shadow">Login</p></a>
									
									<a href="signUp.php"><p class="custom-btn4 hvr-grow-shadow">Sign Up</p></a>
								';
							}
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