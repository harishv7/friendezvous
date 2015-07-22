<?php
	session_start() ;
	require_once __DIR__ . '/src/Facebook/autoload.php';
	include 'includes/dbConnect.php';

	# login-callback.php
	$fb = new Facebook\Facebook([
	  'app_id' => '702074069897274',
	  'app_secret' => '7ea5f72a8ff92561c439d0c9a1676858',
	  'default_graph_version' => 'v2.2',
	]);

	$helper = $fb->getRedirectLoginHelper();
	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	if (isset($accessToken)) {
		// Logged in!
		$_SESSION['facebook_access_token'] = (string) $accessToken;

		// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

		// Sets the default fallback access token so we don't have to pass it to each request
		$fb->setDefaultAccessToken($longLivedAccessToken);

		try {
		  $response = $fb->get('/me?fields=id,name,email');
		  $userNode = $response->getGraphUser();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		$graphObject = $response->getGraphObject();
		$fb_id = $graphObject ->getProperty('id');
		$full_name = $graphObject ->getProperty('name');
		$email = $graphObject->getProperty('email');  // This is not getting any thing
		
		$query = "SELECT * FROM users WHERE fb_id='$fb_id'";
		$result = mysqli_query($connection, $query);
		$numResult = mysqli_num_rows($result);
		if (!$numResult){
			$query = "SELECT * FROM users WHERE email='$email'";
			$result = mysqli_query($connection, $query);
			$numResult = mysqli_num_rows($result);
			if ($numResult){
				$query = "UPDATE users SET fb_id='$fb_id', activated='1' WHERE email='$email'";
				$result = mysqli_query($connection, $query);
			}
			else {
				$query = "INSERT INTO users (fb_id, email, full_name, activated) VALUES ('$fb_id', '$email', '$full_name', '1')";
				$result = mysqli_query($connection, $query);
			}
		}
		$query = "SELECT * FROM users WHERE fb_id='$fb_id'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['fb_id'] = $row['fb_id'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['name'] = $row['full_name'];
		
		header("Location: dashboard.php");
	}
?>