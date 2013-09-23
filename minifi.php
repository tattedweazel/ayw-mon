<?php

echo "<br/><br/>";
//$target = $argv[1];
$target = '../assets/css';
minifi($target);
$target = '../assets/javascript';
minifi($target);

function minifi($target){
	if ($target == '?'){
		echo "<br/><br/>Just give me the path of the directory (relative to this file...) you want me to check<br/>and I'll skip through and minify all your css and javascript.<br/><br/>I will always minify any non .min.* files (as long as they're css or js files. I don't do that other<br/>werid stuff), but don't worry, the originals remain unscathed.<br/><br/>This means if you run me and I minify home.css, then you run me again on the same directory<br/>I will minify home.css again.<br/><br/>I will also always just save over any .min.* files that I make that may already exist.<br/>But you'd only be worried if you were editing minified files anyways.<br/>And besides... who does that?!<br/><br/>";
		exit;
	}
	echo "Looking in ".$target;


	$dir = opendir($target);

	if (!$dir) {
		echo "You have provided an invalid directory name<br/><br/>";
		exit;
	}

	$files = array();
	while (false !== ($entry = readdir($dir))) {
		$files[] = $entry;
	}
	$css = array();
	$js = array();
	foreach ($files as $file){
		$filePieceArray = explode('.', $file); 
		$ext = array_pop($filePieceArray);
		$minCheck = array_pop($filePieceArray);
		if (!$minCheck){
			echo "<br/>File: ".$file." -> Not interested. Moving on.";
		}
		elseif ($minCheck != 'min'){
			switch ($ext){
				case 'css':
					echo "<br/>File: ".$file." -> Eligible CSS file found!!! Queueing for minification";
					$css[] = $file;				
					break;
				case 'js':
					echo "<br/>File: ".$file." -> Eligible JavaScript file found!!! Queueing for minification";
					$js[] = $file;				
					break;
				default:
					echo "<br/>File: ".$file." -> Not interested. Moving on.";
					break;
			}
		}
		else {
			echo "<br/>File: ".$file." -> Already Minified...";
		}
		
	}
	if (count($css) || count($js)){
		echo "<br/><br/>I have found ";
		if (count($css)){
			echo count($css)." CSS files ";
		}
		if (count($css) && count($js)){
			echo "and ";
		}
		if (count($js)){
			echo count($js)." JavaScript files ";
		}
		echo "for minification.<br/><br/>";
		
		echo "Beginning Minification...";
		
		if (count($css)){
			echo "<br/>Minifying ".count($css)." CSS files:<br/>";
			
			foreach ($css as $file){
				$min = str_replace('css', 'min.css', $file);
				$cmd = "curl -X POST -s --data-urlencode 'input@".$target."/".$file."' http://cssminifier.com/raw > ".$target."/".$min;
				echo "<br/>Minifying ".$file."<br/>";			
				shell_exec($cmd);
				echo "File minified and saved as ".$target."/".$min."<br/>";
				
			}
		}
		if (count($js)){
			echo "<br/>Minifying ".count($js)." JavaScript files:<br/>";
			
			foreach ($js as $file){
				$min = str_replace('.js', '.min.js', $file);
				$cmd = "curl -X POST -s --data-urlencode 'input@".$target."/".$file."' http://javascript-minifier.com/raw > ".$target."/".$min;
				echo "<br/>Minifying ".$file."<br/>";			
				shell_exec($cmd);
				echo "File minified and saved as ".$target."/".$min."<br/>";
				
			}
		}

		echo "<br/>Success!";
		
		if (count($css)){
			echo "<br/>".count($css)." CSS files minified!";
		}
		if (count($js)){
			echo "<br/>".count($js)." JavaScript files minified!";
		}
	}
	else {
		echo "<br/><br/>Awww... there's nothing to minify. Why'd you bother me?";
	}
	echo "<br/><br/>";
}
?>
