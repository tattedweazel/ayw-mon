<div class="container">
	<form id="loginForm" role="form" method="post">
		<h1> <?php echo $red->page->image('monitor.png', false, array('id' =>'logo'));?>Log In </h1>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username" id="username">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" id="password">
		</div>
		<button id="login" type="submit" class="btn btn-primary">Log In</button>
	</form>
</div>