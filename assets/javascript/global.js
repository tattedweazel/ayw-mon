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
					window.location.href="http://"+root_url+"login";
				}
			},
			"json"
		);
	});
	console.log("minification is working");

});