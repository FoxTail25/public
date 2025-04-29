
<?php
if (isset($_GET['show'])): ?>
	<?php
	$host = "MySQL-8.0";
	$user = "root";
	$pass = "";
	$dbname = 'db_pract';
	$db_pract_link = mysqli_connect($host, $user, $pass, $dbname);
	mysqli_query($db_pract_link, "SET NAMES 'utf8'");

	$id = $_GET['show'];
	$queryUserData = "SELECT * FROM users WHERE id = $id";
	$res = mysqli_query($db_pract_link, $queryUserData);
	$data = mysqli_fetch_assoc($res);
	for ($dat = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	?>

	<div>
		<p>
			имя: <span class="name"><?= $data['name'] ?></span>
		</p>
		<p>
			возраст: <span class="age"><?= $data['age'] ?></span>,
			зарплата: <span class="salary"><?= $data['salary'] ?></span>,
		</p>
	</div>
<?php endif ?>

<a href="../index.php">nazad</a>