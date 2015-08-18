<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
	include 'includes/library.php';
?>
<!DOCTYPE html>
<html>
	<?php
		include 'includes/header.php';
	?>
	<head>
		<link type="text/css" href="assets/css/error-page.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include 'includes/navigationBar.php';
		?>

		<?php
			if (isset($_GET['errorCode'])){
				$errorCode = mysqli_real_escape_string($connection, $_GET['errorCode']);
			}
		?>
		
		<div class="cover">
			<div class="cover-image" style="background-image : url('assets/images/errorbg.jpg')"></div>
			<div class="container error">
				<div class="col-md-12 text-center text-inverse">
					<h1>Oops...</h1>
				</div>
				<?php
					if (isset($errorCode) && $errorCode == 'authError'){
						echo '
							<div class="col-md-12 text-center text-inverse">
								<h3>Error: Access unauthorized.</h3>
								<p>If you do not understand how this error happened, please contact us through the <a href="contactUs.php">contact us form</a>.</p>
								<p>We will do our best to assist you!</p>
							</div>
						';
					}
					else if (isset($errorCode) && $errorCode == 'finalizeError'){
						echo '
							<div class="col-md-12 text-center text-inverse">
								<h3>Error: You need to select a timeslot and a location first.</h3>
								<p>If you do not understand how this error happened, please contact us through the <a href="contactUs.php">contact us form</a>.</p>
								<p>We will do our best to assist you!</p>
							</div>
						';
					}
					else {
						echo '
							<div class="col-md-12 text-center text-inverse">
								<h3>Error: That\'s an unknown error!</h3>
								<p>Please let us know when this error happened through the <a href="contactUs.php">contact us form</a>.</p>
								<p>We will do our best to fix it!</p>
							</div>
						';
					}
				?>
			</div>
		</div>
		
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>

