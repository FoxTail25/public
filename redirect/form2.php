<?php
session_start();
$host = "MySQL-8.0";
$user = "root";
$pass = "";
$dbname = 'db_pract';
$db_pract_link = mysqli_connect($host, $user, $pass, $dbname);

if (!empty($_POST)) {
	$name1 = $_POST['test1'];
	$name2 = $_POST['test2'];
	$test1 = mb_strlen($name1);
	$test2 = mb_strlen($name2);
	if($test1 > 2 and $test2 >2) {
		$query = "INSERT INTO redir SET name1='$name1', name2='$name2'";
		mysqli_query($db_pract_link, $query);
		$_SESSION['flash'] = "форма успешно сохранена";
		header('location:form2.php');
		die();
	} else {
		$_SESSION['flash'] = 'Условие не выполнено, данные не сохранены!';
		header('location:form2.php');
		die();
	}
} else {
echo '<p style="width:50%; margin: 0 auto;"><i><b>Условие:</b></i><i> Длинна имён должна быть больше 2 символов</i></p><br/>';
}
if (isset($_SESSION['flash'])) {
	echo $_SESSION['flash'];
	unset($_SESSION['flash']);
}
?>
<form method="POST" style="display:grid; width:50%; margin: 0 auto;">
	Имя1
	<input name="test1">
	Имя2
	<input name="test2">
	<input type="submit">
	<br />
	<a href="../index.php#redir_valid_form">назад</a>
</form>