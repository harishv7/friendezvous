<?php
	require_once 'vendor/autoload.php';
	
	$sendgrid = new SendGrid('app39633407@heroku.com', 'n4vqrqdf5321');

	$message = new SendGrid\Email();
	
	$message->addTo("$email")->
			  setFrom('noreply@friendezvous.com')->
			  setSubject('Friendezvous Signup Verification')->
			  setHtml('
			  Hi there,<br><br>
			  
			  Thank you for joining Friendezvous. Now you can easily organize any meetings with your friends whenever and wherever you want.<br><br>
			  
			  You have created an account with the following credentials: <br><br>
			  
			  -----------------------------------------------------------<br>
			  Email: '.$email.' <br>
			  Password: '.$password.' <br>
			  -----------------------------------------------------------<br><br>
			  
			  Simply click on this link to activate your account:<br>
			  http://polar-gorge-5952.herokuapp.com/verify.php?email='.$email.'&activateHash='.$activateHash.';<br><br>
			  
			  We are looking forward to organize your first meeting on Friendezvous!<br><br><br>
			  
			  
			  Sincerely,<br><br><br>
			  
			  
			  Friendezvous Team
			  ');
	$response = $sendgrid->send($message);
?>