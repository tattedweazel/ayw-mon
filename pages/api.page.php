<?php

class Api_page extends BasePage{

	private $validAPIKey;
	private $return;

	public function __construct(){
		parent::__construct();
		
		global $red;
		// turn off page rendering since we're outside the normal flow
		$red->forceNoRender();

		// data sourcing
		$this->loadModel('event');

		$this->data = $_POST;
		$this->return = new Data();
		$this->return->addProp('success', 0);
		$this->return->addProp('message', '');
		//make sure we're dealing with a valid API Key
		$this->validateAPIKey();

		//make it so
		$this->postEventToDB();
		echo json_encode($this->return);
	}

	private function validateAPIKey(){
		if ($this->data['api_key'] == 'aI31bITjdl90x'){
			$this->validAPIKey = true;
			$this->return->success = 1;
		}
		else {
			$this->validAPIKey = false;
			$this->return->message = 'Invalid API Key provided';
		}
	}

	private function postEventToDB(){
		if ($this->validAPIKey && $this->validateData()){
			$this->return->message = 'Event Successfully logged to database';
			$this->models->event->saveEvent($this->data['server'], $this->data['type'], $this->data['description'], $this->data['details']);	
		}
	}

	private function validateData(){
		if (array_key_exists('server',$this->data)
			&& array_key_exists('type',$this->data)
			&& array_key_exists('description', $this->data)
			&& array_key_exists('details', $this->data)
		){
			return true;
		}
		$this->return->message('Request Missing Required Paramter - Must have Server, Type, Description, and Details');
		return false;
	}
}

?>