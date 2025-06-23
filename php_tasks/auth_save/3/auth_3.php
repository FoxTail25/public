<?php
session_start();
if (!empty($_POST)) {
	$login = $_POST['login'];
	include('../../../db/connect_2.php');
	$query_getLog = "SELECT * FROM user WHERE name = '$login'";
	$user = mysqli_fetch_assoc(mysqli_query($db_pract_link, $query_getLog));
	if($user) {

		if(password_verify($_POST['password'], $user['password'])) {
			$_SESSION['user_3'] = $user['name'];
			header('location:../../../index.php#save_reg_3');
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
<a href="../../../index.php#save_reg_3">На главную</a>