<?php
session_start();
if(!empty($_SESSION['flash'])){
	foreach($_SESSION['flash'] as $flash) {
		echo "$flash".' ';
	}
	$_SESSION['flash'] =[];
}
?>
<br/>
<a href="../index.php#flash7">Назад</a>