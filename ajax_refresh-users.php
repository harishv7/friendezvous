<?php
	include 'includes/session.php';
	include 'includes/dbCredentials.php';
	
	// PDO connect *********
	function connect($db_host, $db_name, $db_user, $db_pass) {
		return new PDO("mysql:host=$db_host;dbname=$db_name", "$db_user", "$db_pass", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES latin1"));
	}

	$pdo = connect($db_host, $db_name, $db_user, $db_pass);
	$keyword = '%'.$_POST['keyword'].'%';
	$sql = "SELECT * FROM users WHERE full_name LIKE (:keyword) && user_id != $user_id ORDER BY user_id ASC LIMIT 0, 10";
	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
		// put in bold the written text
		$full_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['full_name']);
		// add new option
		echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['email']).'\'); addParticipant.submit();">'.$full_name.'<br><font color=#808080>&nbsp'.$rs['email'].'</font></li>';
	}
?>