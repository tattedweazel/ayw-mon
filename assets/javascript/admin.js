$(document).ready(function(){
	$(".updateForm button").each(function(){
		$(this).click(function(e){
			e.preventDefault();
			var target = $(this).attr('data-form');
			$.post("scripts/update_user.script.php", $("#form_"+target).serialize(),
			function(data){
				if (data.success == 1){
					alert("User successfully updated");
					location.reload();
				}
				else {
					alert(data.message);
				}
			}, "json");
		});
	});

	$("#createUser").click(function(e){
		e.preventDefault();
		$.post("scripts/create_user.script.php", $("#createForm").serialize(),
		function(data){
			if (data.success == 1){
				location.reload();
			}
			else {
				alert(data.message);
			}
			}, "json");
	});

	$(".updateForm .checkbox input[type=checkbox]").each(function(){
		$(this).click(function(){
			var target = $(this).attr('data-toggle');
			$("#"+target).toggle();
		});
	});

	$("#showForm").click(function(){
		$("#newUserForm").slideToggle();
	});
});