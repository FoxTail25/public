<?php
session_start();
if (!empty($_POST)) {
	if (checkLogin()['test']) {
		if (checkPassword()['test']) {
			if (checkConfirmPass()['test']) {
				addNewUserRegDataInBase();
			}
		}
	}
}
?>

<form method="post" style="display: grid; width:300px;">
	login: <?= (!empty($_POST) and !checkLogin()['test']) ? checkLogin()['msg'] : '' ?>
	<input type="text" name="login">
	password: <?= (!empty($_POST) and !checkPassword()['test']) ? checkPassword()['msg'] : '' ?>
	<input type="password" name="password">
	confirm password: <?= (!empty($_POST) and !checkConfirmPass()['test']) ? checkConfirmPass()['msg'] : '' ?>
	<input type="password" name="confirm">
	<br />
	<input type="submit">
</form>
<a href="../../../index.php#save_reg_1">на главную</a>

<?php
function checkLogin()
{
	$login = trim($_POST['login']);
	if (empty($login)) {
		if (empty($login) and strlen($login) == 1) {
			return ['test' => false, 'msg' => 'Логин слишком короткий'];
		}
		return ['test' => false, 'msg' => 'Логин не заполнен'];
	}
	return ['test' => true];
};

function checkPassword()
{
	$password = trim($_POST['password']);
	if (empty($password)) {
		if (empty($password) and strlen($password) == 1) {
			return ['test' => false, 'msg' => 'Пароль слишком короткий'];
		}
		return ['test' => false, 'msg' => 'Пароль не заполнен'];
	}
	return ['test' => true];
}

function checkConfirmPass()
{
	$confirm = trim($_POST['confirm']);
	if ($confirm !== $_POST['password']) {
		return ['test' => false, 'msg' => 'Пароли не совпадают'];
	}
	return ['test' => true];
}

function addNewUserRegDataInBase() {

	include ('../../../db/connect_2.php');
	$login = $_POST['login'];
	$salt = getSalt();
	$password = md5($salt . $_POST['password']);
	$queryAddUser = "INSERT INTO user SET name = '$login', password = '$password', salt = '$salt'";
	mysqli_query($db_pract_link, $queryAddUser);
	unset($_POST);
	$_SESSION['user_2'] = $login;
	header('location:../../../index.php#save_reg_2');
}

function getSalt(){
	$salt = '';
	$saltLength = 8; // длина соли
	
	for($i = 0; $i < $saltLength; $i++) {
		$salt .= chr(mt_rand(33, 126)); // символ из ASCII-table
	}
	return $salt;
}
?>