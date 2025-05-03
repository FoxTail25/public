<?php
$host = "MySQL-8.0";
$user = "root";
$pass = "";
$dbname = "db_pract";
$db_pract_link = mysqli_connect($host, $user, $pass, $dbname);
mysqli_query($db_pract_link, "SET NAMES 'utf8'");

if (!isset($_GET['save'])) : ?>
	<?php
	$id = $_GET['id'];
	$query = "SELECT
            name, age, salary
            FROM users
            WHERE id = $id
        ";
	$res = mysqli_query($db_pract_link, $query);
	$userData = mysqli_fetch_assoc($res);
	?>
	<form action="?save=<?= $id ?>" method="POST">
		<label>Name:<br />
			<input type="text" name="name" value="<?= $userData['name'] ?>">
		</label><br />
		<label>Age:<br />
			<input type="number" name="age" value="<?= $userData['age'] ?>">
		</label><br />
		<label>Salary:<br />
			<input type="number" name="salary" value="<?= $userData['salary'] ?>">
		</label><br />
		<input type="submit">
	</form>
<?php else : ?>
	<?php
	$id = $_GET['save'];
	$name = $_POST['name'];
	$age = $_POST['age'];
	$salary = $_POST['salary'];
	$query = "UPDATE users SET 
        name = '$name', age = '$age', salary = '$salary'
        WHERE id = $id";

	mysqli_query($db_pract_link, $query) or die(mysqli_error($link));
	?>
	<p>Данные <?= $name ?> изменены</p>
	<br />
	<a href="../index.php#editlist">вернуться</a>

<?php endif ?>