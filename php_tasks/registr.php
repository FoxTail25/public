<?php
session_start();
?>


<form method="post" style="display: grid; width:200px;">
	login:
	<input type="text" name="login">
	passqord:
	<input type="password" name="password">
	<input type="submit">
</form>

<?php
if (!empty($_POST['login']) and !empty($_POST['password'])) {
	include('../db/connect.php');
	$login = $_POST['login'];
	$password = $_POST['password'];
	$query = "INSERT INTO user_auth SET login='$login', password = '$password'";
	mysqli_query($db_pract_link, $query);
	$_SESSION['success'] = true;
	unset($_POST);
	header('location:#');
}
?>
<?php
if (isset($_SESSION['success'])): ?>
	<p>Пользователь успешно добавлен в базу</p>
	<a href="../index.php#register">вернуться на главную</a>
<?php endif;
$_SESSION['success'] = null;
