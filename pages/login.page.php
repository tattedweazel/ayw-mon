<?php

class Login_page extends BasePage{

	public function __construct(){
		global $red;
		parent::__construct();
		
		if ($red->getNode(1) != 'login'){
			$red->logEvent($red->server, 'notification', 'Forced to Login Page', array("environment" => print_r($red, true)));
		}

		$this->setTemplate("main");
		$this->addScript('login');
		$this->addStyle('login');
		$this->addContent('login');
		$this->pageTitle = "Log In";

	}
}

?>