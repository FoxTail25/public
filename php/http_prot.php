<?php
$arr = ['a', 'b', 'c'];

if (isset($_GET['key']) and in_array($_GET['key'], array_keys($arr))) {
	$key = $_GET['key'];
	echo $arr[$key];
} else {
	header('HTTP/1.1 404 Not Found');
	echo"Нет такой страницы";
}
