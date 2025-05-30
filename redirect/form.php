<?php
session_start();
$host = "MySQL-8.0";
$user = "root";
$pass = "";
$dbname = 'db_pract';
$db_pract_link = mysqli_connect($host, $user, $pass, $dbname);

if(!empty($_POST)){
	$name1= $_POST['test1'];
	$name2= $_POST['test2'];
	$query = "INSERT INTO redir SET name1='$name1', name2='$name2'";
	mysqli_query($db_pract_link, $query);
    $_SESSION['flash'] = 'форма успешно сохранена';
	header('location:form.php');
	die();
}
if (isset($_SESSION['flash'])) {
	echo $_SESSION['flash'];
	unset($_SESSION['flash']);
}
?>
<form method="POST" style="display:grid; width:50%; margin: 0 auto;">
тест1
<input name="test1">
тест2
<input name="test2">
<input type="submit">
</form>
<a href="../index.php#redir_form">назад</a>