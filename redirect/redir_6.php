<?php
if($_GET['num'] == "" or !isset($_GET['num'])){
	header('Location: ?num=1');
	echo "Число не пришло";
} else {
	echo "Число передано";
	var_dump($_GET['num']);
	echo $_GET['num'] == "";
}
?>
<div>Передано число<?=$_GET['num']?></div>
<a href="../index.php#redir_6">Назад</a>