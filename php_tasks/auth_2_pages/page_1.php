<?php
session_start();
if (!isset($_SESSION['auth_2_1']) or $_SESSION['auth_2_1'] == false): ?>
	<p>Страница доступна только авторизированным пользователям</p>
	<a href="../auth_2_1.php">Авторизация</a>
	<a href="../../index.php#auth_2_1">Вернуться на главную</a>
<?php else : ?>
	<p>Страница 1</p>
	<a href="../../index.php#auth_2_1">Вернуться на главную</a>
<?php endif; ?>