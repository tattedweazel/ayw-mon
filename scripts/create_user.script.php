<?php
global $red;

$display = $_POST['new_display'];
$username = $_POST['new_username'];
$access = strtolower($_POST['new_access']);
$password = md5($_POST['new_password']);

$red->fetchModel('user');
$user = new User();

try {	
	$update = $user->createUser($display, $username, $access, $password);
	$return['success'] = 1;
}
catch (Exception $e) {
	$return['success'] = 0;
	$return['message'] = 'Error creating user';
	$return['error'] = $e->getMessage();
}

echo json_encode($return);
?>