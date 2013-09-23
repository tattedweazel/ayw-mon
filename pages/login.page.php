<?php

class Login_page extends BasePage{

	public function __construct(){
		global $red;
		parent::__construct();
		$this->setTemplate("main");
		$this->addScript('login');
		$this->addStyle('login');
		$this->addContent('login');
		$this->pageTitle = "Log In";
	}
}

?>