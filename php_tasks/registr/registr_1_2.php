<?php
session_start();
?>
<p>Регистрация нового пользователя</p>

<form method="post" style="display: grid; width:200px;">
	login:
	<input type="text" name="login">
	password:
	<input type="password" name="password">
	email:
	<input type="email" name="email">
	BirthDate:
	<input type="date" name="birthdate">

	<input type="submit">
</form>

<?php
if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['email']) and !empty($_POST['birthdate'])) {
	include('../../db/connect.php');
	$login = $_POST['login'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$birthDate = $_POST['birthdate'];
	$query = "INSERT INTO user_auth SET login='$login', password = '$password', birth_date='$birthDate'";
	mysqli_query($db_pract_link, $query);
	
	$query_user_id = "SELECT id FROM user_auth WHERE login = '$login'";
	$res = mysqli_query($db_pract_link, $query_user_id);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	$userId = $data[0]["id"];

	$query_add_email = "INSERT INTO user_email SET email='$email', user_id ='$userId'";
	mysqli_query($db_pract_link, $query_add_email);
	// $query_add_birth_date = "INSERT INTO user_birth_date SET birth_date='$birthDate', user_id ='$userId'";
	// mysqli_query($db_pract_link, $query_add_birth_date);

	$_SESSION['success'] = true;
	unset($_POST);
	header('location:#');
}
?>
<?php
if (isset($_SESSION['success'])): ?>
	<p>Пользователь успешно добавлен в базу</p>
	<a href="../../index.php#register2">вернуться на главную</a>
<?php else : ?>
	<br />
	<a href="../../index.php#register2">На главную</a>
<?php endif;
$_SESSION['success'] = null;
?>