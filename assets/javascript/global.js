$(document).ready(function(){

	$('#debugLabel').click(function(){
		$('#debugCode').slideToggle();
	});

	$('#logout').click(function(){
		$.post(
			'scripts/logout.script.php',
			'',
			function(data){
				if(data.success > 0){
					window.location.href="http://www.allyourweb.net/monitaur/login";
				}
			},
			"json"
		);
	});

});


/*! This is here as an example of Mapi Call via JavaScript */
function logEvent(server, type, description, details){
	var api_key = 'aI31bITjdl90x';
	$.post(
		"/app/api",
		{api_key: api_key, server: server, type: type, description: description, details: details},
		function(data){
			if (data.success == 1){
				console.log(" -- Event Logged -- ");
			}
			else {
				console.log(data.message);
			}
		},
		"json"
	).fail(function(){
		console.log("## Event Log Failure ##");
	});

}
