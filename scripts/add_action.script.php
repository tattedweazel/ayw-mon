<?php
global $red;

$eventId = $red->data->post->eventId;
$actionText = $red->data->post->actionText;
$user = $red->data->session->user->username;

$red->fetchModel('action');
$action = new Action();

$return = array("success" => 0, "message" => "");

$attempt = $action->saveAction($eventId, $user, $actionText);
if (!$attempt){
	$return['message'] = "Unable to create Action";
}
else {
	$return['success'] = 1;
}

echo json_encode($return);
?>