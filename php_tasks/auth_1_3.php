<?php
if (!empty($_POST['login']) and !empty($_POST['password'])) {
	require '../db/connect.php'; // импортируем $db_pract_link
	$login = $_POST['login'];
	$password = $_POST['password'];
	$query = "SELECT * FROM user_auth WHERE login='$login' AND password='$password'";
	$res = mysqli_query($db_pract_link, $query);

	$user = mysqli_fetch_assoc($res);
}
?>

<?php
if (empty($_POST)) : ?>

	<p>Введите логин и пароль</p>

	<form style="display: grid; width:200px;" method="POST">
		login
		<input type="text" name="login">
		password
		<input type="password" name="password">
		<input type="submit">
	</form>

<?php else : ?>
	<?php if (!empty($user)): header('location:../index.php'); die();?>
		
	<?php else: ?>
		<p>Логин или пароль введены не правильно</p>
		<a href="javascript:history.back()">попробовать заново</a>
	<?php endif; ?>

<?php endif; ?>
<br/>
<br/>
<a href="../index.php#auth_1_3">назад</a>