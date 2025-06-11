<?php
session_start();

if (!empty($_POST)) {
	if (checkLog()['test']) { //проверка логина

		if (checkPass()['test']) { //проверка пароля

			if (checkConfirm()['test']) {//проверка подтверждения пароля

				if ($_POST['password'] == $_POST['confirm'] and strlen($_POST['password']) == strlen($_POST['confirm'])) {//проверка совпадения паролей
					echo 'password и password confirm совпадают<br/>';
					echo 'Можно добалять в базу';

					if(checkEmail()['test']) {//проверка email

						//Код добавления в базу.
					}


				} else {
					echo 'password и password confirm не совпадают';
				}
			} else {
				echo 'подтверждение пароля не заполнено<br/>';
			}
		} else {
		}
	} else {
	}
}
?>


<form action="" method="post" style="display: grid; width:200px;">
	login: <?= (!empty($_POST) and !checkLog()['test']) ? checkLog()['msg'] : '' ?>
	<input type="text" name="login" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>">
	password: <?= (!empty($_POST) and !checkPass()['test']) ? checkPass()['msg'] : '' ?>
	<input type="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
	confirm password:
	<input type="password" name="confirm" value="<?= isset($_POST['confirm']) ? $_POST['confirm'] : '' ?>">
	confirm email:
	<input type="email" name="email" value="<?= isset($_POST['emai']) ? $_POST['email'] : '' ?>">
	<br />
	<input type="submit">
</form>
<br />
<a href="../../index.php#valid_reg4">вернуться на главную</a>

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

	$confirmLength = strlen($confirm);
	if ($confirmLength < 6) { // проверка что бы не был слишком короткий
		return ['test' => false, 'msg' => " слишком короткий<br/>"];
	}
	if ($confirmLength > 12) { // проверка что бы не был слишком длинный
		return ['test' => false, 'msg' => " слишком длинный<br/>"];
	}

	return ['test' => true, 'msg' => " подходит<br/>"]; // все проверки прошли успешно.
}
?>