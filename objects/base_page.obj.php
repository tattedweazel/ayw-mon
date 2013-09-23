<?php
/*
* This is the BASE Page object. Every Page object comes from its proverbial womb. This is to ensure
* that every page has the same basic properties and funcitons. Instanciated pages may have more as needed
* but they'll all have these at a minimum. Ah, sweet sweet inheritance.
*/

abstract class BasePage {
	public $functions;
	public $name;
	public $template;
	public $styles;
	public $scripts;
	public $content; 
	public $pageTitle;
	public $models;
	public $data;
	public $messages;
	public $temp;

	public function __construct(){
		global $red;
		$red->loadObject("messages");
		$this->functions = $red->showFunctions($this);
		$this->messages = new Messages();
		$this->models = new Data;
		$this->data = new Data;
	}
	
	/*
	* Give me the name of your css file and I'll make it happ'n... cap'n.
	*/
	public function addStyle($name){
		if (DEV){
			$this->styles[] = $name.'.css';
		}
		else {
			$this->styles[] = $name.'.min.css';	
		}

	}

	/*
	* Same thing, but for Yava Screeps!
	*/
	public function addScript($name){
		if (DEV){
			$this->scripts[] = $name.'.js';
		}
		else {
			$this->scripts[] = $name.'.min.js';	
		}
	}

	/*
	* Decide what template to use...
	*/
	public function setTemplate($name){
		$this->template = $name.'.template.php';
	}

	/*
	* Grabs the view and makes it so.
	*/
	public function addContent($name) {
		global $red;
		$this->content = $name.".content.php";
	}

	/**
	* Gets a requested model for use on the page - adds to $this->models array
	* @param <string> $name - Name of model to  load
	*/
	public function loadModel($name){
		global $red;
		$this->models->addProp($name, $red->fetchModel($name));
	}

	/*
	* This is basically the render function
	*/
	public function displayContent() {
		global $red;
		include($red->fileroot."content/".$this->content);
	}
	
	/*
	* This is ACTUALLY the render function...
	*/
	public function renderPage() {
		global $red;
		if (!$red->noRender){
			include($red->fileroot."/templates/".$this->template);
		}

	}

	/**
	* Takes a passed array of parameters => values and a label. Creates an anchor tag and returns it. 
	* params should be key => value pairs like "href" => "/page" and "class" => "error"
	* values passed can be arrays themselves. This is useful for classes: "class" => array("error", "crazyFont", "draggable"),
	* Also, pass a true as the third param if you're accessing an external link.
	*/
	public function linkTo($params, $label, $external = false){
		global $red;
		$linkString = '<a ';
		foreach ($params as $param => $value){
			if ($param == 'href') {
				if (!$external){
					$value = $red->rootNode.$value;
				}
			}
			if (is_array($value)){
				$value = implode(" ",$value);
			}
			$linkString .= $param.'="'.$value.'" ';
		}
		$linkString .= ">".$label."</a>";
		echo $linkString;
	}

	/*
	* Creates an image tag. Kept here so you can globally effect ALL images, should you choose (Schema, anyone?). And
	* besides, who wants to type all those <img> tags anyways?!
	*
	* If linking to externally hosted image like http://www.thatsite.com/kittens.jpg pass 'kittens.jpg' as $fileName
	* and 'http://www.thatsite.com' as $externalURL (don't put a slash at the end)
	*/
	public function image($fileName, $externalURL = false, $params = array()){
		global $red;
		if ($externalURL){
			$imgSrc = $externalURL.'/'.$fileName;
		}
		else {
			$imgSrc = ROOT.'assets/images/'.$fileName;
		}
		$imageString = '<img src="'.$imgSrc.'" ';
		foreach ($params as $param => $value){
			if (is_array($value)){
				$value = implode(" ",$value);
			}
			$imageString .= $param.'="'.$value.'" ';
		}
		$imageString .= ">";
		return $imageString;
	}
	
	/*
	* This guy just makes forms less laborious.
	*/
	public function formInput($type, $name, $value, $params = array()){
		global $red;
		$inputString = '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" ';
		foreach ($params as $param => $value){
			if ($param == 'href') {
				$value = $red->rootNode.$value;
			}
			if (is_array($value)){
				$value = implode(" ",$value);
			}
			$inputString .= $param.'="'.$value.'" ';
		}
		$inputString .= ">";
		return $inputString;
	}

	public function breadCrumbs($options){
		$activeOption = array_pop($options);
		echo '<ol class="breadcrumb">';
	  	foreach($options as $name => $link){
	  		echo '<li>';
	  		$this->linkTo(array("href" => $link), "$name");
	  		echo '</li>';
	  	}
	  	echo '<li class="active">'.$activeOption.'</li>'; 
		echo '</ol>';
	}
}

?>