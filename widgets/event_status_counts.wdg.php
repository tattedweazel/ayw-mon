<?php
$page = $red->page;
$status = $page->temp;
if (empty($status)){
	return;
}

$size = 6;
if (count($status)%3 == 0){
	$size = 4;
}

foreach($status as $type => $count){?>
	<div class="col-xs-12 col-sm-<?php echo $size;?> col-md-<?php echo $size;?> col-lg-<?php echo $size;?> statusBlock">
		<div class="statusCount status-<?php echo $type;?>">
			<?php $page->linkTo(array("class" => "status-".$type, "data-status" => $type, "href" => strtolower($page->pageTitle)."/".$type), '<h4 class="statusLabel">'.ucwords($type).' - '.$count.'</h4>');?>
		</div>
	</div>
<?php
}?>