<?php
/**
* Data Objects are used as handy vessels for various information. Get Post and Session are good examples. I guess I coooould just
* give an array, but I like objects much mo betta.
*/

class Data {

	public function __construct($dataArray = array()){
		global $red;
		//$this->functions = $red->showFunctions($this);
		foreach($dataArray as $index => $value){
			$this->{$index} = $value;
		}
	}

	/**
	* Get the value of a requested property in a DataObject. Grabbing something that isn't there results in punishment.
	*/
	public function getProp($prop){
		if (isset($this->{$prop})){
			return $this->{$prop};
		}
		$bt =  debug_backtrace();
		$ret = "Unable to get '$prop' - not set in ".$bt[0]['class']." object<br/>";
		$ret .=  "<strong>From File:</strong> ". $bt[0]['file'] . '<br/>';
   		$ret .= '<strong>On Line:</strong> '. $bt[0]['line'];
		return $ret;
	}

	/**
	* Stack up them props like Voltron!
	*/
	public function addProp($prop, $value){
		$this->{$prop} = $value;
	}
	
	/**
	* Think before using this one... it works... and I'm putting it here because it "should" be avaiable... but if
	* you're using it... maybe you should rethink something.
	*/
	public function removeProp($prop){
		unset($this->{$prop});
	}

	/**
	* I can haz prop?
	*/
	public function hasProp($prop){
		if (isset($this->{$prop})){
			return true;
		}
		return false;
	}
}

?>