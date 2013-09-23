<?php

// Globals

// Server Specific
switch($_SERVER[SERVER_NAME]){
	
	case 'www.allyourweb.net':
		define('DEV', false);
		define('ROOT_NODE', "/monitaur/");
		define('MYSQL_HOST',"ayw-web.allyourweb.net");
		define('MYSQL_USER',"monitaur_user");
		define('MYSQL_PASS', "monitaur_web");
		define('MYSQL_DB',"monitaur");

		break;

	// my dev
	case 'localhost':
		define('DEV', true);
		define('ROOT_NODE', "/ayw-mon/");
		define('MYSQL_HOST',"127.0.0.1");
		define('MYSQL_USER',"root");
		define('MYSQL_PASS', "01dec2006");
		define('MYSQL_DB',"monitaur");

		break;



}
