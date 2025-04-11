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
		file: index.php
	&ltform action="/pass.php" method="POST">
	&ltlabel>введите пароль&ltbr/>&ltinput type="password" name="pass">&lt/label>
		&ltinput type="submit">
	&lt/form>
		
		file: pass.php
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
	<label>введите пароль<br/><input type="password" name="pass"></label>
	<input type="submit">
</form>

<p class="fw-bold">Задача:</p>
<code>
	<pre>
		С помощью трех инпутов спросите у пользователя год, месяц и день рождения пользователя. 
		После отправки формы определите день недели, в который родился пользователь.
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="birth_date.php" method="post">
	<p>Введите дату рождения	</p>
	<label>Год:<br/><input type="number" min="1900" max="2025" name="year"/></label>
	<label>Месяц:<br/><input type="number" min="1" max="12" name="month"/></label>
	<label>День:<br/><input type="number" min="1" max="31" name="day"/></label>
	<input type="submit">
</form>