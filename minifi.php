<?php

echo "\n\n";
//$target = $argv[1];
$target = 'assets/css';
minifi($target);
$target = 'assets/javascript';
minifi($target);

function minifi($target){
	if ($target == '?'){
		echo "\n\nJust give me the path of the directory (relative to this file...) you want me to check\nand I'll skip through and minify all your css and javascript.\n\nI will always minify any non .min.* files (as long as they're css or js files. I don't do that other\nwerid stuff), but don't worry, the originals remain unscathed.\n\nThis means if you run me and I minify home.css, then you run me again on the same directory\nI will minify home.css again.\n\nI will also always just save over any .min.* files that I make that may already exist.\nBut you'd only be worried if you were editing minified files anyways.\nAnd besides... who does that?!\n\n";
		exit;
	}
	echo "Looking in ".$target;


	$dir = opendir($target);

	if (!$dir) {
		echo "You have provided an invalid directory name\n\n";
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
			echo "\nFile: ".$file." -> Not interested. Moving on.";
		}
		elseif ($minCheck != 'min'){
			switch ($ext){
				case 'css':
					echo "\nFile: ".$file." -> Eligible CSS file found!!! Queueing for minification";
					$css[] = $file;				
					break;
				case 'js':
					echo "\nFile: ".$file." -> Eligible JavaScript file found!!! Queueing for minification";
					$js[] = $file;				
					break;
				default:
					echo "\nFile: ".$file." -> Not interested. Moving on.";
					break;
			}
		}
		else {
			echo "\nFile: ".$file." -> Already Minified...";
		}
		
	}
	if (count($css) || count($js)){
		echo "\n\nI have found ";
		if (count($css)){
			echo count($css)." CSS files ";
		}
		if (count($css) && count($js)){
			echo "and ";
		}
		if (count($js)){
			echo count($js)." JavaScript files ";
		}
		echo "for minification.\n\n";
		
		echo "Beginning Minification...";
		
		if (count($css)){
			echo "\nMinifying ".count($css)." CSS files:\n";
			
			foreach ($css as $file){
				$min = str_replace('css', 'min.css', $file);
				$cmd = "curl -X POST -s --data-urlencode 'input@".$target."/".$file."' http://cssminifier.com/raw > ".$target."/".$min;
				echo "\nMinifying ".$file."\n";			
				shell_exec($cmd);
				echo "File minified and saved as ".$target."/".$min."\n";
				
			}
		}
		if (count($js)){
			echo "\nMinifying ".count($js)." JavaScript files:\n";
			
			foreach ($js as $file){
				$min = str_replace('.js', '.min.js', $file);
				$cmd = "curl -X POST -s --data-urlencode 'input@".$target."/".$file."' http://javascript-minifier.com/raw > ".$target."/".$min;
				echo "\nMinifying ".$file."\n";			
				shell_exec($cmd);
				echo "File minified and saved as ".$target."/".$min."\n";
				
			}
		}

		echo "\nSuccess!";
		
		if (count($css)){
			echo "\n".count($css)." CSS files minified!";
		}
		if (count($js)){
			echo "\n".count($js)." JavaScript files minified!";
		}
	}
	else {
		echo "\n\nAwww... there's nothing to minify. Why'd you bother me?";
	}
	echo "\n\n";
}
?>
