<?php
$page = $red->page;
$action = $page->temp;
?>

<div class="action-line">
	<div class="row">
		<span class="col-xs-2 label">
			Author:
		</span>
		<span class="col-xs-8 value">
			<?php echo $action->actor;?>
		</span>
	</div>
	<div class="row">
		<span class="col-xs-2 label">
			Posted:
		</span>
		<span class="col-xs-8 value">
			<?php echo $action->created;?>
		</span>
	</div>
	<div class="row">
		<span class="col-xs-2 label">
			Description:
		</span>
		<span class="col-xs-8 value">
			<textarea disabled><?php echo $action->description;?></textarea>
		</span>
	</div>
</div>