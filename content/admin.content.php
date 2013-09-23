<?php
$users = $this->data->users;
?>

<div class="container">
	<div class="row allUsers">
		<span class="rowLabel">
			All Users
		</span>
		<span class="rowContainer">
			<?php
			foreach($users as $user){
				$this->temp = $user;
				$red->widget('user_block');
			}
			?>
		</span>
	</div>

	<div class="row allUsers">
		<span class="rowLabel">
			Create New User <span id="showForm">[+]</span>
		</span>
		<span id="newUserForm" class="rowContainer">
			<div class="userBlock">
				<form class="createForm" id="createForm" role="form" method="post">
					<div class="form-group">
						<label for="new_display">Display Name</label>
						<input type="text" class="form-control" name="new_display" id="new_display">
					</div>
					<div class="form-group">
						<label for="new_username">Login Name</label>
						<input type="text" class="form-control" name="new_username" id="new_username">
					</div>
					<div class="form-group">
						<label for="new_access">Access</label>
						<select class="form-control" name="new_access" id="new_access">
						  <option value="admin">Admin</option>
						  <option value="user">User</option>
						  <option value="viewer">Viewer</option>
						</select>
					</div>
					<div class="form-group">
						<label for="new_password">Password</label>
						<input type="password" class="form-control" name="new_password" id="new_password">
					</div>
					<button id="createUser" type="submit" class="btn btn-primary">Create User</button>
				</form>
			</div>
		</span>
	</div>
</div>