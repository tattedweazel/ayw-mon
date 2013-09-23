<?php
global $red;
$username = $_POST['username'];
$password = $_POST['password'];
$authenticated = 0;

$red->fetchModel('user');
$user = new User();
$attempt = reset($user->getUser($username, $password));

if (isset($attempt->username)){
	$attempt->addProp('authenticated', 1);
	$red->setSessionProp('user', $attempt);
	$return['success'] = 1;	
	$red->logEvent(
		'www.allyourweb.net', 
		'notification', 
		'User has logged in', 
		array(
			"user" => $attempt->username,
			"time" => time()
		)
	);
}
else {
	$return['success'] = 0;
	$return['message'] = 'Invalid User Credentials';
}


echo json_encode($return);
?>
