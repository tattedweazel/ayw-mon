<?php

class Admin_page extends BasePage{

	public function __construct(){
		global $red;
		parent::__construct();

		if ($red->data->session->user->access != 'admin'){
					$this->setTemplate("main");
					$this->addStyle('sitemap');
					$this->addContent('sitemap');
					$this->pageTitle = "Site Map";
		}
		else {
			// Basic Options
			$this->setTemplate("main");
			$this->addStyle("admin");
			$this->addScript("admin");
			$this->pageTitle = "Admin";
			$this->name = "Admin Section";

			//Data Sourcing
			$this->loadModel('user');
			$this->data->addProp('users', $this->models->user->getAll());
			// finalize and show
			$this->addContent("admin");
		}
	}
}