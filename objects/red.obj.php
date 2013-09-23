<?php
/*
* This is the primary mastermind object behind it all. Actually, there are some things behind it
* but that's not important. I named it after an Operating System I had a dream about. It was North
* Korean. It was a very weird dream. I was probably baked before I fell asleep that night. I don't like
* North Korea at all, mostly because they're fucking crazy. Just to be clear.
*
*/

class Red {
	public $functions;
	public $nodes;
	public $request;
	public $page;
	public $fileroot;
	public $rootNode;
	public $data;
	public $noRedner = false;
	private $listFunctions = true; // Should I list out each available function in each object?
	
	public function __construct(){
		$this->rootNode = ROOT_NODE; // Change this to the top-most folder. For root, just make it '/'
		$this->nodes = $this->getNodes();
		$this->functions = $this->showFunctions($this);
		$this->fileroot = str_replace('objects/red.obj.php','',str_replace('\\','/',__FILE__));
		require_once($this->fileroot."/objects/data.obj.php");
		$this->data = new Data();
		$this->data->addProp('get', new Data($_GET));
		$this->data->addProp('post', new Data($_POST));

		$this->startSession();

		$this->data->addProp('session', new Data($_SESSION));

		$this->loadObject('toolkit');
		define('ROOT', $this->rootNode);
	}

	/**
	* used to fill the Nodes property. Self explanitory...
	*/
	public function getNodes(){
		$nodes = $_SERVER["REQUEST_URI"];
		$nodes = explode('/', $nodes); // break into array
		$piece = array_shift($nodes); //whack that first empty array
		foreach($nodes as $index => $node){ // get rid of those query strings (they'll be availalbe in data['get'])
			$nodes[$index] = array_shift(explode('?', $node));
		}
		return $nodes;
	}

	/**
	* Gets the node at requested index. If index not set, returns false
	*/
	public function getNode($node){
		if (array_key_exists($node, $this->nodes)){
			return $this->nodes[$node];
		}
		return false;
	}

	/**
	* Allows one to specify values at nodes. Use with caution.
	*/
	public function setNode($node, $value){
		if (array_key_exists($node, $this->nodes)){
			$this->nodes[$node] = $value;
		}
	}

	/**
	* Takes a passed string, loads the object, adds it to the Red object for use
	* First checks if that object exists. If the file doesn't exist, nothing happens
	*
	* Make sure the file name is lowercase and the Class name it loads is Title cased. If it's not,
	* you're doing it wrong and you will be punished.
	*
	* @param $name <string> Name of object you are trying to load
	*/
	public function loadObject($name){
		if (file_exists($this->fileroot."/objects/".$name.".obj.php")) {
			$className = ucwords($name);
			require_once($this->fileroot."/objects/".$name.".obj.php");
			$this->$name = new $className;
		}	
		
	}

	/**
	* Loads a script - used for AJAX calls
	*/
	public function loadScript($name){
		if (file_exists($this->fileroot."/scripts/".$name)) {
			include($this->fileroot."/scripts/".$name);
		}	
	}

	/** 
	* Works like loadObject, except instead of setting anything, it returns the model 
	* If you pass it a name that isn't a model, it doesn't do anything and you should
	* be ashamed of yourself.
	*/
	public function fetchModel($name){
		if (file_exists($this->fileroot."/models/".$name.".model.php")) {
			require_once($this->fileroot."/objects/database.obj.php");
			$className = ucwords($name);
			require_once($this->fileroot."/models/".$name.".model.php");
			return new $className;
		}	
	}

	public function router(){
		require_once($this->fileroot."/objects/route.obj.php");
		$route = new Route();
		return $route->tadaima;
	}

	public function logEvent($server, $type, $description, $details){
		require_once($this->fileroot."objects/mapi.obj.php");
		$mapi = new Mapi($server, $type, $description, $details);
	}

	/**
	* Takes a passed string and loads a page object for it. If the page doesn't exist, nothing
	* happens. Don't do that. It's stupid. Seriously. Besides, the page name passed to this
	* function is programatically decided prior to this set, so you shouldn't be calling this
	* unless you're trying to do something weird. And if that's the case... stop it.
	*
	* @param $name <string> name of page you want to load
	*/
	public function loadPage($name){
		if ($this->getNode(1) == 'scripts'){
			$this->loadScript($this->getNode(2));
		}
		else{
			$this->request = $name;
			if (file_exists($this->fileroot."/pages/".$name.".page.php")) {
				require_once($this->fileroot."/objects/"."base_page.obj.php");
				$className = ucwords($name).'_page';
				require_once($this->fileroot."/pages/".$name.".page.php");
				$this->page = new $className;
				$this->page->renderPage();
			}
			else {
				$this->fourOhFour();
			}
		}
		
	}

	/**
	* Takes a passed name and loads the requested widget, displaying it immediately where called.
	* No file, nothing happens. Don't do that. Think about what you're calling BEFORE you call it.
	*
	* @param $name <string> Name of the widget you're calling
	*/
	public function widget($name) {
		global $red;
		if (file_exists($this->fileroot."/widgets/".$name.".wdg.php")) {
			include($this->fileroot."/widgets/".$name.".wdg.php");
		}
	}

	/**
	* Handy thing used to print out something all pretty like.
	*/
	public function show($item = "Nothing passed to show"){
		if (!DEV){
			return;
		}
		$bt =  debug_backtrace();
		echo "<span id='debugLabel' class='btn btn-warning'>Debug! [+]</span>";
		echo "<pre id=\"debugCode\" class=\"pre-scrollable\">";
		print_r($item);
   		echo "<strong>".__METHOD__."</strong><br/>";
   		echo "<strong>From File:</strong> ". $bt[0]['file'] . '<br/>';
   		echo '<strong>On Line:</strong> '. $bt[0]['line'];
   		echo "</pre>";

	}

	/**
	* Used to display the functions available to an object. Don't try to call it on an object that
	* doesn't exist. If you do, you deserve what happens. Most objects have this baked in. Just do
	* a $red->show() on the object you're interested in. Chances are, I put it in there already.
	*/
	public function showFunctions($obj){
		if ($this->listFunctions){
			$functions = get_class_methods($obj);
			return $functions;	
		}
		return array();
	}

	/**
	* When all else fails, roll her in a carpet and bur... I mean... Take'm to the site map
	*/
	public function fourOhFour(){
		$req = 'sitemap';
		require_once($this->fileroot."/objects/"."base_page.obj.php");
		$className = ucwords($req).'_page';
		include($this->fileroot."/pages/".$req.".page.php");
		$this->page = new $className;
		$this->page->name = $req;
		$this->page->renderPage();
		$this->forceNoRender();
	}

	/** 
	* Checks to see if a given index is in GET data
	*/
	public function inGet($index){
		echo $index;
		if (isset($this->data->get->{$index})){
			return true;
		}
		return false;
	}

	/**
	* Just like inGet... 'cept for POST data
	*/
	public function inPost($index){
		if (isset($this->data->post->{$index})){
			return true;
		}
		return false;
	}

	/**
	* Check to see if a something is already in Session
	*/
	public function inSession($prop){
		if (isset($this->data->session->{$index})){
			return true;
		}
		return false;
	}

	/**
	* Add something to Session
	*/
	public function setSessionProp($prop, $value){
		$this->data->session->addProp($prop, $value);
		$_SESSION[$prop] = $value;
	}

	/** 
	* Same as fetchGetDataByIndex() equivalent
	*/
	public function fetchSessionDataByIndex($index){
		include_once($this->fileroot."/objects/"."data.obj.php");
		$row = array();
		if (isset($_SESSION)){
			if (array_key_exists($index, $this->data['session'])){
				$row = array($index => $this->data['session'][$index]);
			}
		}
		$ret = new Data($row);
		return $ret;
	}

	public function startSession(){
		session_start();
		session_regenerate_id(true);
		date_default_timezone_set("America/Phoenix");
	} 

	public function forceNoRender(){
		$this->noRender = true;
	}
}

/*
* Some of my comments seem mean. Let me just say that first, they're usually true, and Second, I love you.
*/
?>
