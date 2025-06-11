<?php
session_start();

if (!empty($_POST)) {
	if (checkLog()['test']) { //проверка логина

		if (checkPass()['test']) { //проверка пароля

			if (checkConfirm()['test']) { //проверка совпадения паролей

				if (checkEmail()['test']) { //проверка email

					addUserRegDataInDb(); //Функция добавления данных в базу.

					$_SESSION['valid_auth_5']['auth'] = true; // записываем данные в сессию что бы пользоатель сразу авторизовался на сайте.
					$_SESSION['valid_auth_5']['name'] = $login; // записываем логин пользователя в сессию.
					unset($_POST); //на всякий случай очищаем $_POST
					header('location:../../index.php'); // перенаправляем пользователя на основную страницу
					die();
				}
			}
		}
	}
}
?>


<form action="" method="post" style="display: grid; width:200px;">
	login: <?= (!empty($_POST) and !checkLog()['test']) ? checkLog()['msg'] : '' ?>
	<input type="text" name="login" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>">
	password: <?= (!empty($_POST) and !checkPass()['test']) ? checkPass()['msg'] : '' ?>
	<input type="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
	confirm password: <?= (!empty($_POST) and !checkConfirm()['test']) ? checkConfirm()['msg'] : '' ?>
	<input type="password" name="confirm" value="<?= isset($_POST['confirm']) ? $_POST['confirm'] : '' ?>">
	email:<?= (!empty($_POST) and !checkEmail()['test']) ? checkEmail()['msg'] : '' ?>
	<input type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
	<br />
	<input type="submit">
</form>
<br />
<a href="../../index.php#valid_reg5">вернуться на главную</a>

<?php
function checkLog()
{
	$_POST['login'] = trim($_POST['login']);
	$login = $_POST['login'];

	if (empty($login)) { // проверка на заполненность поля и 0
		if (empty($login) and $login == 0) {
			return ['test' => false, 'msg' => " слишком короткий<br/>"];
		}
		return ['test' => false, 'msg' => " не заполнен<br/>"];
	}
	$loginLength = strlen($login);

	if ($loginLength < 4) { // проверка что бы не был слишком короткий
		return ['test' => false, 'msg' => " слишком короткий<br/>"];
	}
	if ($loginLength > 10) { // проверка что бы не был слишком длинный
		return ['test' => false, 'msg' => " слишком длинный<br/>"];
	}

	$ciril_sym = preg_match('#\W#', $login); // Проверка на наличие только латинских букв и цифр
	if ($ciril_sym) {
		return ['test' => false, 'msg' => "должны быть только латинские символы и цифры<br/>"];
	}
	
	include('../../db/connect.php'); //Проверна на наличие такого логина в базе данных
	$queryCheckLoginInDb = "SELECT * FROM user_auth WHERE login = '$login'";
	$userInBd = mysqli_fetch_assoc(mysqli_query($db_pract_link, $queryCheckLoginInDb));
	
	if($userInBd) {
		return ['test' => false, 'msg' => "уже есть в базе<br/>"];
	}

	return ['test' => true, 'msg' => "логин подходит<br/>"]; // все проверки прошли успешно.
}
function checkPass()
{
	$_POST['password'] = trim($_POST['password']);
	$pass = $_POST['password'];

	if (empty($pass)) { // проверка на заполненность поля и 0
		if (empty($pass) and $pass == 0) {
			return ['test' => false, 'msg' => " слишком короткий<br/>"];
		}
		return ['test' => false, 'msg' => " не заполнен<br/>"];
	}

	$passLength = strlen($pass);
	if ($passLength < 6) { // проверка что бы не был слишком короткий
		return ['test' => false, 'msg' => " слишком короткий<br/>"];
	}
	if ($passLength > 12) { // проверка что бы не был слишком длинный
		return ['test' => false, 'msg' => " слишком длинный<br/>"];
	}

	return ['test' => true, 'msg' => " подходит<br/>"]; // все проверки прошли успешно.
}
function checkConfirm()
{

	$_POST['confirm'] = trim($_POST['confirm']);
	$confirm = $_POST['confirm'];

	if (empty($confirm)) { // проверка на заполненность поля и 0
		if (empty($confirm) and $confirm == 0) {
			return ['test' => false, 'msg' => " слишком короткий<br/>"];
		}
		return ['test' => false, 'msg' => " не заполнен<br/>"];
	}

	if ($_POST['password'] == $_POST['confirm'] and strlen($_POST['password']) == strlen($_POST['confirm'])) {
		return ['test' => true, 'msg' => "пароли совпадают<br/>"];
	} else {
		return ['test' => false, 'msg' => "пароли не совпадают<br/>"];
	}
}
function checkEmail()
{
	$_POST['email'] = trim($_POST['email']);
	$email = $_POST['email'];

	if (empty($email)) { // проверка на заполненность поля и 0
		if (empty($email) and $email == 0) {
			return ['test' => false, 'msg' => " слишком короткий<br/>"];
		}
		return ['test' => false, 'msg' => " не заполнен<br/>"];	
	}

	$domen = preg_match('#(\.ru|\.com)$#', $email);
	if(!$domen) { // проверка на окончание почтового ящика доменом
		return ['test' => false, 'msg' => " укажите домен (.ru или .com) <br/>"];
	}

	return ['test' => true, 'msg' => "email подходит<br/>"]; // все проверки прошли успешно.
}
function addUserRegDataInDb(){
	include('../../db/connect.php');
	$login = $_POST['login'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$timestamp = date('Y-m-d H:i:s');
	$query = "INSERT INTO user_auth SET login='$login', password = '$password', register_date='$timestamp'";
	mysqli_query($db_pract_link, $query);

	$userId = $id = mysqli_insert_id($db_pract_link); //Короткий способ получения id последней добавленной записи.

	$query_add_email = "INSERT INTO user_email SET email='$email', user_id ='$userId'";
	mysqli_query($db_pract_link, $query_add_email);
}
?>