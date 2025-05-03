<?php

$host = "MySQL-8.0";
$user = "root";
$pass = "";
$dbname = "db_pract";
$db_pract_link = mysqli_connect($host, $user, $pass, $dbname);
mysqli_query($db_pract_link, "SET NAMES 'utf8'");

$id = $_GET['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$salary = $_POST['salary'];
$query = "UPDATE users SET 
        name = '$name', age = '$age', salary = '$salary'
        WHERE id = $id";

mysqli_query($db_pract_link, $query) or die(mysqli_error($link));
echo "Данные $name изменены";
?>
<br/>
<a href="../index.php">nazad</a>