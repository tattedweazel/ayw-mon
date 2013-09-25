<?php

class Event_page extends BasePage{

	public $status;
	public $location;
	public $eventId;

	private $contentPage;
	private $type;
	private $scope;
	private $allowEmptyResults;

	public function __construct(){
		parent::__construct();
		
		// Basic Options
		$this->setTemplate("main");
		$this->addStyle("event");
		$this->addScript("event");

		// Data Sourcing
		$this->loadModel('event');
		$this->loadModel('action');

		// process request
		$this->setNameAndTitle();
		$this->setType();
		$this->setScope();
		$this->fetchData();
		$this->setContentPage();

		// finalize and show
		$this->addContent($this->contentPage);
	}

	private function setNameAndTitle(){
		global $red;
		$this->pageTitle = ucwords($red->getNode(1));
		$this->name = $this->pageTitle." Page";
	}

	private function setType(){
		$this->type = str_replace('s', '', $this->pageTitle);
	}

	private function setScope(){
		global $red;
		$node = $red->getNode(2);
		if (!$node){
			$this->scope = 'all';
		}
		else{
			switch ($node){
				case 'server':
					$this->scope = 'location';
					$this->location = $red->getNode(3);
					break;
				case 'pending':
				case 'acknowledged':
				case 'resolved':
					$this->scope = 'status';
					$this->status = $node;
					break;
				default:
					$this->scope = 'single';
					$this->eventId = $red->getNode(2);

			}
		}

	}

	private function fetchData(){
		switch($this->scope){
			case 'all':
				$this->allowEmptyResults = true;
				$events = $this->models->event->getAllType($this->type, 'updated DESC');
				$locations = array();
				$statusCounts = array('pending' => 0, 'acknowledged' => 0, 'resolved' => 0);
				if ($this->pageTitle == 'Notifications'){
					unset($statusCounts['acknowledged']);
				}
				foreach ($events as $event){
					$event->addProp('actions', new Data());
					$event->actions->addProp('count', $this->models->action->getCountByEvent($event->id));
					$statusCounts[$event->status]++;
					if (!in_array($event->server, $locations)){
						$locations[] = $event->server;	
					}
				}
				$this->data->addProp('locations', $locations);
				$this->data->addProp('counts', $statusCounts);
				break;

			case 'single':
				$events = $this->models->event->getById($this->eventId);
				$actions = $this->models->action->getAllByEvent($this->eventId);
				$this->data->addProp('actions', $actions);
				break;

			case 'status':
				$this->allowEmptyResults = true;
				$events = $this->models->event->getAllTypeByStatus($this->type, $this->status, 'updated Desc');
				$locations = array();
				foreach ($events as $event){
					$event->addProp('actions', new Data());
					$event->actions->addProp('count', $this->models->action->getCountByEvent($event->id));
					$statusCounts[$event->status]++;
					if (!in_array($event->server, $locations)){
						$locations[] = $event->server;	
					}
				}
				$this->data->addProp('locations', $locations);
				break;

			case 'location':
				$events = $this->models->event->getAllTypeByLocation($this->type, $this->location, 'updated DESC');
				$statusCounts = array('pending' => 0, 'acknowledged' => 0, 'resolved' => 0);
				if ($this->pageTitle == 'Notifications'){
					unset($statusCounts['acknowledged']);
				}
				foreach ($events as $event){
					$event->addProp('actions', new Data());
					$event->actions->addProp('count', $this->models->action->getCountByEvent($event->id));
					$statusCounts[$event->status]++;
				}
				$this->data->addProp('counts', $statusCounts);
				break;
		}
		$this->data->addProp('events', $events);
	}

	private function setContentPage(){
		if(reset($this->data->events) || $this->allowEmptyResults){	
			$this->contentPage = $this->scope.'_events';
		}
		else {
			global $red;
			$red->fourOhFour();
		}
	}
}
?>
