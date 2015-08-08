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
		
        <div class="section" style="background-image: url(https://unsplash.it/1920/1080?image=131);">
            <div class="container overlay-general">
                <div class="row">
                    <div class="col-md-6">
                        <img src="https://unsplash.it/800/500?image=0" class="img-responsive">
					</div>
                    <div class="col-md-6">
                        <h1>Friendezvous</h1>
                        <h3>Organising meetings, redefined.</h3>
                        <p>Friendezvous was created with the sole aim to simplify the organisation
                            of meetings in a busy world. We experienced the difficulty of organising
                            meetings where we have to accomodate to everyone's schedule. To solve that,
                            we developed Friendezvous.
                            <br>
                            <br>Friendezvous was developed particularly for the <a href="http://orbital.comp.nus.edu.sg/">Orbital</a> 2015 project,
                            under Project Gemini Level. Orbital is a independent work module undertaken
						at the National University of Singapore (NUS).</p>
					</div>
				</div>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">The Team</h1>
                        <p class="text-center">We are a team of two students from the National University of Singapore (NUS).</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/images/harish.png" class="center-block img-circle img-responsive">
                        <h3 class="text-center">Harish Venkatesan</h3>
                        <p class="text-center">Computer Engineering Student</p>
                    </div>
                    <div class="col-md-6">
                        <img src="assets/images/alvian.png" class="center-block img-circle img-responsive">
                        <h3 class="text-center">Alvian Prasetya</h3>
                        <p class="text-center">Computer Engineering Student</p>
                    </div>
			</div>
		</div>
        
        
		<?php
			include 'includes/footer.php';
		?>
	</body>
	
</html>