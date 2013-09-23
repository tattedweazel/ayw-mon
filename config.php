<?php

// Globals

// Server Specific
switch($_SERVER[SERVER_NAME]){
	
	case 'www.allyourweb.net':
		define('DEV', false);
		define('MYSQL_HOST',"ayw-web.allyourweb.net");
		define('MYSQL_USER',"monitaur_user");
		define('MYSQL_PASS', "monitaur_web");
		define('MYSQL_DB',"monitaur");

		break;

	// my dev
	case 'localhost':
		define('DEV', true);
		define('MYSQL_HOST',"ayw-web.allyourweb.net");
		define('MYSQL_USER',"monitaur_user");
		define('MYSQL_PASS', "monitaur_web");
		define('MYSQL_DB',"monitaur");

		break;



}
