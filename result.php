<?php
if($_GET) {
	echo 'GET: ';
	var_dump($_GET);
	echo '<br>REQUEST: ';
	var_dump($_REQUEST);
} elseif ($_POST){
	echo 'POST: <br/>';
	echo"Ваше имя $_POST[p_name]<br/>";
	echo"Ваш возраст $_POST[p_age]<br/>";
	echo '<br>REQUEST: ';
	var_dump($_REQUEST);
} else {
	echo 'no data';
}

?>
<br/>
<a href="index.php">вернуться</a>