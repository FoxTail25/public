<?php
require 'func/func.php';
?>
<h3 class="fw-bold mt-5">Подготовительные манипуляции для работы с SQL в PHP</h3>
<p>Давайте теперь научимся работать с базами данных через PHP. Для этого прежде всего необходимо установить соединение с сервером базы данных.<br />
	Делается это с помощью функции mysql_connect, которая принимает 3 параметра: имя хоста (сервера), имя пользователя, под которым мы работаем с базой и пароль для этого пользователя.<br />
	Если вы работаете на своем компьютере, то это будут localhost, root и пароль в виде пустой строки (на некоторых серверах он тоже может быть root). Если ваша база данных в интернете - то эти данные выдает вам хостинг.
	<br />
	Итак, давайте установим соединение с базой данных:
</p>

<code>
	<pre>
		&lt?php
		$host = 'localhost'; // имя хоста
		$user = 'root';      // имя пользователя
		$pass = '';          // пароль
		$name = 'mydb';      // имя базы данных

		$link = mysqli_connect($host, $user, $pass, $name);
		?></pre>
</code>
<p>Если указанные нами доступы правильные, то установится соединение к базе данных. При этом в переменную $link запишется специальный объект соединения, который мы будем использовать в дальнейшем для всех обращений к нашей базе данных.</p>
<meta charset="utf-8">
<?php
$host = 'MySQL-8.0'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'mydb';      // имя базы данных

$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<h3 class="fw-bold mt-5">Отправка запросов к базе данных</h3>
<p>После соединения с базой к ней можно отправлять запросы. Это делается с помощью функции <b>mysqli_query</b>. Первым параметром эта функция принимает принимает переменную, в которую мы записали результат <b>mysqli_connect</b>, а вторым - строку с SQL запросом.<br />
	К примеру, выполним запрос, который достанет все записи из таблицы users:</p>
<code>
	<pre>
		&lt?php
		$res = mysqli_query($link, 'SELECT * FROM users');
		?></pre>
</code>
<p>Текст запроса не обязательно писать прямо в параметре функции mysqli_query. Давайте вынесем его в переменную:</p>
<code>
	<pre>
		&lt?php
		$query = 'SELECT * FROM users';
		$res = mysqli_query($link, $query);
		?></pre>
</code>

<h3 class="fw-bold mt-5">Поиск ошибок в базе данных</h3>
<p>Как вы уже знаете, в PHP вывод ошибок на экран включается с помощью функции <b>error_reporting</b>. Эта функция, однако, не включает вывод ошибок, допущенных в тексте SQL запроса.<br />
	Чтобы вывести ошибки SQL команд, следует пользоваться функцией <b>mysqli_error</b>, которую необходимо добавлять к каждому запросу к БД, вот так:</p>

<code>
	<pre>
		&lt?php
		$query = 'SELECT * FROM users';
		$res = mysqli_query($link, $query) or die(mysqli_error($link));
		?></pre>
</code>

<p>Пока не будем разбираться с тем, как работает эта конструкция. Просто добавляйте ее и, в случае ошибочного SQL запроса, вы увидите сообщение об этом в окне браузера.</p>
<p><i><b>Скорее всего это работает так: либо срабатывает запрос, либо репорт об ошибке :)</b></i></p>
<?php

$query = 'SELECT * FROM users';
$res = mysqli_query($link, $query) or die(mysqli_error($link));
var_dump($res);

?>

<h3 class="fw-bold mt-5">Проблемы с кодировками при работе с SQL в PHP</h3>
<p>Как правило, если не сделать дополнительных действий, то русский текст при получении из базы данных будет выводится абракадаброй или вопросиками. Для избежания таких проблем следует описанных ниже правил.</p>
<p class="fw-bold text-center">Правило 1</p>
<p>База данных и таблицы в ней должны быть в кодировке utf8_general_ci.</p>
<p class="fw-bold text-center">Правило 2</p>
<p>Сам PHP файл должен быть в кодировке utf8.</p>
<p class="fw-bold text-center">Правило 3</p>
<p>В начале PHP файла должен быть следующий HTML тег:</p>
<code>
	<pre>&ltmeta charset="utf-8"></pre>
</code>
<p class="fw-bold text-center">Правило 4</p>
<p>На всякий случай сразу после команды <b>mysqli_connect</b> добавьте такое запрос:</p>
<code>
	<pre>
		&lt?php
		mysqli_query($link, "SET NAMES 'utf8'");
		?>
	</pre>
</code>

<h3 class="fw-bold mt-5">Полный тестовый код для проверки работоспособности коннекта PHP с MySQL</h3>

<code>
	<pre>
	&ltmeta charset="utf-8">
	&lt?php
	$host = 'localhost'; // имя хоста
	$user = 'root';      // имя пользователя
	$pass = '';          // пароль
	$name = 'mydb';      // имя базы данных

	$link = mysqli_connect($host, $user, $pass, $name);
	mysqli_query($link, "SET NAMES 'utf8'");

	$query = 'SELECT * FROM users';
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	var_dump($res);
	?></pre>
</code>

<h3 class="fw-bold mt-5">Получение результата при SQL запросе в PHP</h3>
<p>В предыдущем уроке мы сделали тестовый код. Напомню его существенную часть, выполняющую запрос к базе:</p>
<code>
	<pre>
	&lt?php
	$query = 'SELECT * FROM users';
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	var_dump($res);
	?></pre>
</code>


<p>Как вы видите, после того, как произойдет запрос к базе, в переменной <b>$res</b> будет лежать результат этого действия. Однако лежит он не в той форме, которая нам нужна в PHP, а в той форме, в которой его прислала нам база.<br />
	Для того, чтобы получить результат в привычной нам форме, необходимо воспользоваться функцией <b>mysqli_fetch_assoc</b>, извлекающей из результата одну строку.<br />
	Давайте попробуем:</p>

<code>
	<pre>
	&lt?php
	$row = mysqli_fetch_assoc($res);
	var_dump($row);
	?></pre>
</code>
<p>В результате var_dump выведет массив с первым работником:</p>
<code>
	<pre>
	&lt?php
	['id' => 1, 'name' => 'user1', 'age' => 23, 'salary' => 400]
	?></pre>
</code>
<p>При этом из переменной $res первый работник исчезнет, и следующий вызов mysqli_fetch_assoc получит уже следующего работника.</p>
<p>И так можно можно вызывать нашу функцию до тех пор, пока работники не закончатся. Как только это произойдет, то следующий вызов функции вернет false.<br />
	Давайте попробуем:</p>

<code>
	<pre>
	&lt?php
	$row1 = mysqli_fetch_assoc($res);
	var_dump($row1); // работник номер 1
    echo '&ltbr/>';
	$row2 = mysqli_fetch_assoc($res);
	var_dump($row2); // работник номер 2
    echo '&ltbr/>';
	$row3 = mysqli_fetch_assoc($res);
	var_dump($row3); // работник номер 3
    echo '&ltbr/>';
	$row4 = mysqli_fetch_assoc($res);
	var_dump($row4); // работник номер 4
    echo '&ltbr/>';
	$row5 = mysqli_fetch_assoc($res);
	var_dump($row5); // работник номер 5
    echo '&ltbr/>';
	$row6 = mysqli_fetch_assoc($res);
	var_dump($row6); // работник номер 6
    echo '&ltbr/>';
	$row7 = mysqli_fetch_assoc($res);
	var_dump($row7); // выведет NULL - работники кончились
	?></pre>
</code>
<?php
$row1 = mysqli_fetch_assoc($res);
var_dump($row1); // работник номер 1
echo '<br/>';
$row2 = mysqli_fetch_assoc($res);
var_dump($row2); // работник номер 2
echo '<br/>';
$row3 = mysqli_fetch_assoc($res);
var_dump($row3); // работник номер 3
echo '<br/>';
$row4 = mysqli_fetch_assoc($res);
var_dump($row4); // работник номер 4
echo '<br/>';
$row5 = mysqli_fetch_assoc($res);
var_dump($row5); // работник номер 5
echo '<br/>';
$row6 = mysqli_fetch_assoc($res);
var_dump($row6); // работник номер 6
echo '<br/>';
$row7 = mysqli_fetch_assoc($res);
var_dump($row7); // выведет NULL - работники кончились
?>

<h3 class="fw-bold mt-5">Получение результата в виде массива при SQL запросе в PHP</h3>
<p>При считывании по рядам можно не выводить каждого работника, а записывать их в какой-нибудь массив:</p>

<code>
	<pre>
		&lt?php
		$row1 = mysqli_fetch_assoc($res);
		$data[] = $row1;

		$row2 = mysqli_fetch_assoc($res);
		$data[] = $row2;

		$row3 = mysqli_fetch_assoc($res);
		$data[] = $row3;

		$row4 = mysqli_fetch_assoc($res);
		$data[] = $row4;

		$row5 = mysqli_fetch_assoc($res);
		$data[] = $row5;

		$row6 = mysqli_fetch_assoc($res);
		$data[] = $row6;
		?>
	</pre>
</code>
<p>В результате в переменной $data получится следующий двухмерный массив:</p>
<code>
	<pre>
		&lt?php
		[
			['id' => 1, 'name' => 'user1', 'age' => 23, 'salary' => 400],
			['id' => 2, 'name' => 'user2', 'age' => 25, 'salary' => 500],
			['id' => 3, 'name' => 'user3', 'age' => 23, 'salary' => 500],
			['id' => 4, 'name' => 'user4', 'age' => 30, 'salary' => 900],
			['id' => 5, 'name' => 'user5', 'age' => 27, 'salary' => 500],
			['id' => 6, 'name' => 'user6', 'age' => 28, 'salary' => 900],
		]
		?>
	</pre>
</code>

<h3 class="fw-bold mt-5">Формирование массива в цикле при SQL запросе в PHP</h3>
<p>Конечно же, в ручную перебирать всех работников не очень удобно. Пусть лучше за нас это сделает цикл:</p>

<code>
	<pre>
		&lt?php
		for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
		var_dump($data); // здесь будет массив с результатом
		?>
	</pre>
</code>

<p>Давайте разберемся, как работает этот цикл.<br />
	В каждой итерации цикла функция mysqli_fetch_assoc последовательно считывает каждую строку результата, записывая его в массив $data.<br />
	Как только в $res закончатся строки, то mysqli_fetch_assoc вернет NULL и цикл закончит свою работу. А полученный результат будет лежать в двухмерном массиве $data.
</p>

<p class="fw-bold mt-5">Задача 1</p>
<p>С помощью описанного цикла получите и выведите на экран таблицу всех работников.</p>

<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$select_query = 'select * from users';
	$res = mysqli_query($link, $select_query);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	?>
	&ltstyle>
		td,th {
			border: 1px solid black;
			padding: 5px;
			text-align: center;
		}
	&lt/style>
	&lttable>
	&lttr>
		&ltth>id&lt/th>
		&ltth>name&lt/th>
		&ltth>age&lt/th>
		&ltth>salary&lt/th>
	&lt/tr>
	&lt?php foreach ($data as $row): ?>
		&lttr>
			&lttd>&lt?= $row['id'] ?>&lt/td>
			&lttd>&lt?= $row['name'] ?>&lt/td>
			&lttd>&lt?= $row['age'] ?>&lt/td>
			&lttd>&lt?= $row['salary'] ?>&lt/td>
		&lt/tr>
		&lt?php endforeach ?>
	&lt/table></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$select_query = 'select * from users';
$res = mysqli_query($link, $select_query);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
?>
<style>
	td,
	th {
		border: 1px solid black;
		padding: 5px;
		text-align: center;
	}
</style>
<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>age</th>
		<th>salary</th>
	</tr>
	<?php foreach ($data as $row): ?>
		<tr>
			<td><?= $row['id'] ?></td>
			<td><?= $row['name'] ?></td>
			<td><?= $row['age'] ?></td>
			<td><?= $row['salary'] ?></td>
		</tr>
	<?php endforeach ?>
</table>


<p class="fw-bold mt-5">Задача 2</p>
<p>Из полученного результата получите первого работника. Через echo выведите на экран его имя.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltp>Имя первого работника: &lt?= $data[0]['name'] ?>&lt/p></pre>
</code>
<p class="fw-bold">Результат:</p>
<p>Имя первого работника: <?= $data[0]['name'] ?></p>

<p class="fw-bold mt-5">Задача 3</p>
<p>Из полученного результата получите второго работника. Через echo выведите на экран его имя и возраст.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltp>Второй работник имя: &lt?= $data[1]['name'] ?> возраст: &lt?= $data[1]['age'] ?>&lt/p></pre>
</code>
<p class="fw-bold">Результат:</p>
<p>Второй работник имя: <?= $data[1]['name'] ?> возраст: <?= $data[1]['age'] ?></p>

<p class="fw-bold mt-5">Задача 4</p>
<p>Из полученного результата получите третьего работника. Через echo выведите на экран его имя, возраст и зарплату.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&ltp>Второй работник имя: &lt?=$data[2]['name']?> возраст: &lt?=$data[2]['age']?> зарплата: &lt?=$data[2]['salary']?>&lt/p></pre>
</code>
<p class="fw-bold">Результат:</p>
<p>Второй работник имя: <?= $data[2]['name'] ?> возраст: <?= $data[2]['age'] ?> зарплата: <?= $data[2]['salary'] ?> </p>

<h3 class="fw-bold mt-5">Выборка записей при SQL запросе к базе в PHP</h3>
<p>В тестовом коде вы уже видели команду SELECT, выполняющую выборку данных из БД. Давайте теперь подробнее разберемся с ее синтаксисом. Вот он:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM таблица WHERE условие";
		?></pre>
</code>
<p>Как вы видите, после имени таблицы можно еще дописать команду WHERE, в которой можно писать ограничение на выбираемые записи. В условии допустимы следующие операции сравнения: =, !=, <>, <,>, <=,>=.<br />
				Давайте посмотрим их применение на примерах.
</p>

<p class="fw-bold">Пример 1</p>
<p>Выберем юзера с id, равным 2:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE id=2";
		?></pre>
</code>
<p class="fw-bold">Пример 2</p>
<p>Выберем юзеров с id, большим 2:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE id>2";
		?></pre>
</code>
<p class="fw-bold">Пример 3</p>
<p>Выберем юзеров с id, большим или равным 2:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE id>=2";
		?></pre>
</code>
<p class="fw-bold">Пример 4</p>
<p>Выберем юзеров с id, не равным 2:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE id!=2";
		?></pre>
</code>
<p class="fw-bold">Пример 5</p>
<p>Вместо команды != можно писать команду <>:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE id<>2";
		?></pre>
</code>
<p class="fw-bold">Пример 6</p>
<p>Выберем юзеров возрастом 23 года:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE age=23";
		?></pre>
</code>
<p class="fw-bold">Пример 7</p>
<p>Выберем юзеров с зарплатой 500:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE salary=500";
		?></pre>
</code>
<p class="fw-bold">Пример 8</p>
<p>Выберем юзера с именем 'user1'. Здесь нас поджидает важный нюанс: так как имя является строкой, то его необходимо взять в кавычки:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE name='user1'";
		?></pre>
</code>
<p class="fw-bold">Пример 9</p>
<p>Если команда WHERE отсутствует, то выберутся все записи из таблицы. Давайте выберем всех работников:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users";
		?></pre>
</code>


<h3 class="fw-bold mt-5">Практические задачи</h3>
<p><i>Что бы "красиво" выводить полученные данные добавим в файл func/func/php вот такой код:</i></p>
<code>
	<pre>
	&lt?php
	function getTable($data)
	{
		$res = "&ltstyle>
		td,
		th {
			border: 1px solid black;
			padding: 5px;
			text-align: center;
		}
		&lt/style>
		&lttable>
		&lttr>
			&ltth>id&lt/th>
			&ltth>name&lt/th>
			&ltth>age&lt/th>
			&ltth>salary&lt/th>
		&lt/tr>";
		foreach ($data as $row) {

			$res .= "&lttr>";
			$res .= "&lttd>$row[id]&lt/td>";
			$res .= "&lttd>$row[name]&lt/td>";
			$res .= "&lttd>$row[age]&lt/td>";
			$res .= "&lttd>$row[salary]&lt/td>";
			$res .= "&lt/tr>";
		}
		$res .= "&lt/table>";
		return $res;
	}
	?></pre>
</code>
<p>теперь подключим его к нашему файлу с помощью
	&lt?php
	require 'func/func.php';
	?>
</p>
<p><i>Теперь мы можем кравиво выводить (в виде таблицы) результаты SQL запросов к базе данных используя функци <b>getTable</b></i></p>
<p class="fw-bold mt-5">Задача 1</p>
<p>Выберите юзера с id, равным 3.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
		$query_id3 = "select * from users where id = '3'";
		$res = mysqli_query($link, $query_id3);
		for($data = [];	$row = mysqli_fetch_assoc($res); $data[] = $row);
		echo getTable($data);
	?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_id3 = "select * from users where id = '3'";
$res = mysqli_query($link, $query_id3);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 2</p>
<p>Выберите юзеров с зарплатой 900.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
		$query_salary900 = "select * from users where salary ='900'";
		$res = mysqli_query($link, $query_salary900);
		for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
		echo getTable($data);
	?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_salary900 = "select * from users where salary ='900'";
$res = mysqli_query($link, $query_salary900);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 3</p>
<p>Выберите юзеров в возрасте 23 года.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_age23 = "select * from users where age ='23'";
	$res = mysqli_query($link, $query_age23);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_age23 = "select * from users where age ='23'";
$res = mysqli_query($link, $query_age23);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 4</p>
<p>Выберите юзеров с зарплатой более 400.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_salayUp400= "select * from users where salary > '400'";
	$res = mysqli_query($link, $query_salayUp400) or die(mysqli_error($link));
	for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_salayUp400 = "select * from users where salary > '400'";
$res = mysqli_query($link, $query_salayUp400) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 5</p>
<p>Выберите юзеров с зарплатой равной или большей 500.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_salaryUp500 = "select * from users where salary >='500'";
	$res = mysqli_query($link, $query_salaryUp500);
	for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_salaryUp500 = "select * from users where salary >='500'";
$res = mysqli_query($link, $query_salaryUp500);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>
<p class="fw-bold mt-5">Задача 6</p>
<p>Выберите юзеров с зарплатой НЕ равной 500.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_salaryNot500 = "select * from users where salary != 500";
	$res = mysqli_query($link, $query_salaryNot500);
	for($data=[]; $row = mysqli_fetch_assoc($res); $data[]=$row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_salaryNot500 = "select * from users where salary != 500";
$res = mysqli_query($link, $query_salaryNot500);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 7</p>
<p>Выберите юзеров с зарплатой равной или меньшей 500.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_salaryDownOr500 = "select * from users where salary <= 500";
	$res = mysqli_query($link, $query_salaryDownOr500);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_salaryDownOr500 = "select * from users where salary <= 500";
$res = mysqli_query($link, $query_salaryDownOr500);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>


<h3 class="fw-bold mt-5">Логические операции в SQL запросе в PHP</h3>
<p>В условии выборки можно делать более сложные комбинации с помощью команд OR и AND. Работают они так же, как и их аналоги в PHP конструкции if. Давайте посмотрим на примерах.</p>
<p class="fw-bold">Пример 1</p>
<p>Выберем юзеров с зарплатой 500 И возрастом 23 года:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE salary=500 AND age=23";
		?></pre>
</code>
<p class="fw-bold">Пример 2</p>
<p>Выберем юзеров с зарплатой 500 ИЛИ возрастом 23 года:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE salary=500 OR age=23";
		?></pre>
</code>
<p class="fw-bold">Пример 3</p>
<p>Выберем юзеров с зарплатой от 450 до 900:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE salary>450 AND salary&lt900";
		?></pre>
</code>
<p class="fw-bold">Пример 4</p>
<p>Выберем юзеров с возрастом от 23 до 27 лет включительно:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE age=>23 AND age&lt=27";
		?></pre>
</code>
<p class="fw-bold">Пример 5</p>
<p>Сложные комбинации команд OR и AND можно группировать с помощью круглых скобок, чтобы показать приоритет условий:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE (age=>20 AND age&lt=27) OR (salary>300 AND salary&lt500)";
		?></pre>
</code>

<h3 class="fw-bold mt-5">Практические задачи</h3>

<p class="fw-bold mt-5">Задача 1</p>
<p>Выберите юзеров в возрасте от 25 (не включительно) до 28 лет (включительно).</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_age25and28 = 'select * from users where age > 25 and age <= 28';
	$res = mysqli_query($link, $query_age25and28);
	for($data=[]; $row=mysqli_fetch_assoc($res); $data[]=$row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_age25and28 = 'select * from users where age > 25 and age <= 28';
$res = mysqli_query($link, $query_age25and28);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 2</p>
<p>Выберите юзера user1.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_user1 = "select * from users where name = 'user1'";
	$res = mysqli_query($link, $query_user1);
	for($data=[];$row=mysqli_fetch_assoc($res);$data[]=$row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_user1 = "select * from users where name = 'user1'";
$res = mysqli_query($link, $query_user1);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 3</p>
<p>Выберите юзеров user1 и user2.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_user1and2 = "select * from users where name = 'user1' or name = 'user2'";
	$res = mysqli_query($link, $query_user1and2);
	for($data=[]; $row = mysqli_fetch_assoc($res); $data[]=$row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_user1and2 = "select * from users where name = 'user1' or name = 'user2'";
$res = mysqli_query($link, $query_user1and2);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>
<p class="fw-bold mt-5">Задача 4</p>
<p>Выберите всех, кроме юзера user3.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_notUser3 = "select * from users where name <> 'user3'";
	// $query_notUser3 = "select * from users where name != 'user3'"; // тоже работает
	$res = mysqli_query($link, $query_notUser3);
	for($data=[]; $row = mysqli_fetch_assoc($res); $data[]=$row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_notUser3 = "select * from users where name <> 'user3'";
// $query_notUser3 = "select * from users where name != 'user3'"; // тоже работает
$res = mysqli_query($link, $query_notUser3);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>

<p class="fw-bold mt-5">Задача 5</p>
<p>Выберите всех юзеров в возрасте 27 лет или с зарплатой 1000.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_age27orsalary1000 = "select * from users where age = 27 or salary = 1000";
	$res = mysqli_query($link, $query_age27orsalary1000);
	for($data=[]; $row= mysqli_fetch_assoc($res);$data[]=$row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_age27orsalary1000 = "select * from users where age = 27 or salary = 1000";
$res = mysqli_query($link, $query_age27orsalary1000);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>
<p class="fw-bold mt-5">Задача 6</p>
<p>Выберите всех юзеров в возрасте 27 лет или с зарплатой не равной 400.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_age27orsalaryNot400 = "select * from users where age = 27 OR salary <> 400";
	$res = mysqli_query($link, $query_age27orsalaryNot400);
	for($data=[]; $row=mysqli_fetch_assoc($res); $data[]=$row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_age27orsalaryNot400 = "select * from users where age = 27 OR salary <> 400";
$res = mysqli_query($link, $query_age27orsalaryNot400);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>
<p class="fw-bold mt-5">Задача 7</p>
<p>Выберите всех юзеров в возрасте от 23 лет (включительно) до 27 лет (не включительно) или с зарплатой 1000.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_ageUp23down27orsalary1000 = "select * from users where age >= 23 AND age < 27 OR salary = 1000";
	$res = mysqli_query($link, $query_ageUp23down27orsalary1000);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_ageUp23down27orsalary1000 = "select * from users where age >= 23 AND age < 27 OR salary = 1000";
$res = mysqli_query($link, $query_ageUp23down27orsalary1000);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>
<p class="fw-bold mt-5">Задача 8</p>
<p>Выберите всех юзеров в возрасте от 23 лет до 27 лет или с зарплатой от 400 до 1000.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_agefrom23to27andsalaryFrom400to1000 = "select * from users where (age > 23 and age < 27) or (salary > 400 and salary < 1000)";
	$res = mysqli_query($link, $query_agefrom23to27andsalaryFrom400to1000);
	for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	echo getTable($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_agefrom23to27andsalaryFrom400to1000 = "select * from users where (age > 23 and age < 27) or (salary > 400 and salary < 1000)";
$res = mysqli_query($link, $query_agefrom23to27andsalaryFrom400to1000);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo getTable($data);
?>

<h3 class="fw-bold mt-5">Поля выборки при SQL запросе в PHP</h3>
<p>В предыдущих уроках при выборке из БД в результат попадали все столбцы таблицы. Это на самом деле не обязательно - можно указать, какие конкретно поля нам нужны.<br />Для этого вместо звездочки, которую мы ставим после команды SELECT, через запятую можно перечислить имена нужных полей.<br />Посмотрим на примере. Давайте при выборке из нашей таблицы users достанем только имя и возраст работника:</p>

<code>
	<pre>
	&lt?php
	$query = "SELECT name, age FROM users WHERE id >= 3";
	?></pre>
</code>


<p><i>Для начала сделаем новую функцию <b>getTableM</b>. За основу возьмем нашу функцию <b>getTable</b> которая находится в файл <b>func/func.php</b><br />
		И модернизируем её под новые условия. Вот код новой функции:</i></p>
<code>
	<pre>
	function getTableM($data)
	{
		$res = "&ltstyle>
				td,
				th {
					border: 1px solid black;
					padding: 5px;
					text-align: center;
				}
				&lt/style>
				&lttable>
					&lttr>";

		foreach (array_keys($data[0]) as $header) {
			$res .= "&ltth>$header&lt/th>";
		}

		$res .= "&lt/tr>";
		foreach ($data as $row) {

			$res .= "&lttr>";
			isset($row['id']) ? $res .= "&lttd>$row[id]&lt/td>" : "";
			isset($row['name']) ? $res .= "&lttd>$row[name]&lt/td>" : "";
			isset($row['age']) ? $res .= "&lttd>$row[age]&lt/td>" : "";
			isset($row['salary']) ? $res .= "&lttd>$row[salary]&lt/td>" : "";
			$res .= "&lt/tr>";
		}
		echo $res. "&lt/table>";
	}
	</pre>
</code>
<p><i>Теперь функция будет сразу отрисовывать таблицу только из тех значений, которые пришли в ответе от SQL запроса</i></p>
<p class="fw-bold mt-5">Задача 1</p>
<p>Выберите из таблицы users имя, возраст и зарплату для каждого работника.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_nameAndSalary = "select name, salary from users";
	$res = mysqli_query($link, $query_nameAndSalary);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	getTableM($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_nameAndSalary = "select name, salary from users";
$res = mysqli_query($link, $query_nameAndSalary);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM($data);
?>

<p class="fw-bold mt-5">Задача 2</p>
<p>Выберите из таблицы users имена всех работников.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_allNames = "select name from users";
	$res = mysqli_query($link, $query_allNames);
	for($data =[]; $row = mysqli_fetch_assoc($res); $data[]=$row);
	getTableM($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_allNames = "select name from users";
$res = mysqli_query($link, $query_allNames);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM($data);
?>

<h3 class="fw-bold mt-5">Вставка записей через SQL запрос в PHP</h3>
<p>Давайте теперь научимся добавлять новые записи в таблицу. Это делается с помощью команды INSERT INTO. Она имеет следующий синтаксис:</p>

<code>
	<pre>
	&lt?php
	$query = "INSERT INTO таблица (поле1, поле2...) VALUES (значение1, значение2...)"; 
	?>
	</pre>
</code>
<p>Давайте в нашу таблицу users добавим нового юзера:</p>
<code>
	<pre>
	&lt?php
	$query = "INSERT INTO users (name, age, salary) VALUES ('user', 30, 1000)"; 
	?>
	</pre>
</code>
<p>Может быть не очень очевидно, что результат вставки нам не нужно обрабатывать через mysqli_fetch_assoc. Нам нужно просто выполнить этот запрос через mysqli_query, а результат вставки нужно смотреть через PhpMyAdmin:</p>
<code>
	<pre>
	&lt?php
	$query = "INSERT INTO users (name, age, salary) VALUES ('user', 30, 1000)"; 
	mysqli_query($link, $query) or die(mysqli_error($link));	?>
	</pre>
</code>
<p>Обратите также внимание на то, что при вставке мы не указываем столбец id и его значение. И это правильно, так как значение этого столбца проставится базой автоматически.</p>

<p class="fw-bold mt-5">Задача</p>
<p>Добавьте нового юзера 'user7', 26 лет, зарплата 300.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_insUser = "insert into users (name, age, salary) values ('user7',26,1000)";
	mysqli_query($link, $query_insUser) or die(mysqli_error($link));
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
// $query_insUser = "insert into users (name, age, salary) values ('user7',26,1000)";
// mysqli_query($link, $query_insUser) or die(mysqli_error($link));
?>

<h3 class="fw-bold mt-5">Вставка записей при отсутствующих столбцах через SQL запрос в PHP</h3>
<p>Что будет, если не указать значение какого-либо столбца? Давайте, например, укажем только имя и возраст:</p>

<code>
	<pre>
	&lt?php
	$query = "INSERT INTO users (name, age) VALUES ('user', 30)";
	mysqli_query($link, $query) or die(mysqli_error($link));
	?>
	</pre>
</code>

<p>В таком случае не указанные столбцы возьмут значение по умолчанию. Если такое значение не указано в PhpMyAdmin, то это приведет к ошибке и такой запрос откажется выполнятся.</p>

<p class="fw-bold mt-5">Задача</p>
<p>Добавьте нового юзера 'xxxx', не указав ему возраст и зарплату.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_insEr = "insert into users (name) values ('xxxx')";
	mysqli_query($link, $query_insEr) or die($mysqli_error($link));
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
// $query_insEr = "insert into users (name) values ('xxxx')";
// $err = mysqli_query($link, $query_insEr) or die($mysqli_error($link));
// echo $err;
?>
<p>Резальтат будет таким: Fatal error: Uncaught mysqli_sql_exception: Field 'age' doesn't have a default value</p>

<h3 class="fw-bold mt-5">Обновление записей через SQL запрос в PHP</h3>
<p>Давайте теперь научимся изменять записи. Это делается с помощью команды UPDATE. Она имеет следующий синтаксис:</p>
<code>
	<pre>
	&lt?php
	$query = "UPDATE таблица SET полe = значениe WHERE условие";
	?>
	</pre>
</code>

<p class="fw-bold">Пример 1</p>
<p>Давайте поменяем возраст и зарплату юзера:</p>
<code>
	<pre>
		&lt?php
		$query = "UPDATE users SET age=20, salary=800 WHERE id=1";
		?></pre>
</code>

<p class="fw-bold">Пример 2</p>
<p>Установим зарплату 400 и возраст 24 всем юзерам в возрасте 23:</p>
<code>
	<pre>
		&lt?php
		$query = "UPDATE users SET age=24, salary=400 WHERE age=23";
		?></pre>
</code>

<p class="fw-bold">Пример 3</p>
<p>Без команды WHERE обновления захватят всю таблицу. Например, установим всем юзерам зарплату 400 и возраст 24:</p>
<code>
	<pre>
		&lt?php
		$query = "UPDATE users SET age=24, salary=400";
		?></pre>
</code>

<p class="fw-bold mt-5">Задача 1</p>
<p>Используя созданный ранее вами дамп таблицы users приведите ее в исходное состояние.</p>

<p class="fw-bold mt-5">Задача 2</p>
<p>Юзеру с id 4 поставьте возраст 35 лет.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_update = "update users set age=35 where id=4";
	mysqli_query($link, $query_update);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
// $query_update = "update users set age=35 where id=4";
// mysqli_query($link, $query_update);
?>

<p class="fw-bold mt-5">Задача 3</p>
<p>Всем, у кого зарплата 500, сделайте ее 700.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_updateSal = "update users set salary = 700 where salary = 500 ";
	mysqli_query($link, $query_updateSal);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
// $query_updateSal = "update users set salary = 700 where salary = 500 ";
// mysqli_query($link, $query_updateSal);
?>

<p class="fw-bold mt-5">Задача 4</p>
<p>Работникам с id больше 2 и меньше 5 включительно поставьте возраст 23.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_updateAge = "update users set age = 23 where id >= 2 and id <= 5 ";
	mysqli_query($link, $query_updateAge);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
// $query_updateAge = "update users set age = 23 where id >= 2 and id <= 5 ";
// mysqli_query($link, $query_updateAge);
?>

<h3 class="fw-bold mt-5">Удаление записей через SQL запрос в PHP</h3>
<p>С помощью команды DELETE можно удалять записи из таблицы. Ее синтаксис похож на изученное вами ранее:</p>
<code>
	<pre>
	&lt?php
	$query = "DELETE FROM таблица WHERE условие";
	?>
	</pre>
</code>

<p class="fw-bold mt-5">Задача 1</p>
<p>Удалите юзера с id, равным 7.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_deleteId7 = "delete from users where id = 7";
	mysqli_query($link, $query_deleteId7);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
// $query_deleteId7 = "delete from users where id = 7";
// mysqli_query($link, $query_deleteId7);
?>

<p class="fw-bold mt-5">Задача 2</p>
<p>Удалите всех юзеров, у которых возраст 23 года.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_deleteId7 = "delete from users where age = 23";
	mysqli_query($link, $query_deleteId7);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
// $query_deleteId7 = "delete from users where age = 23";
// mysqli_query($link, $query_deleteId7);
?>

<p class="fw-bold mt-5">Задача 3</p>
<p>Удалите всех юзеров.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_deleteAll = "delete from users";
	mysqli_query($link, $query_deleteAll);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
// $query_deleteAll = "delete from users";
// mysqli_query($link, $query_deleteAll);
?>

<h3 class="fw-bold mt-5">Сортировка записей через SQL запрос в PHP</h3>
<p>С помощью команды ORDER BY можно сортировать строки результата.</p>

<p class="fw-bold">Пример 1</p>
<p>Выберем из нашей таблицы users всех юзеров и отсортируем их по возрасту от меньшего к большему:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users ORDER BY age";
		?></pre>
</code>

<p class="fw-bold">Пример 2</p>
<p>Поменяем порядок сортировки с помощью команды DESC:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users ORDER BY age DESC";
		?></pre>
</code>

<p class="fw-bold">Пример 3</p>
<p>Выберем всех юзеров с зарплатой 500 и отсортируем их по возрасту от меньшего к большему:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE salary=500 ORDER BY age";
		?></pre>
</code>

<p class="fw-bold">Пример 4</p>
<p>Можно сортировать не по одному полю, а по нескольким. Давайте для примера выберем всех юзеров и отсортируем их сначала по возрастанию возраста, а юзеров с одинаковыми возрастами отсортируем по возрастанию зарплаты:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users ORDER BY age, salary";
		?></pre>
</code>

<h3 class="fw-bold mt-5">Практические задачи</h3>

<p class="fw-bold mt-5">Задача 1</p>
<p>Достаньте всех юзеров и отсортируйте их по возрастанию зарплаты.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_selectOrd = "select * from users order by salary";
	$res = mysqli_query($link, $query_selectOrd);
	for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
	getTableM($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_selectOrd = "select * from users order by salary";
$res = mysqli_query($link, $query_selectOrd);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM($data);
?>

<p class="fw-bold mt-5">Задача 2</p>
<p>Достаньте всех юзеров и отсортируйте их по убыванию зарплаты.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_selectOrdDesc = "select * from users order by salary desc";
	$res = mysqli_query($link, $query_selectOrdDesc);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	getTableM($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_selectOrdDesc = "select * from users order by salary desc";
$res = mysqli_query($link, $query_selectOrdDesc);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM($data);
?>

<p class="fw-bold mt-5">Задача 3</p>
<p>Достаньте всех юзеров и отсортируйте их по имени.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_selOrdName = "select * from users order by name";
	$res = mysqli_query($link, $query_selOrdName);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	getTableM($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_selOrdName = "select * from users order by name";
$res = mysqli_query($link, $query_selOrdName);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM($data);
?>

<p class="fw-bold mt-5">Задача 4</p>
<p>Достаньте юзеров с зарплатой 500 и отсортируйте их по возрасту.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_selSalOrdAge = "select * from users where salary = 500 order by age";
	$res = mysqli_query($link, $query_selSalOrdAge);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	getTableM($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_selSalOrdAge = "select * from users where salary = 500 order by age";
$res = mysqli_query($link, $query_selSalOrdAge);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM($data);
?>

<p class="fw-bold mt-5">Задача 5</p>
<p>Достаньте всех юзеров и отсортируйте их по имени и по зарплате.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_selOrdNamSal = "select * from users order by name, salary";
	$res = mysqli_query($link, $query_selOrdNamSal);
	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
	getTableM($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_selOrdNamSal = "select * from users order by name, salary";
$res = mysqli_query($link, $query_selOrdNamSal);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM($data);
?>

<h3 class="fw-bold mt-5">Ограничение количества записей в SQL в PHP</h3>
<p>С помощью команды LIMIT мы можем ограничить количество строк в результате.</p>

<p class="fw-bold">Пример 1</p>
<p>Выберем первых двух юзеров:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users LIMIT 2";
		?></pre>
</code>
<p class="fw-bold">Пример 2</p>
<p>Выберем всех юзеров с зарплатой 500, а затем с помощью LIMIT возьмем только первых двух из выбранных:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users WHERE salary=500 LIMIT 2";
		?></pre>
</code>
<p class="fw-bold">Пример 3</p>
<p>С помощью LIMIT можно выбрать несколько строк из середины результата. В примере ниже мы выберем со второй строки (нумерация строк с нуля), 5 штук:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users LIMIT 1,5";
		?></pre>
</code>
<p class="fw-bold">Пример 4</p>
<p>Команду LIMIT можно комбинировать с ORDER BY. При этом сначала нужно писать команду сортировки, а потом - лимит. В следующем примере мы сначала отсортируем записи по возрастанию возраста, а потом возьмем первые 3 штуки:</p>
<code>
	<pre>
		&lt?php
		$query = "SELECT * FROM users ORDER BY age LIMIT 3";
		?></pre>
</code>

<h3 class="fw-bold mt-5">Практические задачи</h3>

<p class="fw-bold mt-5">Задача 1</p>
<p>Получите первых 4 юзера.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_selL4 = "select * from users limit 4";
	$res = mysqli_query($link, $query_selL4);
	for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
	getTableM($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_selL4 = "select * from users limit 4";
$res = mysqli_query($link, $query_selL4);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM($data);
?>

<p class="fw-bold mt-5">Задача 2</p>
<p>Получите юзеров со второго, 3 штуки.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_selL2from2 = "select * from users limit 1,3";
	$res = mysqli_query($link, $query_selL2from2);
	for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
	getTableM($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_selL2from2 = "select * from users limit 1,3";
$res = mysqli_query($link, $query_selL2from2);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM($data);
?>

<p class="fw-bold mt-5">Задача 3</p>
<p>Отсортируйте юзеров по возрастанию зарплаты и получите первых 3 работника из результата сортировки.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_selOrdSalL3 = "select * from users order by salary limit 3";
	$res = mysqli_query($link, $query_selOrdSalL3);
	for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
	getTableM($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_selOrdSalL3 = "select * from users order by salary limit 3";
$res = mysqli_query($link, $query_selOrdSalL3);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM($data);
?>

<p class="fw-bold mt-5">Задача 4</p>
<p>Отсортируйте юзеров по убыванию зарплаты и получите первых 3 юзера из результата сортировки.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_selOrdSalDL3 = "select * from users order by salary desc limit 3";
	$res = mysqli_query($link, $query_selOrdSalDL3);
	for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
	getTableM($data);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_selOrdSalDL3 = "select * from users order by salary desc limit 3";
$res = mysqli_query($link, $query_selOrdSalDL3);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM($data);
?>

<h3 class="fw-bold mt-5">Подсчет количества через SQL запрос в PHP</h3>
<p>С помощью команды COUNT можно подсчитать количество строк в выборке.<br />
	Давайте, например, подсчитаем всех юзеров в таблице:</p>
<code>
	<pre>
	&lt?php
	$query = "SELECT COUNT(*) FROM users";
	?></pre>
</code>
<p>А теперь подсчитаем всех, у кого зарплата равна 900:</p>
<code>
	<pre>
	&lt?php
	$query = "SELECT COUNT(*) FROM users WHERE salary=900";
	?></pre>
</code>

<h3 class="fw-bold mt-5">Получение количества в PHP</h3>
<p>Давайте посмотрим, как получить подсчитанное количество в нашем PHP скрипте, так как тут не все так просто.<br />
	Напишем код, подчитывающий количество юзеров:
</p>
<code>
	<pre>
	&lt?php
	$query = "SELECT COUNT(*) FROM users";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$data = mysqli_fetch_assoc($res);
	?></pre>
</code>
<p>В нашем случае получится, что количество попадет в переменную $data. Однако, эта переменная будет представлять собой массив следующего вида:</p>
<code>
	<pre>
	&lt?php
	var_dump($data); // ['COUNT(*)' => 6]
	?></pre>
</code>
<p>Для того, чтобы ключ в этом массиве был более красивый, можно переименовать наше поле в запросе с помощью команды as:</p>
<code>
	<pre>
	&lt?php
	$query = "SELECT COUNT(*) as count FROM users";
	?></pre>
</code>
<p>После такого переименования в переменной $data наше количество уже будет лежать в ключе 'count':</p>
<code>
	<pre>
	&lt?php
	var_dump($data); // ['count' => 6]
	?></pre>
</code>

<p class="fw-bold mt-5">Задача 1</p>
<p>Подсчитайте всех юзеров с зарплатой 300.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_CWsal400 = "select count(*) as count from users where salary = 400";
	$res = mysqli_query($link, $query_CWsal400);
	$data = mysqli_fetch_assoc($res);
	?>
&ltp>Кол-во сотрудников с заплатой 400: &lt?= $data['count'] ?>&lt/p></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_CWsal400 = "select count(*) as count from users where salary = 400";
$res = mysqli_query($link, $query_CWsal400);
$data = mysqli_fetch_assoc($res);
?>
<p>Кол-во сотрудников с заплатой 400: <?= $data['count'] ?></p>

<p class="fw-bold mt-5">Задача 2</p>
<p>Подсчитайте всех юзеров с зарплатой 400 или возрастом 23.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	$query_CWsal400orAge23 = "select count(*) as count from users where salary = 400 or age=23";
	$res = mysqli_query($link, $query_CWsal400orAge23);
	$data = mysqli_fetch_assoc($res);
	?>
<p>Кол-во сотрудников с заплатой 400 или возрастом 23 : &lt?= $data['count'] ?>&lt/p></p></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query_CWsal400orAge23 = "select count(*) as count from users where salary = 400 or age=23";
$res = mysqli_query($link, $query_CWsal400orAge23);
$data = mysqli_fetch_assoc($res);
?>
<p>Кол-во сотрудников с заплатой 400 или возрастом 23 : <?= $data['count'] ?></p>

<h3 class="fw-bold mt-5">Изучение продвинутых SQL запросов</h3>
<p>В предыдущих уроках вы изучили наиболее используемые команды. Конечно же, их намного больше и найти вы их можете в <a href="https://code.mu/ru/sql/manual/" target="_blank">справочнике SQL</a>. При изучении справочника особое внимание обратите на команды IN, MIN, MAX, GROUP BY, CONCAT, а также на функции для работы с датой.</p>
<!-- 
<p class="fw-bold mt-5">Задача 1</p>
<p>Пусть в корне вашего сайта лежит папка dir, а в ней какие-то текстовые файлы. Выведите на экран столбец имен этих файлов.</p>
<p class="fw-bold">Решение:</p>
<code>
<pre>
	&lt?php
	?></pre>
</code>
<p class="fw-bold">Результат:</p> 
<?php

?>
-->


<!-- 
<h3 class="fw-bold mt-5">Практические задачи</h3>
  -->