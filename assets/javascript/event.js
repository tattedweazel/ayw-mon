$(document).ready(function(){
	$('.server').each(function(){
		$(this).click(function(){
			if ($(this).hasClass('active')){
				$(this).removeClass('active');
				$('.eventBlock').each(function(){
					$(this).fadeIn();
					$('.statusBlock').fadeIn();
				});
			}
			else {
				$('.statusBlock').hide();
				$('.server.active').removeClass('active');
				$(this).addClass('active');
				var targetServer = $(this).attr('data-server');
				filterEventsByServer(targetServer);
			}
		});
	});

	$('.locationStatus a').each(function(){
		$(this).click(function(e){
			e.preventDefault();
			if ($(this).parent().hasClass('status-active')){
				$(this).parent().removeClass('status-active');
				$('.eventBlock').each(function(){
					$(this).fadeIn();
				});
			}
			else {
				$('.status-active').removeClass('status-active');
				$(this).parent().addClass('status-active');
				var targetStatus = $(this).attr('data-status');
				filterEventsByStatus(targetStatus);
			}
			
		});
	});

	$('#update-status-button').click(function(){
		var current = $(this).attr('data-current');
		var next = $(this).attr('data-next');
		var eventId = $(this).attr('data-event');
		updateEventStatus(current, next, eventId);
	});

	$("#addAction").click(function(){
		var actionText = $("#userAction").val();
		var eventId = $(this).attr('data-event');
		addAction(eventId, actionText);
	});
});

function filterEventsByServer(server){
	$('.eventBlock').each(function(){
		$(this).hide();
	});
	$('.eventBlock.'+server).each(function(){
		$(this).fadeIn();
	});
}

function filterEventsByStatus(status){
	var items = $('.eventBlock.'+status+'-item');
	if (items.length > 0){
			$('.eventBlock').each(function(){
		$(this).fadeOut();
		});
		items.each(function(){
			$(this).fadeIn();
		});
	}
}

function updateEventStatus(currentStatus, nextStatus, eventId){
	var sendData = {currentStatus: currentStatus, nextStatus: nextStatus, eventId: eventId};
	$.post(
		"../scripts/update_event_status.script.php",
		sendData,
		function(data){
			if (data.success > 0){
				location.reload();
			}
		},
		"json"
	);
}

function addAction(eventId, actionText){
	$.post(
		"../scripts/add_action.script.php",
		{eventId: eventId, actionText: actionText},
		function(data){
			if (data.success > 0){
				location.reload();
			}
			else {
				alert(data.message);
			}
		},
		"json"
	);
}