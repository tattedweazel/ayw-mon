<?php

class Route {

	public $tadaima;

	public function __construct(){
 		$this->tadaima = $this->ultraMegaSuperAmazingJusticeGauntletOfOver9kPowerAndSpledorousAwesomenessActionTeamGo1();
	}

	/**
	* Red is designed to be self-loading: ie, you pass doman.com/foo and it loads the foo page controller. However, this
	* isn't optimal in some cases, so let's clean that up a touch. Introduce to you, Cave Man Routing!
	*
	* This allows you to be lazy if the controller is named the same as node(1) while providing you the option to 
	* customize new routes and still fourOhFour() if they put in garbage. Unless you have a page controller for garbage. Or
	* you specify a case for 'garbage' below. You get the ideer.
	*/
	public function ultraMegaSuperAmazingJusticeGauntletOfOver9kPowerAndSpledorousAwesomenessActionTeamGo1(){
		global $red;
		$node = $red->getNode(1);
		if (!$node){
			$node = 'home';
		}
		switch($node){
			case 'errors':
			case 'alerts':
			case 'notifications':
				$ret = 'event';
				break;
			default:
				$ret = $node;
				break;
		}
		return $ret;
	}
}

?>