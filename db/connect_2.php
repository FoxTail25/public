<?php
$host = 'MySQL-8.0'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'db_pract_2';      // имя базы данных

$db_pract_link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($db_pract_link, "SET NAMES 'utf8'");
?>