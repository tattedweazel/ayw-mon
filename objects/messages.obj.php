<?php

/** I CAN HAZ MESSAGES!
* There are 2 types of Messages: Notes and Errors. I reeaaaallly don't think I need to spell out the difference, but for posterity...
*
* Notes are simple notifications and used for things like "Successfully Update!" and all that Jazz.
* Errors are.. well... errors. 
*
* Why Dave.. WHY AM I CENTRALIZING THESE!! Well, simple. I HATE TRACKING DOWN STUPID MESSAGES WHEN I NEED TO CHANGE THEM. Now, all of
* those mundane messages are in the same place! 
*
* If you want to call a message, make sure it's here first! Look below, you'll see what to do. Calling a message that doesn't exist?
* No worries... I'll give you a nasty message so you can learn the errors of your ways =)
*/

class Messages {
	public $functions;
	public $notes;
	public $errors;

	public function __construct(){
		global $red;
		$this->functions = $red->showFunctions($this);
		$this->notes = array();
		$this->errors = array();
	}

	public function addNote($name, $text){
		$this->notes[] = new MessageMask($name, $text);
	}

	public function addError($name, $text){
		$this->errors[] = new MessageMask($name, $text);
	}

	public function note($name){
		switch ($name){
			case 'sample':
				$this->addNote($name, 'This is a sample note');
			break;
			default:
				$this->error('noteNotSet');
			break;
		}
	}

	public function error($name){
		switch ($name){
			case 'errorNotSet':
				$this->addError($name, 'No Entry For Requested Error - '.$name);
			break;
			case 'noteNotSet':
				$this->addError($name, 'No Entry For Requested Note - '.$name);
			break;
			default:
				$this->error('errorNotSet');
			break;
		}
		return;
	}
}

class MessageMask {
	public $name;
	public $text;

	public function __construct($name, $text){
		$this->name = $name;
		$this->text = $text;
	}

	public function display(){
		echo $this->text;
	}
}

?>