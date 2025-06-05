<?php
session_start();
if (!isset($_SESSION['auth_2_3']['auth']) or $_SESSION['auth_2_3']['auth'] == false): ?>
	<p>Страница доступна только авторизированным пользователям</p>
	<a href="../auth_2_3.php">Авторизация</a>
	<br/>
	<br/>
	<a href="../../index.php#auth_2_3">Вернуться на главную</a>
<?php else : ?>
	<p>Приветствуем вас <?=$_SESSION['auth_2_3']['name']?></p>
	<p>Страница 2</p>
	<a href="../../index.php#auth_2_3">Вернуться на главную</a>
<?php endif; ?>