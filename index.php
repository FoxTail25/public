<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	mb_internal_encoding('UTF-8');
	include './php/helpFunc.php';

	// include './php/code.php';

	$url = $_SERVER['REQUEST_URI'];
	$fileName = 'php'. $url .'.php';
	if($url == '/') {
		$content = 'home';
	} else {
		$content = file_get_contents($fileName);
	}
	
$layout = file_get_contents('view/template/layout.html');
$header = file_get_contents('view/template/header.html');

$layout = str_replace('{{ header in layout }}', $header, $layout);
$layout = str_replace('{{ content in layout }}', $content, $layout);


echo $layout;
?>