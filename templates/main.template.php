<?php
$page = $red->page;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $red->widget("head"); ?>
	</head>
	<body>
		<div id="mainContent">
			<?php $red->widget("top_nav"); ?>
			<?php $page->displayContent(); ?>
		</div>
	</body>

</html>