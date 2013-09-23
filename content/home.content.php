<?php 
$page = $red->page; 
$page->breadCrumbs(array("Home"));
?>

<div class="container">
	<div class="row recentRow">
		<div class="recentLabel" id="errorsLabel">
			Recent Errors <b class="caret"></b>
		</div>
		<div class="recentBlock" id="errorsBlock">
			<?php
			$count = 0;
			foreach ($page->data->errors as $item){
				if ($count < 8) {
					$page->temp = $item;
					$red->widget('event_block');
					$count++;
				}
			}?>
		</div>
	</div>	
	<div class="row recentRow">
		<div class="recentLabel" id="alertsLabel">
			Recent Alerts <b class="caret"></b>
		</div>
		<div class="recentBlock" id="alertsBlock">
			<?php
			$count = 0;
			foreach ($page->data->alerts as $item){
				if ($count < 8) {
					$page->temp = $item;
					$red->widget('event_block');
					$count++;
				}
			}?>
		</div>
	</div>
	<div class="row recentRow">
		<div class="recentLabel" id="notificationsLabel">
			Recent Notifications <b class="caret"></b>
		</div>
		<div class="recentBlock" id="notificationsBlock">
			<?php
			$count = 0;
			foreach ($page->data->notifications as $item){
				if ($count < 8) {
					$page->temp = $item;
					$red->widget('event_block');
					$count++;
				}
			}?>
		</div>
	</div>		
</div>