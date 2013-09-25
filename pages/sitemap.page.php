<?php

class sitemap_page extends BasePage{

	public function __construct(){
		global $red;
		parent::__construct();
		$this->setTemplate("main");
		$this->addStyle('sitemap');
		$this->addContent('sitemap');
		$this->pageTitle = "Site Map";
		$bt =  debug_backtrace();
		$red->logEvent($_SERVER[SERVER_NAME], "alert", "404", array("environment" => print_r($red, true)));
	}
}

?>
