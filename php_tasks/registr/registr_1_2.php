<?php
session_start();
?>
<p>Регистрация нового пользователя</p>

<form method="post" style="display: grid; width:200px;">
	login:
	<input type="text" name="login">
	passqord:
	<input type="password" name="password">
    email:
	<input type="email" name="email">
    BirthDate:
	<input type="data" name="birthdate">

	<input type="submit">
</form>

<?php
if (!empty($_POST['login']) and !empty($_POST['password'])) {
	include('../db/connect.php');
	$login = $_POST['login'];
	$password = $_POST['password'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
	$query = "INSERT INTO user_auth SET login='$login', password = '$password'";
	// $query_add_email = "INSERT INTO user_email SET login='$email', user_id ='$user_id'";
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
?>
<br/>
<a href="../../index.php">На главную</a>