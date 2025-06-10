<?php
session_start();

if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['email']) and !empty($_POST['birthdate'])) {


	$login = $_POST['login'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$birthDate = $_POST['birthdate'];
	$timestamp = date('Y-m-d H:i:s');

	if ($_POST['password'] == $_POST['confirm']) {

		include('../../db/connect.php');

		$query_check_user = "SELECT * FROM user_auth WHERE login='$login'";
		$check_user = mysqli_fetch_assoc(mysqli_query($db_pract_link, $query_check_user));

		if (empty($check_user)) {


			$query = "INSERT INTO user_auth SET login='$login', password = '$password', birth_date='$birthDate', register_date='$timestamp'";
			mysqli_query($db_pract_link, $query);

			$userId = $id = mysqli_insert_id($db_pract_link); //Короткий способ!

			$query_add_email = "INSERT INTO user_email SET email='$email', user_id ='$userId'";
			mysqli_query($db_pract_link, $query_add_email);

			$_SESSION['success'] = true;
			$_SESSION['auth_2_3']['auth'] = true; // записываем данные в сессию что бы пользоатель сразу авторизовался на сайте.
			$_SESSION['auth_2_3']['name'] = $login; // записываем логин пользователя в сессию.
			$_SESSION['user_id'] = $userId;
			unset($_POST);
			header('location:#');
			die();

		} else {
			echo "Данный логин уже занят";
		}
	} else {
		echo 'введённые пароли не совпадают';
	}
}
?>

<p>Регистрация нового пользователя</p>
<form method="post" style="display: grid; width:200px;">
	login:
	<input type="text" name="login">
	password:
	<input type="password" name="password">
	confirm password:
	<input type="password" name="confirm">
	email:
	<input type="email" name="email">
	BirthDate:
	<input type="date" name="birthdate">

	<input type="submit">
</form>


<?php
if (isset($_SESSION['success'])): ?>
	<p>Пользователь успешно добавлен в базу</p>
	<a href="../../index.php#registr_3_2">вернуться на главную</a>
<?php else : ?>
	<br />
	<a href="../../index.php#registr_3_2">На главную</a>
<?php endif;

$_SESSION['success'] = null;
?>