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

		<div class="cover">
			<div class="cover-image" style="background-image : url('assets/images/errorbg.jpg')"></div>
			<div class="container error">
				<div class="col-md-12 text-center text-inverse">
					<h1>Oops...</h1>
					<h2><i>That's an error!</i></h2>
				</div>
				<div class="col-md-12 text-center text-inverse">
					<h4>We are sorry for the inconvenience.</h4>
					<h4>Please let us know when this error happened through the <a href="contactUs.php">contact us form</a>.</h4>
					<h4>We will do our best to fix it!</h4>
					<form role="form">
				</div>
			</div>
		</div>
		
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>

