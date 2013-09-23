$(document).ready(function(){
	$('#login').click(function(e){
		e.preventDefault();
		$.post("scripts/login.script.php", $("#loginForm").serialize(),
			function(data){
				if (data.success == 1){
					window.location.href = "http://"+root_url+"home";
				}
				else {
					alert(data.message);
				}
			}, "json");
	});
});
