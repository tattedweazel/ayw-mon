$(document).ready(function(){
	$('#errorsLabel').click(function(){
		$('#errorsBlock').slideToggle();
	});

	$('#alertsLabel').click(function(){
		$('#alertsBlock').slideToggle();
	});

	$('#notificationsLabel').click(function(){
		$('#notificationsBlock').slideToggle();
	});
});