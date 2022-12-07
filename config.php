<?php 
	define('ROOT_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
	define('PAGES_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR);
	define('SRC_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR);

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$dbh = new PDO('mysql:host=localhost;dbname=films', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);

	session_start();
?>