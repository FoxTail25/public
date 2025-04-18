<?php
if (!isset($_COOKIE['timeCount'])) {
	setcookie('timeCount', date('G:i:s'));
	$_COOKIE['timeCount'] = date('G:i:s');
	$timeStart = date('G:i');
} else {
	$unixTimeNow = mktime(date('G'), date('i'), date('s'), 0, 0, 0);
	$hourStart = substr($_COOKIE['timeCount'], 0, 2);
	$minutesStart = substr($_COOKIE['timeCount'], 3, 2);
	$secundesStart = substr($_COOKIE['timeCount'], -2);
	$unixTimeStart = mktime($hourStart, $minutesStart, $secundesStart, 0, 0, 0);
	$unixTimeDiff = $unixTimeNow - $unixTimeStart;
	$timeDiffHour = floor(($unixTimeDiff / 60 / 60));
	$timeDiffMinutes = floor(($unixTimeDiff / 60));
	$timeDiffSeconds = ($unixTimeDiff % 60);
} ?>
<html lang="ru">

<head>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="ps-4">

	<p class="fw-bold">Решение:</p>

	<code>
		<pre>
	&lt?php
	if (!isset($_COOKIE['timeCount'])) {
		setcookie('timeCount', date('G:i:s'));
		$_COOKIE['timeCount'] = date('G:i:s');
		$timeStart = date('G:i');
	} else {
		$unixTimeNow = mktime(date('G'), date('i'), date('s'), 0, 0, 0);
		$hourStart = substr($_COOKIE['timeCount'], 0, 2);
		$minutesStart = substr($_COOKIE['timeCount'], 3, 2);
		$secundesStart = substr($_COOKIE['timeCount'], -2);
		$unixTimeStart = mktime($hourStart, $minutesStart, $secundesStart, 0, 0, 0);
		$unixTimeDiff = $unixTimeNow - $unixTimeStart;
		$timeDiffHour = floor(($unixTimeDiff / 60 / 60));
		$timeDiffMinutes = floor(($unixTimeDiff / 60));
		$timeDiffSeconds = ($unixTimeDiff % 60);
	} 
	?></pre>
	</code>
	<p class="fw-bold">Результат:</p>


	<?php if (isset($unixTimeDiff)): ?>
		<p>С момента захода на страницу, до обновления страницы прошло:</p>
		<p>Часов: <?= $timeDiffHour ?></p>
		<p>Минут: <?= $timeDiffMinutes ?></p>
		<p>Секунд: <?= $timeDiffSeconds ?></p>
	<?php endif ?>

	<a class="mt-5" href="../index.php">Вернуться к учёбе</a>
</body>

</html>