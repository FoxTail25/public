<?php if ($_GET and $_GET['num_1'] > 0 and $_GET['num_2'] > 0 and $_GET['num_3'] > 0): ?>
	<p>Сумма чисел введённая в инпуты = <?= $_GET['num_1'] + $_GET['num_2'] + $_GET['num_3'] ?></p>
<?php endif ?>
<a href="index.php">вернуться</a>