<?php
$page = $red->page;
$item = $page->temp;
if (!$item){
	return;
}
$serverClass = str_replace('.','_',$item->server);
?>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 eventBlock <?php echo $serverClass;?> <?php echo $item->status;?>-item">
	<div class="eventContent">
		<div class="eventStatus status-<?php echo $item->status;?>">
			<?php echo ucwords($item->status);?>
			<?php $page->linkTo(array("href" => $item->type."s/".$item->id, "class" => "view-icon"), $page->image("view-icon.png"));?>
		</div>
		<div class="eventRow">
			<span class="label">
				Time
			</span>
			<span class="value">
				<?php echo $item->created;?>
			</span>
		</div>
		<div class="eventRow">
			<span class="label">
				Location
			</span>
			<span class="value">
				<?php $page->linkTo(array("href" => $item->type.'s/server/'.$item->server), $item->server);?>
			</span>
		</div>
		<div class="eventRow">
			<span class="label">
				Description
			</span>
			<span class="value">
				<?php echo $red->toolkit->truncateString($item->description, 30);?>
			</span>
		</div>
		<div class="eventRow">
			<span class="label">
				Actions
			</span>
			<span class="value">
				<?php echo $item->actions->count;?>
			</span>

		</div>
	</div>

</div>