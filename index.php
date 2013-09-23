<?php

include('config.php');
//figure out what my root I'm working with is
$root = str_replace('index.php','',str_replace('\\','/',__FILE__));

include($root.'/objects/red.obj.php');
$red = new Red();
if ($red->data->session->user->authenticated){
	$page = $red->router();
}
else {
	switch($red->getNode(1)){
		case 'api': 
			$page = 'api';
			break;
		default: 
			$page = 'login';
			break;
	}
}
$red->loadPage($page);

?>
