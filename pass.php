<html lang="ru">

<head>
	<title>check_pass</title>
	<style>
		.ms-2 {
			margin-left: 4rem;
		}

		.mt-2 {
			margin-top: 4rem;
		}
		.red {
			color: red;
		}
		.green {
			color:green;
		}
	</style>
</head>

<body>

	<?php $password = 12345; ?>
	<?php if ($_POST):
		$res = $_POST['pass'] == $password;
	?>

		<?php if ($res): ?>
			<p class="green">Пароль верный</p>
		<?php else: ?>
			<p class="red">Неправильный пароль</p>

			<?php endif ?>
		<?php endif ?>

		<br />
		<br />
		<a href="index.php" class="ms-2 mt-2">Вернуться</a>
</body>

</html>