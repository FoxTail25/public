<?php
session_start();
if (!empty($_POST)) {
	$login = $_POST['login'];
	$password = md5($_POST['password']);
	include('../../../db/connect_2.php');
	$query_chckLogPas = "SELECT * FROM user WHERE name = '$login' AND password = '$password'";
	$user = mysqli_fetch_assoc(mysqli_query($db_pract_link, $query_chckLogPas));
	if (empty($user['name'])) {
		echo '<span style="color:red">неверая пара login | password</span>';
	} else {
		$_SESSION['user'] = $user['name'];
		header('location:../../../index.php#save_reg_1');
		die();
	}
}
?>

<form method="post" style="display: grid; width:300px">
	login:
	<input type="text" name="login">
	password:
	<input type="password" name="password">
	<br />
	<input type="submit">
</form>
<br />
<a href="../../../index.php#save_reg_1">На главную</a>