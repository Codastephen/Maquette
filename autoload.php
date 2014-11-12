<?php

function __autoload($class_name) {
	$filename = $class_name . '.php';
	if (file_exists($filename)) { //Dossier principal
		include $filename;
	}else if (file_exists("php/".$filename)){
		include "php/".$filename;
	}
}
?>