<?php
global $red;

$id = $_POST['user_id'];
$display = $_POST['display_'.$id];
$username = $_POST['username_'.$id];
$access = strtolower($_POST['access_'.$id]);
$password = md5($_POST['password_'.$id]);
$reset = $_POST['resetPassword'];

$red->fetchModel('user');
$user = new User();

try {
	if ($reset){
		$update = $user->updateUserWithPassword($id, $display, $username, $access, $password);
	}
	else{
		$update = $user->updateUser($id, $display, $username, $access);
	}
	$return['success'] = 1;

}
catch (Exception $e) {
	$return['success'] = 0;
	$return['message'] = 'Error updating user';
	$return['error'] = $e->getMessage();
}

echo json_encode($return);
?>