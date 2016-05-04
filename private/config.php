<?php
	error_reporting(0);
	
	/** Starting enviroment */
	
	$base_path = str_replace("www", "", $_SERVER["DOCUMENT_ROOT"]);

	define('PATH_CORE',			$base_path.'core/');
	define('PATH_PUBLIC',		$base_path.'www/');

?>