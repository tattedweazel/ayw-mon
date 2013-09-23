<?php
$page = $red->page;

$ext = '';
if (!DEV){
	$ext = 'min.';
}

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $page->pageTitle; ?> | All Your Web LLC.</title>
<link rel="shortcut icon" href="<?php echo ROOT; ?>assets/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>assets/css/global.<?php echo $ext;?>css">
<?php
foreach ($page->styles as $style) { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>assets/css/<?php echo $style; ?>">
<?php
} ?>

<script type="text/javascript" src="<?php echo ROOT;?>assets/javascript/jquery-10.2.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT;?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT;?>assets/javascript/global.<?php echo $ext;?>js"></script>
<?php
if ($page->scripts){
	foreach ($page->scripts as $script) { ?>
		<script type="text/javascript" src="<?php echo ROOT;?>assets/javascript/<?php echo $script; ?>"></script>
	<?php
	}
} ?>