<p>Мы можем получать данные от пользователя сайта с помощью форм. Формы создаются с помощью тега form, тегов input и кнопок submit:</p>
<code>
	<pre>
&ltform>
	&ltinput>
	&ltinput>
	&ltinput type="submit">
&lt/form>
	</pre>
</code>
<p>Каждому элементу формы, данные которого мы хотим получить в PHP скрипте, мы должны дать имя с помощью атрибута name:</p>
<code>
	<pre>
&ltform>
	&ltinput name="test1">
	&ltinput name="test2">
	&ltinput type="submit">
&lt/form>
	</pre>
</code>
<p>С помощью атрибута action мы указываем файл, на который будет отправлена форма:</p>
<code>
	<pre>
&ltform action="/result.php">
	&ltinput name="test1">
	&ltinput name="test2">
	&ltinput type="submit">
&lt/form>
	</pre>
</code>
<p class="fw-bold">Задача:</p>
<p>Сделайте форму с тремя инпутами, в которые можно ввести имя, возраст и зарплату пользователя.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
&ltform action="/result.php">
	&ltlabel>Имя: &ltbr/>&ltinput name="name" type="text">&lt/label>
	&ltlabel>Возраст: &ltbr/>&ltinput name="age" type="text">&lt/label>
	&ltlabel>Зарплата: &ltbr/>&ltinput name="salary" type="text">&lt/label>
&lt/form></pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="/result.php">
	<label>Имя: <br /><input name="name" type="text"></label>
	<label>Возраст: <br /><input name="age" type="text"></label>
	<label>Зарплата: <br /><input name="salary" type="text"></label>
</form>

<h3 class="fw-bold mt-5">Метод отправки формы в PHP</h3>
<p>С помощью атрибута method мы указываем метод отправки формы. Он может быть GET или POST. Пусть наша форма отправляется методом GET на страницу result.php:</p>
<code>
	<pre>
&ltform action="/result.php" method="GET">
	&ltinput name="test1">
	&ltinput name="test2">
	&ltinput type="submit">
&lt/form></pre>
</code>
<p>В этом случае на этой странице в адресной строке появятся данные формы в следующем формате: после адреса страницы будет стоять знак <b>?</b>, а после него имена инпутов и введенные пользователем значения: <b>result.php?test1=value1&test2=value2.</b><br />
	Пусть наша форма отправляется методом POST на страницу result.php. В этом случае данные также будут отправлены, но в адресной строке отражены не будут:</p>
<code>
	<pre>
&ltform action="/result.php" method="POST">
	&ltinput name="test1">
	&ltinput name="test2">
	&ltinput type="submit">
&lt/form></pre>
</code>
<p class="fw-bold">Задача:</p>
<p>На странице index.php сделайте форму. Отправьте ее на страницу result.php. Проверьте оба метода отправки формы.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltp>form метод GET&lt/p>
	&ltform action="/result.php" method="GET">
		&ltinput name="test1g">
		&ltinput name="test2g">
		&ltinput type="submit">
	&lt/form>
	&ltp>form метод POST&lt/p>
	&ltform action="/result.php" method="POST">
		&ltinput name="test1p">
		&ltinput name="test2p">
		&ltinput type="submit">
	&lt/form>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<p>form метод GET</p>
<form action="/result.php" method="GET">
	<input name="test1g">
	<input name="test2g">
	<input type="submit">
</form>
<p>form метод POST</p>
<form action="/result.php" method="POST">
	<input name="test1p">
	<input name="test2p">
	<input type="submit">
</form>

<h3 class="fw-bold mt-5">Получение данных форм в PHP</h3>
<p>Пусть у нас есть файл form.php, а в нем HTML форма, отправляющаяся на страницу result.php. На этой странице мы можем получить данные формы с помощью специальных переменных $_GET, $_POST и $_REQUEST.<br />
	Эти переменные содержат в себе массив данных отправленной формы. При этом ключами этого массива будут имена инпутов, а значениями - те данные, которые были введены в эти инпуты.<br />
	При этом, если форма была отправлена методом GET, то данные будут в массиве $_GET, а если методом POST, то данные будут соответственно в массиве $_POST. А в переменной $_REQUEST будут лежать данные формы, отправленные любым из методов.</p>
<h3 class="fw-bold mt-5">Получение данных форм в PHP</h3>
<p>Давайте посмотрим на примере. Пусть файл form.php содержит форму, отправляющуюся методом GET на страницу result.php:</p>
<code>
	<pre>
	file index.php
	&ltform action="/result.php" method="GET">
	&ltinput name="test1">
	&ltinput name="test2">
	&ltinput type="submit">
	&lt/form></pre>
</code>
<p>Если в нашу форму в браузере вбить какие-то данные и нажать на кнопку, то форма отправится на страницу result.php:</p>
<code>
	<pre>
	file result.php
	var_dump($_GET);     // массив с ключами test1 и test2
	var_dump($_POST);    // пустой массив
	var_dump($_REQUEST); // массив с ключами test1 и test2</pre>
</code>
<p>А можно вывести на экран содержимое определенного инпута:</p>
<code>
	<pre>
	file result.php
	echo $_GET['test1'];</pre>
</code>
<p>А можно взять содержимое и первого, и второго инпутов, слить их в строку и вывести на экран:</p>
<code>
	<pre>
	file result.php
	echo $_GET['test1'] . $_GET['test2'];</pre>
</code>
<p class="fw-bold">Задача:</p>
<p>Сделайте форму с тремя инпутами. Пусть в эти инпуты вводятся числа. После отправки формы выведите на экран сумму этих чисел.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltform action="res2.php" method="get">
		&ltlabel>Число1 &ltbr />&ltinput type="number" name="num_1" min="1" value="1" />&lt/label>
		&ltlabel>Число1 &ltbr />&ltinput type="number" name="num_2" min="1" value="1" />&lt/label>
		&ltlabel>Число1 &ltbr />&ltinput type="number" name="num_3" min="1" value="1" />&lt/label>
		&ltinput type="submit">
	&lt/form>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="res2.php" method="get">
	<label>Число1 <br /><input type="number" name="num_1" min="1" value="1" /></label>
	<label>Число1 <br /><input type="number" name="num_2" min="1" value="1" /></label>
	<label>Число1 <br /><input type="number" name="num_3" min="1" value="1" /></label>
	<input type="submit">
</form>
<h3 class="fw-bold mt-5">Получение данных форм методом POST в PHP</h3>
<p>Пусть теперь наша форма отправляется методом POST:</p>
<code>
	<pre>
		&ltform action="/result.php" method="POST">
		&ltinput name="test1">
		&ltinput name="test2">
		&ltinput type="submit">
		&lt/form>
	</pre>
</code>
<p>В этом случае на странице результата данные формы будут лежать в переменной $_POST:</p>
<code>
	<pre>
		file result.php
		var_dump($_GET);     // пустой массив
		var_dump($_POST);    // массив с ключами test1 и test2
		var_dump($_REQUEST); // массив с ключами test1 и test2
	</pre>
</code>
<p class="fw-bold">Задача:</p>
<p>С помощью формы спросите у пользователя его имя и возраст. После отправки формы выведите эти данные на экран.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&ltform action="result.php" method="post">
			&ltp>Укажите данные&lt/p>
			&ltlabel>Имя:&ltbr/>&ltinput name="p_name" type="text"/>&lt/label>
			&ltlabel>Возраст:&ltbr/>&ltinput name="p_age" type="text"/>&lt/label>
			&ltinput type="submit">
		&lt/form>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="result.php" method="post">
	<p>Укажите данные</p>
	<label>Имя:<br /><input name="p_name" type="text" /></label>
	<label>Возраст:<br /><input name="p_age" type="text" /></label>
	<input type="submit">
</form>

<p class="fw-bold">Задача:</p>
<code>
	<pre>
		Пусть с помощью формы у пользователя спрашивается пароль:
		
		&ltform action="/result.php" method="POST">
		&ltinput type="password" name="pass">
		&ltinput type="submit">
		&lt/form>
		Пусть на странице с результатом в переменной хранится правильный пароль:
		
		&lt?php	$pass = '12345';?>
		Сделайте так, чтобы после отправки формы на странице результата сравнивался пароль из переменной и пароль из формы.
		После сравнения сообщите пользователю, правильный он ввел пароль или нет.
	</pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		\\file: index.php
	&ltform action="/pass.php" method="POST">
	&ltlabel>введите пароль&ltbr/>&ltinput type="password" name="pass">&lt/label>
		&ltinput type="submit">
	&lt/form>
		
		\\file: pass.php
	&lt?php $password = 12345; ?>
	&lt?php if ($_POST):
		$res = $_POST['pass'] == $password;
	?>
	&lt?php if ($res): ?>
		&ltp class="green">Пароль верный&lt/p>
	&lt?php else: ?>
		&ltp class="red">Неправильный пароль&lt/p>

		&lt?php endif ?>
	&lt?php endif ?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="/pass.php" method="POST">
	<label>введите пароль<br /><input type="password" name="pass"></label>
	<input type="submit">
</form>

<p class="fw-bold">Задача:</p>
<code>
	<pre>
		С помощью трех инпутов спросите у пользователя год, месяц и день рождения пользователя. 
		После отправки формы определите день недели, в который родился пользователь.
	</pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	\\file: index.php
	&ltform action="birth_date.php" method="post">
		&ltp>Введите дату рождения &lt/p>
		&ltlabel>Год:&ltbr />&ltinput type="number" min="1900" max="2025" name="year" />&lt/label>
		&ltlabel>Месяц:&ltbr />&ltinput type="number" min="1" max="12" name="month" />&lt/label>
		&ltlabel>День:&ltbr />&ltinput type="number" min="1" max="31" name="day" />&lt/label>
		&ltinput type="submit">
	&lt/form>

	\\file: birth_date.php
	&lt?php if ($_POST) {
		$year = $_POST['year'];
		$month = $_POST['month'];
		$day = $_POST['day'];
		$weekDayN = date('w', mktime(0, 0, 0, $month, $day, $year));
		$weekDayW = date('l', mktime(0, 0, 0, $month, $day, $year));
		$weekDayNameRu = ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"];
		$weekDayWRu = $weekDayNameRu[$weekDayN];

		echo 'День недели: ' .$_POST['day'] . '-' . $_POST['month'] . '-' . $_POST['year'] . " был".'&ltbr/>';
		echo 'Номер дня: '. $weekDayN . '&ltbr/>';
		echo 'Английское название: ' . $weekDayW . '&ltbr/>';
		echo 'Русское название: ' . $weekDayWRu . '&ltbr/>';
	}

	</pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="birth_date.php" method="post">
	<p>Введите дату рождения </p>
	<label>Год:<br /><input type="number" min="1900" max="2025" name="year" /></label>
	<label>Месяц:<br /><input type="number" min="1" max="12" name="month" /></label>
	<label>День:<br /><input type="number" min="1" max="31" name="day" /></label>
	<input type="submit">
</form>

<h3 class="fw-bold mt-5">Обработка формы в одном файле PHP</h3>
<p>В предыдущем уроке наша форма была размещена на одной странице, а отправлялась на другую. На самом деле это не обязательно. Если оставить атрибут action пустым или убрать его совсем, то форма будет отправляться на эту же страницу.<br />
	Как это будет работать: при первом заходе на страницу мы заполним форму данными и нажмем на кнопку. После этого страница обновится и ее код выполнится снова, но уже с данными формы.<br />
	Давайте посмотрим на примере. Пусть у нас в одном файле есть форма и ее обработка:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput name="test1">
		&ltinput name="test2">
		&ltinput type="submit">
	&lt/form>

	&lt?php
	var_dump($_GET);
	?></pre>
</code>
<p>При первом заходе на страницу функция var_dump выведет пустой массив. А после отправки формы он выведет уже данные формы. То есть первый раз $_GET будет пуст, а второй раз - будет содержать данные формы.<br />Это может привести к проблемам. Пусть, к примеру, мы в форму будем вводить числа и хотим вывести сумму этих чисел на экран:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput name="test1">
		&ltinput name="test2">
		&ltinput type="submit">
	&lt/form>

	&lt?php
	echo $_GET['test1'] + $_GET['test2'];
	?></pre>
</code>
<p>В этом случае при первом заходе на страницу мы увидим ошибки PHP, связанные с тем, что массив $_GET пуст, а мы обращаемся к его элементам.<br />Здесь следует сказать, что у вас ошибки могут и не появится в браузере. В этом случае проверьте, что у вас включен вывод ошибок PHP, а также убедитесь, что у вас первый заход на страницу и в адресной строке нет данных формы.<br />Давайте исправим проблему. Для этого добавим условие, в котором будем проверять то, что форма была отправлена.<br />Например, можно проверять $_GET на не пустоту. Если $_GET не пустой - то форма была отправлена и можно выполнять суммирование. В противном случае у нас еще первый заход на страницу и суммирование выполнено не будет. Итак, вот исправленный код:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput name="test1">
		&ltinput name="test2">
		&ltinput type="submit">
	&lt/form>

	&lt?php
	if (!empty($_GET)) {
		echo $_GET['test1'] + $_GET['test2'];
	}
	?></pre>
</code>
<p class="fw-bold">Задача:</p>
<p>Спросите у пользователя фамилию, имя и отчество. После отправки формы выведите на экран введенные данные.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltform action="">
		&ltp>Заполните форму&lt/p>
		&ltlabel>Имя:&ltbr/>&ltinput name="name" type="text">&lt/label>
		&ltlabel>Фамилия:&ltbr/>&ltinput name="surname" type="text">&lt/label>
		&ltlabel>Отчество:&ltbr/>&ltinput name="lastname" type="text">&lt/label>
		&ltinput type="submit">
	&lt/form>
	&lt?php if (!empty($_GET)): ?>
		&ltp>Полное имя: &lt?= "$_GET[surname] $_GET[name] $_GET[lastname]" ?>&lt/p>
		&lt?php endif ?>
		</pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
	<p>Заполните форму</p>
	<label>Имя:<br /><input name="name" type="text"></label>
	<label>Фамилия:<br /><input name="surname" type="text"></label>
	<label>Отчество:<br /><input name="lastname" type="text"></label>
	<input type="submit">
</form>
<?php if (!empty($_GET)): ?>
	<p>Полное имя: <?= "$_GET[surname] $_GET[name] $_GET[lastname]" ?></p>
<?php endif ?>

<h3 class="fw-bold mt-5">Скрытие формы после отправки в PHP</h3>
<p>Пусть у нас есть форма, в которую вводятся два числа. Пусть также после отправки формы мы выводим на экран сумму этих чисел:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput name="test1">
		&ltinput name="test2">
		&ltinput type="submit">
	&lt/form>

	&lt?php
		if (!empty($_GET)) {
			echo $_GET['test1'] + $_GET['test2'];
		}
	?></pre>
</code>
<p>Давайте сделаем так, чтобы форма пряталась после отправки. Для этого код формы нужно разместить внутри условия:</p>
<code>
	<pre>
		&lt?php
		if (empty($_GET)) {
		?>
	&ltform action="" method="GET">
		&ltinput name="test1">
		&ltinput name="test2">
		&ltinput type="submit">
	&lt/form>
&lt?php
		} else {
			echo $_GET['test1'] + $_GET['test2'];
		}
?></pre>
</code>
<p class="fw-bold">Задача:</p>
<p>С помощью формы спросите имя пользователя. После отправки формы поприветствуйте пользователя по имени, а форму уберите.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php if (empty($_GET['userName'])): ?>
	&ltform action="">
		&ltlabel>Как к Вам обращаться?&ltbr/>&ltinput type="text" name="userName"/>&lt/label>
		&ltinput type="submit">
	&lt/form>
	&lt?php else: ?>
	&ltp>Здравствуйте &lt?= $_GET['userName'] ?>&lt/p>
	&lt?php endif ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php if (empty($_GET['userName'])): ?>
	<form action="">
		<label>Как к Вам обращаться?<br /><input type="text" name="userName" /></label>
		<input type="submit">
	</form>
<?php else: ?>
	<p>Здравствуйте <?= $_GET['userName'] ?></p>
<?php endif ?>
<h3 class="fw-bold mt-5">Сохранение значений формы после отправки в PHP</h3>
<p>Пусть у нас есть некоторая форма, отправляющаяся на текущую страницу:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput name="test">
		&ltinput type="submit">
	&lt/form></pre>
</code>
<p>Давайте сделаем так, чтобы после отправки введенные данные не пропадали из нашего инпута:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput name="test" value="&lt?php echo $_GET['test'] ?>">
		&ltinput type="submit">
	&lt/form></pre>
</code>
<p>Такой подход, однако, не совершенен - при первом заходе на страницу PHP выдаст ошибку из-за того, что $_GET['test'] не существует.<br />Для решения проблемы добавим условие:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput
			name="test"
			value="&lt?php if (isset($_GET['test'])) echo $_GET['test'] ?>"
		>
		&ltinput type="submit">
	&lt/form></pre>
</code>

<p class="fw-bold">Задача:</p>
<p>С помощью формы спросите город и страну пользователя. После отправки формы выведите введенные данные на экран. Сделайте так, чтобы введенные данные не пропадали из инпутов после отправки формы.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltform action="">
		&ltp>Укажите свой город и страну&lt/p>
		&ltlabel>Город: &ltinput
					name = "city"
					value="&lt?php if (isset($_GET['city'])) echo $_GET['city'] ?>"
				>
		&lt/label>
		&ltlabel>Страна: &ltinput
					name = "country"
					value="&lt?php if (isset($_GET['country'])) echo $_GET['country'] ?>"
				>
		&lt/label>
		&ltinput type="submit">
	&lt/form>
	&lt?php if (isset($_GET['city']) and isset($_GET['city'])): ?>
		&ltp>Ваша страна: &lt?= $_GET['country'] ?>&lt/p>
		&ltp>Ваша город: &lt?= $_GET['city'] ?>&lt/p>
	&lt?php endif ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
	<p>Укажите свой город и страну</p>
	<label>Город: <input
			name="city"
			value="<?php if (isset($_GET['city'])) echo $_GET['city'] ?>">
	</label>
	<label>Страна: <input
			name="country"
			value="<?php if (isset($_GET['country'])) echo $_GET['country'] ?>">
	</label>
	<input type="submit">
</form>
<?php if (isset($_GET['city']) and isset($_GET['city'])): ?>
	<p>Ваша страна: <?= $_GET['country'] ?></p>
	<p>Ваша город: <?= $_GET['city'] ?></p>
<?php endif ?>

<h3 class="fw-bold mt-5">Сохранение значения по умолчанию формы в PHP</h3>
<p>Пусть мы хотим сделать так, чтобы по при заходе на страницу в инпуте уже был какой-то текст. Пользователь может поредактировать этот текст, а может оставить его без изменения. А после отправки формы в инпуте должен остаться тот текст, который был на момент отправки.<br />Для решения этой задачи нам необходимо добавить блок else в наше условие и в этом блоке вывести значение по умолчанию:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput
			name="test"
			value="&lt?php
					if (isset($_GET['test']))
						echo $_GET['test'];
					else echo 'default'
					?>"
		>
		&ltinput type="submit">
	&lt/form>
	</pre>
</code>
<p class="fw-bold">Задача:</p>
<p>С помощью формы спросите у пользователя год. После отправки определите, этот год високосный или нет. Сделайте так, чтобы при первом заходе на страницу в инпуте уже стоял текущий год.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltform action="">
		&ltlabel>Укажите год: &ltbr />
			&ltinput
				name="f5_year"
				value="&lt?php
						if (isset($_GET['f5_year'])) {
							echo $_GET['f5_year'];
						} else {
							echo date('Y');
						} ?>">
		&lt/label>
		&ltinput type="submit">
	&lt/form>
&lt?php
	if (isset($_GET['f5_year'])) {

		$visYear = date('L', mktime(0, 0, 0, 1, 1, $_GET['f5_year']));

		if ($visYear == 1) {
			echo "&ltp>Год $_GET[f5_year] Был весокосным&lt/p>";
		} else {
			echo "&ltp>Год $_GET[f5_year] Был обычным годом (не високосным)&lt/p>";
		}
	}
?></pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
	<label>Укажите год: <br />
		<input
			name="f5_year"
			value="<?php
					if (isset($_GET['f5_year'])) {
						echo $_GET['f5_year'];
					} else {
						echo date('Y');
					} ?>">
	</label>
	<input type="submit">
</form>
<?php
if (isset($_GET['f5_year'])) {

	$visYear = date('L', mktime(0, 0, 0, 1, 1, $_GET['f5_year']));

	if ($visYear == 1) {
		echo "<p>Год $_GET[f5_year] Был весокосным</p>";
	} else {
		echo "<p>Год $_GET[f5_year] Был обычным годом (не високосным)</p>";
	}
}
?>

<h3 class="fw-bold mt-5">Сокращенный код для сохранения значений по умолчанию в PHP</h3>
<p>Полученный нами код очень уж длинный. Давайте его сократим. Для начала вместо if используем тернарный оператор:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput
			name="test"
			value="&lt?php
					echo isset($_GET['test']) ? $_GET['test'] : 'default'
					?>"
		>
		&ltinput type="submit">
	&lt/form></pre>
</code>
<p>А теперь используем сокращенный вариант PHP скобки:</p>
<code>
	<pre>
	&ltform action="" method="GET">
	&ltinput
		name="test"
		value="&lt?= isset($_GET['test']) ? $_GET['test'] : 'default' ?>"
	>
	&ltinput type="submit">
&lt/form></pre>
</code>
<p>А теперь используем оператор ??, который сократит код еще больше:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput name="test" value="&lt?= $_GET['test'] ?? 'default' ?>">
		&ltinput type="submit">
	&lt/form></pre>
</code>

<p class="fw-bold">Задача:</p>
<p>С помощью трех инпутов спросите у пользователя год, месяц и день. После отправки формы выведите на экран, сколько дней осталось от введенной даты до Нового Года. По заходу на страницу сделайте так, чтобы в инпутах стояла текущая дата.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&ltform action="">
	&ltp>Ведите дату&lt/p>
	&ltlabel>День:
		&ltbr />
		&ltinput
			name="f6_day"
			value="&lt?= $_GET['f6_day'] ?? date('d') ?>"
			type="number">
	&lt/label>
	&ltlabel>Месяц:
		&ltbr />
		&ltinput
			name="f6_month"
			value="&lt?= $_GET['f6_month'] ?? date('n') ?>"
			type="number">
	&lt/label>
	&ltlabel>Год:
		&ltbr />
		&ltinput
			name="f6_year"
			value="&lt?= $_GET['f6_year'] ?? date('Y') ?>"
			type="number">
	&lt/label>
	&ltinput type="submit">
&lt/form>
&lt?php
if (isset($_GET['f6_year'])) {
	$nowDate = mktime(0, 0, 0, $_GET['f6_month'], $_GET['f6_day'], $_GET['f6_year']);
	$nextYear = $_GET['f6_year'] + 1;
	$newYearDate = mktime(0, 0, 1, 1, 0, $nextYear);
	$diffTime = $newYearDate - $nowDate;
	echo "Количество дней до нового года: " . round($diffTime / (60 * 60 * 24));
}
?></pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
	<p>Ведите дату</p>
	<label>День:
		<br />
		<input
			name="f6_day"
			value="<?= $_GET['f6_day'] ?? date('d') ?>"
			type="number">
	</label>
	<label>Месяц:
		<br />
		<input
			name="f6_month"
			value="<?= $_GET['f6_month'] ?? date('n') ?>"
			type="number">
	</label>
	<label>Год:
		<br />
		<input
			name="f6_year"
			value="<?= $_GET['f6_year'] ?? date('Y') ?>"
			type="number">
	</label>
	<input type="submit">
</form>
<?php
if (isset($_GET['f6_year'])) {
	$nowDate = mktime(0, 0, 0, $_GET['f6_month'], $_GET['f6_day'], $_GET['f6_year']);
	$nextYear = $_GET['f6_year'] + 1;
	$newYearDate = mktime(0, 0, 1, 1, 0, $nextYear);
	$diffTime = $newYearDate - $nowDate;
	echo "Количество дней до нового года: " . round($diffTime / (60 * 60 * 24));
}
?>

<h3 class="fw-bold mt-5">Элемент textarea в PHP</h3>
<p>В данном уроке мы поработаем с элементом textarea, представляющим собой многострочное поле ввода. Вот пример использования этого тега в форме:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&lttextarea name="test">&lt/textarea>
		&ltinput type="submit">
	&lt/form>
	</pre>
</code>
<p class="fw-bold">Задача:</p>
<p>Попросите пользователя оставить отзыв на сайт. После отправки формы выведите этот отзыв на экран.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltform action="">
		&ltp>Оставьте отзыв&lt/p>
		&lttextarea name="f7_text" id="">&lt/textarea>
		&ltinput type="submit">
	&lt/form>
&lt?php
if (isset($_GET['f7_text'])) {
	echo "&ltp>$_GET[f7_text]&lt/p>";
}
?></pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
	<p>Оставьте отзыв</p>
	<textarea name="f7_text" id=""></textarea>
	<input type="submit">
</form>
<?php
if (isset($_GET['f7_text'])) {
	echo "<p>$_GET[f7_text]</p>";
}
?>

<h3 class="fw-bold mt-5">Сохранение значения textarea после отправки в PHP</h3>
<p>Давайте теперь сделаем так, чтобы содержимое textarea сохранялось после отправки:</p>
<code>
	<pre>
	&ltform action="" method="GET">
	&lttextarea name="test">&lt?= $_GET['test'] ?? '' ?>&lt/textarea>
	&ltinput type="submit">
	&lt/form></pre>
</code>
<p class="fw-bold">Задача:</p>
<p>Пусть в textarea вводится русский текст. После отправки формы выведите на экран транслит этого текста. Сделайте так, чтобы содержимое формы сохранялось после отправки.</p>
<p class="fw-bold">Результат:</p>

<form action="" method="GET">
	<textarea name="f8_text"><?= $_GET['f8_text'] ?? '' ?></textarea>
	<input type="submit">
</form>
<?php
if (isset($_GET['f8_text'])) {
	$trsl = translit($_GET['f8_text']);
	echo "<p>$_GET[f8_text]</p>";
	echo "<p>$trsl</p>";
}
?>

<h3 class="fw-bold mt-5">Чекбокс в PHP</h3>
<p>Давайте теперь научимся работать с флажками checkbox в PHP. Сделаем такой флажок в нашей форме:</p>
<code>
	<pre>
		&ltform action="" method="GET">
		&ltinput type="checkbox" name="flag">
		&ltinput name="text">
		&ltinput type="submit">
		&lt/form></pre>
</code>
<p>После отправки формы в $_GET флажка будет содержаться строка 'on', если флажок был отмечен и null, если нет:</p>
<code>
	<pre>
			&lt?php
			var_dump($_GET['flag']); // 'on' или null
			?>
		</pre>
</code>
<p>Давайте выведем что-нибудь на экран в зависимости от того, был отмечен флажок или нет:</p>
<code>
	<pre>
			&lt?php
			if (!empty($_GET)) { // если форма была отправлена
				if (isset($_GET['flag'])) { // если флажок отмечен
					echo 'отмечен';
				} else {
					echo 'не отмечен';
				}
			}
			?>
		</pre>
</code>

<p class="fw-bold">Задача:</p>
<p>Сделайте форму с инпутом и флажком. С помощью инпута спросите у пользователя имя. После отправки формы, если флажок был отмечен, поприветствуйте пользователя, а если не был отмечен - попрощайтесь.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltform action="">
		&ltinput type="checkbox" name="f9_flag"
			&lt?= isset($_GET['f9_flag']) ? "checked" : '' ?>>
		&ltlabel>
			Имя:&ltbr />
			&ltinput name="f9_name"
				value="&lt?= $_GET['f9_name'] ?? '' ?>">
		&lt/label>
		&ltinput type="submit">
	&lt/form>
	&lt?php
	if (isset($_GET['f9_name']) and mb_strlen($_GET['f9_name']) > 0) {
		if (isset($_GET['f9_flag'])) {
			echo "flag: " . mb_strlen($_GET['f9_name']) . "&lt/p>&ltbr/>";
			echo "flag: $_GET[f9_flag]&lt/p>&ltbr/>";
			echo "&ltp>Здравствуйте $_GET[f9_name]&lt/p>";
		} else {
			echo "flag: null&lt/p>&ltbr/>";
			echo "&ltp>Досвидания $_GET[f9_name]&lt/p>";
		}
	}
?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
	<input type="checkbox" name="f9_flag"
		<?= isset($_GET['f9_flag']) ? "checked" : '' ?>>
	<label>
		Имя:<br />
		<input name="f9_name"
			value="<?= $_GET['f9_name'] ?? '' ?>">
	</label>
	<input type="submit">
</form>
<?php
if (isset($_GET['f9_name']) and mb_strlen($_GET['f9_name']) > 0) {
	if (isset($_GET['f9_flag'])) {
		echo "flag: " . mb_strlen($_GET['f9_name']) . "</p><br/>";
		echo "flag: $_GET[f9_flag]</p><br/>";
		echo "<p>Здравствуйте $_GET[f9_name]</p>";
	} else {
		echo "flag: null</p><br/>";
		echo "<p>Досвидания $_GET[f9_name]</p>";
	}
}
?>



<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput type="checkbox" name="flag">
		&ltinput type="submit">
	&lt/form></pre>
</code>
<p>Пусть код обработки нашей формы выглядит вот так:</p>
<code>
	<pre>
		&lt?php
		if (!empty($_GET)) { // если форма была отправлена
			if (isset($_GET['flag'])) { // если флажок отмечен
				echo 'отмечен';
			} else {
				echo 'не отмечен';
			}
		}
		?></pre>
</code>
<p>Нас ждет проблема - если флажок не отмечен, то, так как в форме кроме чекбокса нет других элементов, в $_GET будет лежать пустой массив. Это значит, что в коде обработки формы мы не попадем в первый if, проверяющий отправку формы.<br />
	Для решения проблемы используют специальный прием: создают скрытый инпут с таким же именем, как и у нашего чекбокса. При этом значением скрытого инпута ставят ноль, а чебокса - единицу:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput type="hidden" name="flag" value="0">
		&ltinput type="checkbox" name="flag" value="1">
		&ltinput type="submit">
	&lt/form></pre>
</code>
<p>В таком случае получится следующее. Если чекбокс не отмечен, то на сервер отправится только значение скрытого инпута. Если же чекбокс отмечен, то на сервер отправятся оба значения с одним именем. Но, так как значение чекбокса будет вторым, то оно просто затрет первое.<br />Итак, теперь наша чекбокс будет отправлять на сервер или ноль, или один:</p>
<code>
	<pre>
		&lt?php
		var_dump($_GET['flag']); // '0' или '1'
		?>
	</pre>
</code>
<p>Используем это в нашей проверке:</p>
<code>
	<pre>
		&lt?php
		if (!empty($_GET)) {
			if ($_GET['flag'] === '1') {
				echo 'отмечен';
			} else {
				echo 'не отмечен';
			}
		}
		?>
	</pre>
</code>
<p class="fw-bold">Задача:</p>
<p>С помощью флажка спросите у пользователя, есть ему уже 18 лет или нет. Если есть, разрешите ему доступ на сайт, а если нет - не разрешите.</p>
<p class="fw-bold">Результат:</p>
<form action="">
	<p>Вам уже есть 18?
		<input type="hidden" name="f10_check" value="0">
		<label>
			Да <input type="checkbox" name="f10_check" value="1"
				<?= (isset($_GET['f10_check']) and $_GET['f10_check'] == 1) ? 'checked' : '' ?>>
		</label>
	</p>
	<br />
	<input type="submit">
</form>
<?php
if (isset($_GET['f10_check'])) {

	if ($_GET['f10_check'] == 1) {
		echo "Доступ на сайт разрешен";
	} else {
		echo "Доступ на сайт НЕ разрешен";
	}
}
?>

<h3 class="fw-bold mt-5">Сохранение выбранного значения в чекбоксе после отправки в PHP</h3>
<p>Давайте теперь сделаем так, чтобы значение чекбокса сохранялось после отправки. Для этого проверим, что $_GET['flag'] существует (то есть была отправка формы) и равен единице (то есть флажок отмечен).<br />Если эти два условия выполняются, то выведем в чекбоксе атрибут checked:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput type="hidden" name="flag" value="0">
		&ltinput
			type="checkbox"
			name="flag" &lt?php
				if (isset($_GET['flag']) and $_GET['flag'] === '1')
					echo 'checked';
				?>
			>
		&ltinput type="submit">
	&lt/form></pre>
</code>
<p>Проверку можно упростить, если мы точно знаем, что скрытый инпут передает 0. В таком случае, если чекбокс не отмечен, то в $_GET['flag'] будет лежать '0', а если отправки формы еще не было, то будет лежать null.<br />В обоих этих случаях мы не должны выводить checked. И оба этих случая мы можем поймать функцией empty. Таким образом мы можем проверить, что $_GET['flag'] не пуст, и только в этом случае вывести checked:</p>
<code>
	<pre>
		&ltform action="" method="GET">
	&ltinput type="hidden" name="flag" value="0">
	&ltinput
		type="checkbox"
		name="flag"
		value="1"
		&lt?php if (!empty($_GET['flag'])) echo 'checked' ?>
	>
	&ltinput type="submit">
&lt/form></pre>
</code>
<p class="fw-bold">Задача:</p>
<p>Сделайте три чекбокса, которые будут сохранять свое значение после отправки.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&ltform action="">
	&ltlabel for="">Чекбокс_1 &ltinput
			type="checkbox"
			name="f11_ch_1"
			&lt?= isset($_GET['f11_ch_1']) ? "checked" : '' ?>
			>
	&lt/label>
	&ltlabel for="">Чекбокс_2 &ltinput
			type="checkbox"
			name="f11_ch_2"
			&lt?= isset($_GET['f11_ch_2']) ? 'checked' : '' ?>
			>
	&lt/label>
	&ltlabel for="">Чекбокс_3 &ltinput
			type="checkbox"
			name="f11_ch_3"
			&lt?= isset($_GET['f11_ch_3']) ? 'checked' : '' ?>
			>
	&lt/label>
	&ltinput type="submit">
&lt/form>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
	<label for="">Чекбокс_1 <input
			type="checkbox"
			name="f11_ch_1"
			<?= isset($_GET['f11_ch_1']) ? "checked" : '' ?>>
	</label>
	<label for="">Чекбокс_2 <input
			type="checkbox"
			name="f11_ch_2"
			<?= isset($_GET['f11_ch_2']) ? 'checked' : '' ?>>
	</label>
	<label for="">Чекбокс_3 <input
			type="checkbox"
			name="f11_ch_3"
			<?= isset($_GET['f11_ch_3']) ? 'checked' : '' ?>>
	</label>
	<input type="submit">
</form>

<h3 class="fw-bold mt-5">Радиокнопки в PHP</h3>
<p>Давайте теперь научимся работать с radio в PHP. Сделаем несколько переключателей в нашей форме:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput type="radio" name="radio" value="1">
		&ltinput type="radio" name="radio" value="2">
		&ltinput type="radio" name="radio" value="3">
		&ltinput type="submit">
	&lt/form>
	</pre>
</code>
<p>После отправки формы в $_GET переключателя будет содержаться значение атрибута value отмеченного переключателя, либо null, если ничего не было отмечено:</p>
<code>
	<pre>
		&lt?php
		var_dump($_GET['radio']); // '1', '2', '3' или null
		?>
	</pre>
</code>
<p>При работе с радио возникают та же проблема, что и в чекбоксах. Для решения этой проблемы давайте добавим скрытый инпут:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput type="hidden" name="radio" value="0">
		&ltinput type="radio"  name="radio" value="1">
		&ltinput type="radio"  name="radio" value="2">
		&ltinput type="radio"  name="radio" value="3">
		&ltinput type="submit">
	&lt/form></pre>
</code>
<p>Можно также не вводить скрытый инпут, а сделать один из переключателей отмеченным по умолчанию:</p>
<code>
	<pre>
	&ltform action="" method="GET">
		&ltinput type="radio" name="radio" value="1" checked>
		&ltinput type="radio" name="radio" value="2">
		&ltinput type="radio" name="radio" value="3">
		&ltinput type="submit">
	&lt/form></pre>
</code>

<p class="fw-bold">Задача:</p>
<p>С помощью двух переключателей спросите у пользователя его пол. Выведите результат на экран.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltform action="">
		&ltp>Какой ваш пол?&lt/p>
		&ltlabel>
			Мужской &ltinput type="radio" name="f12_radio" value="0">
		&lt/label>
		&ltlabel>
			Женский &ltinput type="radio" name="f12_radio" value="1">
		&lt/label>
		&ltlabel>
			Деревянный &ltinput type="radio" name="f12_radio" value="2" checked>
		&lt/label>
		&ltinput type="submit">
	&lt/form>
	&lt?php
	if (isset($_GET['f12_radio'])) {
		$arr = ['Мужской', 'Женский', 'Деревянный'];
		echo $arr[$_GET['f12_radio']];
	}
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
	<p>Какой ваш пол?</p>
	<label>
		Мужской <input type="radio" name="f12_radio" value="0">
	</label>
	<label>
		Женский <input type="radio" name="f12_radio" value="1">
	</label>
	<label>
		Деревянный <input type="radio" name="f12_radio" value="2" checked>
	</label>
	<input type="submit">
</form>
<?php
if (isset($_GET['f12_radio'])) {
	$arr = ['Мужской', 'Женский', 'Деревянный'];
	echo $arr[$_GET['f12_radio']];
}
?>

<h3 class="fw-bold mt-5">Сохранение выбранного значения в радиокнопках после отправки в PHP</h3>
<p>Давайте напишем код, который будет сохранять отмеченный переключатель после отправки формы:</p>
<code>
	<pre>
	&ltform action="" method="GET">
	&ltinput type="radio" name="radio" value="1" &lt?php
		if (!empty($_GET['radio']) and $_GET['radio'] === '1') {
			echo 'checked';
		}
		?>>
	&ltinput type="radio" name="radio" value="2" &lt?php
		if (!empty($_GET['radio']) and $_GET['radio'] === '2') {
			echo 'checked';
		}
		?>>
	&ltinput type="radio" name="radio" value="3" &lt?php
		if (!empty($_GET['radio']) and $_GET['radio'] === '3') {
			echo 'checked';
		}
		?>>
	&ltinput type="submit">
	&lt/form></pre>
</code>

<p class="fw-bold">Задача:</p>
<p>С помощью переключателей попросите пользователя выбрать его язык. Сделайте так, чтобы выбор не пропадал после отправки формы.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltform action="">
	&ltp>Выберите язык:&lt/p>
	&ltlabel>
		Русский
		&ltinput type="radio" name="f13_language" value="ru"
			&lt?= (isset($_GET['f13_language']) and $_GET['f13_language'] == 'ru') ? 'checked' : '' ?>>
	&lt/label>
	&ltbr />
	&ltlabel>
		Английский
		&ltinput type="radio" name="f13_language" value="en"
			&lt?= (isset($_GET['f13_language']) and $_GET['f13_language'] == 'en') ? 'checked' : '' ?>>
	&lt/label>
	&ltbr />
	&ltlabel>
		JavaScript
		&ltinput type="radio" name="f13_language" value="js"
			&lt?= (isset($_GET['f13_language']) and $_GET['f13_language'] == 'js') ? 'checked' : '' ?>>
	&lt/label>
	&ltbr />
	&ltinput type="submit">
	&lt/form>
	&lt?php
	if (isset($_GET['f13_language'])) {
		$change = 'Вы выбрали:';
		switch ($_GET['f13_language']) {
			case 'ru':
				echo "&ltp>$change Русский&lt/p>";
				break;
			case 'en':
				echo "&ltp>$change English&lt/p>";
				break;
			case 'js':
				echo "&ltp>$change JavaScript&lt/p>";
				break;
		}
	}
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
	<p>Выберите язык:</p>
	<label>
		Русский
		<input type="radio" name="f13_language" value="ru"
			<?= (isset($_GET['f13_language']) and $_GET['f13_language'] == 'ru') ? 'checked' : '' ?>>
	</label>
	<br />
	<label>
		Английский
		<input type="radio" name="f13_language" value="en"
			<?= (isset($_GET['f13_language']) and $_GET['f13_language'] == 'en') ? 'checked' : '' ?>>
	</label>
	<br />
	<label>
		JavaScript
		<input type="radio" name="f13_language" value="js"
			<?= (isset($_GET['f13_language']) and $_GET['f13_language'] == 'js') ? 'checked' : '' ?>>
	</label>
	<br />
	<input type="submit">
</form>
<?php
if (isset($_GET['f13_language'])) {
	$change = 'Вы выбрали:';
	switch ($_GET['f13_language']) {
		case 'ru':
			echo "<p>$change Русский</p>";
			break;
		case 'en':
			echo "<p>$change English</p>";
			break;
		case 'js':
			echo "<p>$change JavaScript</p>";
			break;
	}
}
?>

<h3 class="fw-bold mt-5">Селекты в PHP</h3>
<p>Давайте теперь научимся работать с тегом select в PHP. Сделаем такой выпадающий список в нашей форме:</p>
<code>
	<pre>
		&ltform action="" method="GET">
	&ltselect name="test">
		&ltoption>item1&lt/option>
		&ltoption>item2&lt/option>
		&ltoption>item3&lt/option>
	&lt/select>
	&ltinput type="submit">
&lt/form></pre>
</code>
<p>После отправки формы в $_GET селекта будет содержаться значение выбранного тега option:</p>
<code>
	<pre>
		&lt?php
		var_dump($_GET['test']); // 'item1', 'item2' или 'item3'
		?></pre>
</code>
<p class="fw-bold">Задача:</p>
<p>С помощью выпадающего списка предложите пользователю выбрать страну, в которой он живет.</p>
<p class="fw-bold">Результат:</p>
<form action="">
	<p>Выберите страну в которой вы живёте:
		<select name="f14_country" id="">
			<option value="ru"
				<?= (isset($_GET['f14_country']) and $_GET['f14_country'] == 'ru') ? 'selected' : '' ?>>
				Россия</option>
			<option value="us"
				<?= (isset($_GET['f14_country']) and $_GET['f14_country'] == 'us') ? 'selected' : '' ?>>
				США</option>
			<option value="cn"
				<?= (isset($_GET['f14_country']) and $_GET['f14_country'] == 'cn') ? 'selected' : '' ?>>
				Китай</option>
			<option value="pr"
				<?= (isset($_GET['f14_country']) and $_GET['f14_country'] == 'pr') ? 'selected' : '' ?>>
				Программирование</option>
		</select>
		<input type="submit">
	</p>
</form>
<?php if (isset($_GET['f14_country'])) {
	$change = 'Вы выбрали:';
	switch ($_GET['f14_country']) {
		case 'ru':
			echo "<p>$change Русский</p>";
			break;
		case 'en':
			echo "<p>$change English</p>";
			break;
		case 'cn':
			echo "<p>$change Китай</p>";
			break;
		default:
			echo "<p>$change Всё правильно ;)</p>";
			break;
	}
}
