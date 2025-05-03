<?php
$host = "MySQL-8.0";
$user = "root";
$pass = "";
$dbname = "db_pract";
$db_pract_link = mysqli_connect($host, $user, $pass, $dbname);
mysqli_query($db_pract_link, "SET NAMES 'utf8'");


$id = $_GET['id'];
$query = "SELECT
            name, age, salary
            FROM users
            WHERE id = $id
        ";
$res = mysqli_query($db_pract_link, $query);
$userData = mysqli_fetch_assoc($res);
?>
<form action="save.php?id=<?= $_GET['id'] ?>" method="POST">
    <label>Name:<br/>
<input type="text" name="name" value="<?=$userData['name']?>">
    </label><br/>
    <label>Age:<br/>
<input type="number" name="age" value="<?=$userData['age']?>">
    </label><br/>
    <label>Salary:<br/>
<input type="number" name="salary" value="<?=$userData['salary']?>">
    </label><br/>
    <input type="submit" >
</form>

