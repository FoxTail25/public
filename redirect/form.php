<?php

$host = "MySQL-8.0";
$user = "root";
$pass = "";
$dbname = 'db_pract';
$db_pract_link = mysqli_connect($host, $user, $pass, $dbname);

if(!empty($_POST)){
	file_put_contents('111test.txt', $_POST['test1']);
	file_put_contents('222test.txt', $_POST['test2']);
    header('location:form.php');
    // echo "da!";
}
?>
<form method="POST" style="display:grid; width:50%;">
тест1
<input name="test1">
тест2
<input name="test2">
<input type="submit">
</form>