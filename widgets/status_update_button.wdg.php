<?php
$page = $red->page;
$event = reset($page->data->events);

switch($event->status){
	case 'pending':
		if ($event->type == 'notification'){
			$next = 'resolved';
			$message = 'Acknowledge '.ucwords($event->type);
		}
		else {
			$next = 'acknowledged';
			$message = 'Acknowledge this '.ucwords($event->type);
		}
		break;
	case 'acknowledged':
		$next = 'resolved';
		$message = 'Resolve this '.ucwords($event->type);
		break;
	case 'resolved':
		$next = 'pending';
		$message = 'Re-open '.ucwords($event->type);
}
?>

<div id="update-status-button" class="status-<?php echo $event->status;?>" data-current="<?php echo ucwords($event->status);?>" data-next="<?php echo ucwords($next);?>" data-event="<?php echo $event->id;?>">
	<span id="update-event" ><?php echo $message;?></span>
</div>