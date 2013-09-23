<?php
$user = $red->page->temp;
?>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 userBlock">
	<form class="updateForm" id="form_<?php echo $user->id;?>" role="form" method="post">
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $user->id;?>">
		<div class="form-group">
			<label for="display_<?php echo $user->id;?>">Display Name</label>
			<input type="text" class="form-control" name="display_<?php echo $user->id;?>" id="display_<?php echo $user->id;?>" value="<?php echo $user->display;?>">
		</div>
		<div class="form-group">
			<label for="username_<?php echo $user->id;?>">Login Name</label>
			<input type="text" class="form-control" name="username_<?php echo $user->id;?>" id="username_<?php echo $user->id;?>" value="<?php echo $user->username;?>">
		</div>
		<div class="form-group">
			<label for="access_<?php echo $user->id;?>">Access</label>
			<select class="form-control" name="access_<?php echo $user->id;?>" id="access_<?php echo $user->id;?>">
			  <option value="admin" <?php echo ($user->access == 'admin') ? 'selected="selected"': '';?>>Admin</option>
			  <option value="user" <?php echo ($user->access == 'user') ? 'selected="selected"': '';?>>User</option>
			  <option value="viewer" <?php echo ($user->access == 'viewer') ? 'selected="selected"': '';?>>Viewer</option>
			</select>
		</div>
		<div class="checkbox">
		  <label>
		    <input class="passwordCheck" name="resetPassword" type="checkbox" value="1" data-toggle="password_row_<?php echo $user->id;?>">
		    Reset <?php echo $user->display;?>'s Password?
		  </label>
		</div>
		<div id="password_row_<?php echo $user->id;?>" class="form-group password">
			<label for="password_<?php echo $user->id;?>">Password</label>
			<input type="password" class="form-control" name="password_<?php echo $user->id;?>" id="password_<?php echo $user->id;?>">
		</div>
		<button id="update_<?php echo $user->id;?>" type="submit" class="btn btn-primary" data-form="<?php echo $user->id;?>">Update <?php echo $user->display;?></button>
	</form>
</div>