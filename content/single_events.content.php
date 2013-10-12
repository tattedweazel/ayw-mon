<?php 
$page = $red->page;
$event = reset($page->data->events);
$page->breadCrumbs(array("Home" => "home", $page->pageTitle => strtolower($page->pageTitle), $page->eventId));
?>

<div class="container singleEvent">
	<div class="row recentRow">
		<div class="recentLabel">
			<?php echo rtrim($page->pageTitle, 's').' - '.$event->description;?>
		</div>
		<div class="recentBlock">
			<div class="eventBlock">
				<div class="eventContent">
					<div class="eventStatus status-<?php echo $event->status;?>">
						<?php echo ucwords($event->status);?>
					</div>
					<div class="eventRow">
						<span class="label">
							Reported
						</span>
						<span class="value">
							<?php echo $event->created;?>
						</span>
					</div>
					<div class="eventRow">
						<span class="label">
							Last Updated
						</span>
						<span class="value">
							<?php echo $event->updated;?>
						</span>
					</div>
					<div class="eventRow">
						<span class="label">
							Location
						</span>
						<span class="value">
							<?php $page->linkTo(array("href" => $event->type.'s/server/'.$event->server), $event->server);?>
						</span>
					</div>
					<div class="eventRow">
						<span class="label">
							Description
						</span>
						<span class="value">
							<?php echo $event->description;?>
						</span>
					</div>
					<div class="eventRow tall">
						<textarea disabled="disabled" id="detailsText">> Supporting Details:<?php echo "\n\n";print_r($event->details);?>{{{'(~_^ )'}}} </textarea>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row recentRow">
		<div class="recentLabel">
			Status
		</div>
		<?php $red->widget('status_update_button'); ?>	
		<div id="addActionGroup">
			<span id="addAction" class="btn-primary" data-event="<?php echo $event->id;?>">
				Add<br/>
				Action
			</span>
			<textarea id="userAction"></textarea>
		</div>
	</div>
</div>

<div class="container">
	<div class="row recentRow">
		<div class="recentLabel">
			Actions
		</div>
		<div>
			<?php
			foreach($page->data->actions as $action){
				$page->temp = $action;
				$red->widget('action_line');
			}?>
		</div>
	</div>
</div>