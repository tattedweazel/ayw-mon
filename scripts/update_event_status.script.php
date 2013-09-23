<?php
global $red;

$current = $_POST['currentStatus'];
$next = $_POST['nextStatus'];
$eventId = $_POST['eventId'];
$user = $red->data->session->user->username;

$return = array("success" => 0);

$red->fetchModel('event');
$red->fetchModel('action');

$event = new Event();
$action = new Action();

$attempt = $event->updateEventStatus($eventId, $next);
if (!$attempt){
	$return['message'] = "Unable to update Event Status";
}
$attempt = $action->saveAction($eventId, $user, "Updated Event Status from $current to $next");
if (!$attempt){
	$return['message'] = "Unable to create Action";
}

$return['success'] = $attempt;
echo json_encode($return);
?>