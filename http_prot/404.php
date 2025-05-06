<?php
$arr = ['a', 'b', 'c'];
$key = $_GET['key'];

if (isset($arr[$key])) {
	echo $arr[$key];
} else {
	// отдать 404
	header('HTTP/1.1 404 Not Found');
	echo 'error нет такой страницы';
}
?>
<br />
<a href="../index.php#key">назад</a>