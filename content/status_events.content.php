<?php 
$page = $red->page;
$page->breadCrumbs(array("Home" => "home", $page->pageTitle => strtolower($page->pageTitle), ucwords($page->status)));
?>

<div class="container">
	<div class="row recentRow">
		<div class="recentLabel">
			<?php echo $page->pageTitle.' - '.ucwords($page->status);?>
		</div>
		<div class="recentBlock">
			<div class="locationLinks">
				<div class="btn-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php
					foreach ($page->data->locations as $location){?>
						<button class="btn server col-xs-12 col-sm-3 col-md-2 col-lg-2" data-server="<?php echo str_replace('.','_',$location);;?>"><?php echo $location;?></button>
					<?php
					} ?>
				</div>
			</div>
			<?php
			$count = 0;
			foreach($page->data->events as $item){
				$page->temp = $item;
				$red->widget('event_block');
				$count++;
			}?>

			<?php
			if (!$count){ ?>
				<span id="noEvents"> There are no <?php echo ucwords($page->status).' '.$page->pageTitle;?> to view</span>
			<?php
			}?>
		</div>
	</div>
</div>