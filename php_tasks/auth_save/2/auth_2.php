<?php
session_start();
if (!empty($_POST)) {
	$login = $_POST['login'];
	include('../../../db/connect_2.php');
	$query_getLog = "SELECT * FROM user WHERE name = '$login'";
	$user = mysqli_fetch_assoc(mysqli_query($db_pract_link, $query_getLog));
	if($user) {

		$password = md5($user['salt'] . $_POST['password']);
		$query_chckLogPas = "SELECT * FROM user WHERE name = '$login' AND password = '$password'";
		$user = mysqli_fetch_assoc(mysqli_query($db_pract_link, $query_chckLogPas));
		if (!empty($user['name'])) {
			$_SESSION['user_2'] = $user['name'];
			header('location:../../../index.php#save_reg_2');
			die();
		}
	} 
	
	echo '<span style="color:red">неверая пара login | password</span>';
	
	
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