<?php
if($_GET['num'] == "" or !isset($_GET['num'])){
	header('Location: ?num=1&def=true');
	die();
}
?>
<?php
if(isset($_GET['def'])):?>
<p>Число не было передано, по этому по умолчанию установленно число 1</p>
<?php endif?>
<div>Передано число: <?=$_GET['num']?></div>
<a href="../index.php#redir_6">Назад</a>