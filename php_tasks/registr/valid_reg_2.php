<?php
session_start();

if (!empty($_POST)) {
	if (checkLog()['test']) {
		echo checkLog($_POST['login'])['msg'];

		if (checkPass()['test']) {
			echo checkPass()['msg'];

			if (!empty($_POST['confirm'])) {

				if ($_POST['password'] == $_POST['confirm'] and strlen($_POST['password']) == strlen($_POST['confirm'])) {
					echo 'password и password confirm совпадают<br/>';
					echo 'Можно добалять в базу';

					//Код добавления в базу.

				} else {
					echo 'password и password confirm не совпадают';
				}
			} else {
				echo 'подтверждение пароля не заполнено<br/>';
			}
		} else {
			echo checkPass()['msg'];
		}
	} else {
		echo checkLog()['msg'];
	}
}
?>


<form action="" method="post" style="display: grid; width:200px;">
	login:
	<input type="text" name="login" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>">
	password:
	<input type="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
	confirm password:
	<input type="password" name="confirm" value="<?= isset($_POST['confirm']) ? $_POST['confirm'] : '' ?>">
	<br />
	<input type="submit">
</form>
<br />
<a href="../../index.php#valid_reg2">вернуться на главную</a>

<?php
function checkLog()
{
	$_POST['login'] = trim($_POST['login']);
	$login = $_POST['login'];

	if (empty($login)) { // проверка на заполненность поля и 0
		if (empty($login) and $login == 0) {
			return ['test' => false, 'msg' => "логин слишком короткий<br/>"];
		}
		return ['test' => false, 'msg' => "логин не заполнен<br/>"];
	}
	$loginLength = strlen($login);

	if ($loginLength < 2) { // проверка на длинну
		return ['test' => false, 'msg' => "логин слишком короткий<br/>"];
	}
	
	$ciril_sym = preg_match('#\W#', $login); // Проверка на наличие только латинских букв и цифр
	if($ciril_sym) {
		return ['test' => false, 'msg' => "должны быть только латинские символы и цифры<br/>"];
	}

	return ['test' => true, 'msg' => "логин подходит<br/>"]; // все проверки прошли успешно.
}

function checkPass()
{
	$_POST['password'] = trim($_POST['password']);
	$pass = $_POST['password'];

	if (empty($pass)) { // проверка на заполненность поля и 0
		if (empty($pass) and $pass == 0) {
			return ['test' => false, 'msg' => "пароль слишком короткий<br/>"];
		}
		return ['test' => false, 'msg' => "пароль не заполнен<br/>"];
	}

	$passLength = strlen(trim($pass));
	if ($passLength < 2) { // проверка на длинну
		return ['test' => false, 'msg' => "пароль слишком короткий<br/>"];
	}

	return ['test' => true, 'msg' => "пароль подходит<br/>"]; // все проверки прошли успешно.
}
?>