<?php 
$page = $red->page;

$page->breadCrumbs(array("Home" => "home", $page->pageTitle => strtolower($page->pageTitle), $page->location));
?>

<div class="container">
	<div class="row recentRow">
		<div class="recentLabel">
			<?php echo $page->pageTitle;?> - <?php echo $page->location;?>
		</div>
		<div class="recentBlock">
			<div class="statusCountsBlock locationStatus">
				<?php
					$page->temp = $page->data->counts;
					$red->widget('event_status_counts');
				?>
			</div>
			<?php
			
			foreach($page->data->events as $item){
				$page->temp = $item;
				$red->widget('event_block');
			}?>
		</div>
	</div>
</div>