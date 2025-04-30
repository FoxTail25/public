<?php
if (!empty($_POST)) {
	$host = "MySQL-8.0";
	$user = "root";
	$pass = "";
	$dbname = "db_pract";
	$db_pract_link = mysqli_connect($host, $user, $pass, $dbname);
	mysqli_query($db_pract_link, "SET NAMES 'utf8'");

	$name = $_POST['name'];
	$age = $_POST['age'];
	$salary = $_POST['salary'];
	$query = "INSERT INTO users SET name='$name', age='$age', 
		salary='$salary'";
	mysqli_query($db_pract_link, $query) or die(mysqli_error($db_pract_link));
}
?>

<form action="" method="POST">
	<label for="">Имя:<br />
		<input name="name" value=<?= isset($_POST['name']) ? $_POST['name'] : "" ?>>
	</label><br />
	<label for="">Возраст:<br />
		<input name="age" value=<?= isset($_POST['age']) ? $_POST['age'] : "" ?>>
	</label><br />
	<label for="">Зарплата:<br />
		<input name="salary" value=<?= isset($_POST['salary']) ? $_POST['salary'] : "" ?>>
	</label><br />
	<input type="submit">
</form>

<a href="../index.php">nazad</a>