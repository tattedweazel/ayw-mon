<?php

class Home_page extends BasePage{

	public function __construct(){
		global $red;
		parent::__construct();
		
		// Basic Options
		$this->setTemplate("main");
		$this->addStyle("home");
		$this->addScript("home");
		$this->pageTitle = "Home";
		$this->name = "Home Page";

		//Data Sourcing
		$this->loadModel('event');
		$this->loadModel('action');
		$this->setErrors();
		$this->setAlerts();
		$this->setNotifications();
		// finalize and show
		$this->addContent("home");
	}

	private function setErrors(){
		$data = $this->data;
		$models = $this->models;
		$data->addProp('errorCount', $models->event->getCountType('error'));
		$data->addProp('errors', $models->event->getAllType('error', 'created DESC'));
		foreach ($data->errors as $id => $event){
			$data->errors->{$id}->addProp(
				'actions', 
				new Data(
					array(
						"count" => $models->action->getCountByEvent($id),
						"items" => $models->action->getAllByEvent($id)
					) // close Data params array
				) // close Data call
			); // close addProp call
		} //end foreach
	}

	private function setAlerts(){
		$data = $this->data;
		$models = $this->models;
		$data->addProp('alertCount', $models->event->getCountType('alert'));
		$data->addProp('alerts', $models->event->getAllType('alert', 'created DESC'));
		foreach ($data->alerts as $id => $event){
			$data->alerts->{$id}->addProp(
				'actions', 
				new Data(
					array(
						"count" => $models->action->getCountByEvent($id),
						"items" => $models->action->getAllByEvent($id)
					) // close Data params array
				) // close Data call
			); // close addProp call
		} //end foreach
	}

	private function setNotifications(){
		$data = $this->data;
		$models = $this->models;
		$data->addProp('notificationCount', $models->event->getCountType('notification'));
		$data->addProp('notifications', $models->event->getAllType('notification', 'created DESC'));
		foreach ($data->notifications as $id => $event){
			$data->notifications->{$id}->addProp(
				'actions', 
				new Data(
					array(
						"count" => $models->action->getCountByEvent($id),
						"items" => $models->action->getAllByEvent($id)
					) // close Data params array
				) // close Data call
			); // close addProp call
		} //end foreach
	}

}

?>