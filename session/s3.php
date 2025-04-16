<html lang="ru">

<head>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="ps-4">
	<p class="fw-bold m-0">Решение 1:</p>
	<p>Счётчик считает все обновления страницы</p>
	<code>
		<pre>
		&lt?php
		session_start();
		if (!isset($_SESSION['counter'])) {
			$_SESSION['counter'] = 0;
			echo "Вы обновили страницу: " . $_SESSION['counter'];
		} else {
			$_SESSION['counter']++;
		}
		echo "Вы обновили страницу: " . $_SESSION['counter'];
		?>
	</pre>
	</code>

	<p class="fw-bold m-0">Результат:</p>
	<?php
	session_start();
	if (!isset($_SESSION['counter'])) {
		$_SESSION['counter'] = 0;
	} else {
		$_SESSION['counter']++;
	}
	echo "Вы обновили страницу: " . $_SESSION['counter'];
	?>


	<p class="fw-bold m-0 mt-4">Решение 2:</p>
	<p>Код счётчика модифицирован так, что бы доходя до 10 он становился равным 0</p>
	<code>
		<pre>
		&lt?php
		session_start();
		if (!isset($_SESSION['counter'])) {
			$_SESSION['counter'] = 0;
		} else {
			$_SESSION['counter']++;
		}
		echo "Вы обновили страницу: " . $_SESSION['counter'] ?? 0;
		if ($_SESSION['counter'] == 10) {
			unset($_SESSION['counter']);
		}
		?>
	</pre>
	</code>
	<p class="fw-bold">Результат:</p>
	<?php
	session_start();
	if (!isset($_SESSION['counter2'])) {
		$_SESSION['counter2'] = 0;
	} else {
		$_SESSION['counter2']++;
	}
	echo "Вы обновили страницу: " . $_SESSION['counter2'] ?? 0;
	if ($_SESSION['counter2'] == 10) {
		unset($_SESSION['counter2']);
	}
	?>
	<p>
		<a href="?sess_destr=true">Уничтожение сессси</a>
	</p>
	<p>
		<a href="../session/s3.php">Возобновление сессии</a>
	</p>
	<?php
	if (isset($_GET['sess_destr'])) {
		session_destroy();
	}
	?>


	<p>
		<a href="../index.php">Вернуться</a>
	</p>
</body>

</html>