<h3 class="fw-bold mt-5">Протокол HTTP в PHP</h3>
<p>Предпологается что мы уже хорошо знаем базу протокола HTTP (Hyper Text Transport Protokol). Если это не так, то освежить и дополнить знания можно вот <a target="_blank" href="https://code.mu/ru/internet/protocol/http/">code.mu/HTTP</a></p>

<h3 class="fw-bold mt-5">Метод HTTP запроса в PHP</h3>
<p>В PHP можно определить HTTP метод, которым был осуществлен запрос. Для этого нужно прочитать следующее значение:</p>
<code>
	<pre>	&lt?php
		$method = $_SERVER['REQUEST_METHOD'];
		var_dump($method); // 'GET' или 'POST'
	 ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$method = $_SERVER['REQUEST_METHOD'];
var_dump($method);
?>
<p class="fw-bold mt-3">Задача</p>
<p>1) Сделайте страницу, на которую вы будете отправлять запрос либо методом GET, либо методом POST.<br />
	2) Сделайте так, чтобы ваша страница определяла, каким методом отправлен запрос и выводила информацию об этом.</p>
<p class="fw-bold">Решение:</p>
<p><i>Для оптимального решения этой задачи на понадобится немного JavaScrip что бы обработать выбор пользвателя на клиентской стороне перед отправкой формы.</i></p>
<code>
	<pre>	// file: index.php 
		&ltform action="http_prot/getMethod.php" id="form">
		&ltselect name="send_method" id="select">
			&ltoption value="GET" selected>GET&lt/option>
			&ltoption value="POST">POST&lt/option>
		&lt/select>
		&ltinput type="submit" id="sub">
	&lt/form>
	&ltscript>
		const subBtn = document.querySelector("#sub");
		const form = document.querySelector("#form");
		const select = document.querySelector("#select");
		subBtn.addEventListener('click', function sendData(event) {
			event.preventDefault();
			form.method = select.value;
			form.submit()
		});
	&lt/script>

	//file: /http_prot/getMethod.php
	&lt?php
	$method = $_SERVER['REQUEST_METHOD'];
	echo "&ltp>Метод запроса был $method&lt/p>";
	?>
	&ltbr/>
	&lta href="../index.php">Назад&lt/a></pre>
</code>
<p><i>С помощь JavaScrip мы отменяем действие по умолчанию при нажатии на кнопку "Отправить", затем подставляем в форму метод выбранныей пользователем. После отправляем форму.</i></p>
<p class="fw-bold">Результат:</p>

<form action="http_prot/getMethod.php" id="form">
	<select name="send_method" id="select">
		<option value="GET" selected>GET</option>
		<option value="POST">POST</option>
	</select>
	<input type="submit" id="sub">
</form>
<script>
	const subBtn = document.querySelector("#sub");
	const form = document.querySelector("#form");
	const select = document.querySelector("#select");
	subBtn.addEventListener('click', function sendData(event) {
		event.preventDefault();
		form.method = select.value;
		form.submit()
	});
</script>

<h3 class="fw-bold mt-5">HTTP заголовки запроса в PHP</h3>
<p>в PHP можно получить значения заголовков запроса. Они содержаться в суперглобальной переменной $_SERVER в виде массива. При этом ключ каждого заголовка запроса начинается на 'HTTP_', а далее идет имя этого заголовка заглавными буквами.</p>
<p>Давайте, например, получим содержимое заголовка Host:</p>
<code>
	<pre>
		&lt?php
		echo $_SERVER['HTTP_HOST'];
		?></pre>
</code>
<p>
	Если в имени заголовка есть дефисы, то в ключе PHP они превращаются в подчеркивания. Для примера, получим содержимое заголовка Accept-Encoding:
</p>
<code>
	<pre>
		&lt?php
		echo $_SERVER['HTTP_ACCEPT_ENCODING'];
		?></pre>
</code>

<p class="fw-bold mt-3">Задача 1</p>
<p>Получите значение заголовка Accept.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&ltp>&ltb>Содержимое заголовка ACCEPT:&lt/b> &lt?= $_SERVER['HTTP_ACCEPT'] ?>&lt/p></pre>
</code>
<p class="fw-bold">Результат:</p>
<p><b>Содержимое заголовка Accept:</b> <?= $_SERVER['HTTP_ACCEPT'] ?></p>

<p class="fw-bold mt-3">Задача 2</p>
<p>Получите значение заголовка Accept-Language.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&ltp>&ltb>Содержимое заголовка ACCEPT:&lt/b> &lt?= $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?>&lt/p></pre>
</code>
<p class="fw-bold">Результат:</p>
<p><b>Содержимое заголовка Accept-Language:</b> <?= $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?></p>

<p class="fw-bold mt-3">Задача 3</p>
<p>Выведите содержимое переменной $_SERVER через var_dump. Визуально, "на глаз", определите, какие значения являются заголовками, а какие - чем-то другим.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		&ltp>&lt?= var_dump($_SERVER) ?>&lt/p></pre>
</code>
<p class="fw-bold">Результат:</p>
<p><?= var_dump($_SERVER) ?></p>
<br />
<p><i>У массива $_SERVER всего 84 элемента. Первые 80 имеют тип <b>string</b>. Последние 4 параметра имеют типы: <b>float</b>, <b>int</b>, <b>array</b>, <b>int</b></i></p>
<h3 class="fw-bold mt-5">Массив заголовков HTTP запроса в PHP</h3>
<p>Можно получить все HTTP заголовки запроса в виде массива (работает не под всеми серверами). Это делается с помощью следующей функции:</p>
<code>
	<pre>
	&lt?php
		$arr = getallheaders();
		var_dump($arr);
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php var_dump(getallheaders()); ?>
<p class="fw-bold mt-3">Задача</p>
<p>Получите массив заголовков. Переберите этот массив циклом и выведите на экран имена заголовков и их значения.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php 
		$requestHeaders = getallheaders();
		echo "&ltol>";
		foreach ($requestHeaders as $headerKey => $headerValue) 
	:?>
		&ltli>&ltb>Заголовок запроса&lt/b>: &lt?= $headerKey ?> &ltb>Значение заголовока&lt/b>: &lt?= $headerValue ?>&lt/li>
	&lt?php endforeach ?>
	&lt/ol></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php $requestHeaders = getallheaders();
echo "<ol>";
foreach ($requestHeaders as $headerKey => $headerValue) : ?>
	<li><b>Заголовок запроса</b>: <?= $headerKey ?> <b>Значение заголовока</b>: <?= $headerValue ?></li>
<?php endforeach ?>
</ol>

<h3 class="fw-bold mt-5">Заголовки HTTP ответа в PHP</h3>
<p>С помощью PHP можно отправлять заголовки HTTP ответа в браузер. Это делается с помощью функции header:</p>
<code>
	<pre>
	&lt?php
	header('Content-Type: text/html');
	?></pre>
</code>

<p class="fw-bold mt-3">Задача</p>
<p>1) Установите заголовок Content-Type в значение 'text/plain'<br />
	2) Придумайте свой заголовок, начав его имя с буквы 'X'. Установите этот заголовок.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>//file: http_prot/setHeaders.php 
		&lt?php
		header('Content-type: text/html');
		header('X-Autor: Foxtail25');
		?>
	&ltp>Установленные заголовки можно посмотреть в DevTools браузера, на вкладке Network&lt/p>
	&ltbr/>
	&lta href="../index.php">назад</a>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="http_prot/setHeaders.php">Установка заголовков</a>

<h3 class="fw-bold mt-5">Проблема с заголовками HTTP ответа в PHP</h3>
<p>По правилам HTTP сначала отправляются HTTP заголовки, а потом тело HTTP ответа. Из-за этого работа с функцией header в PHP имеет свои особенности.
	<br />Дело в том, что если перед вызовом этой функции будет какой-то вывод на экран, он будет трактоваться как начало тела ответа. В этом случае вызов функции header приведет к предупреждению PHP с текстом headers already sent. При этом заголовки может даже и отправятся. Может даже и ошибка не выведется (зависит от настроек PHP). Но чаще всего это будет только на локалке, а при выкладке сайта в интернет все поломается.<br />Даже предупреждения PHP будут выводами на экран.<br />Разрывы PHP скобок также пораждают вывод на экран.
</p>
<p class="fw-bold mt-3">Задача 1</p>
<p class="fw-bold mt-3">Намеренно создайте вывод на экран перед функцией header. Изучите текст возникающей ошибки.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>&lt?php header('X-Autor: FoxTail25'); ?>
</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php header('X-Autor: FoxTail25'); ?>

<p class="fw-bold mt-3">Задача 2</p>
<p>Исправьте ошибку, допущенную в этом коде:</p>
<code>
	<pre>	&lt!DOCTYPE html>
	&lthtml>
		&lthead>
			&lt?php
			header('Content-Type: text/html');
			?>
		&lt/head>
		&ltbody>
			text
		&ltbody>
	&lthtml></pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
	<pre>	&lt?php
		header('Content-Type: text/html');
	?>
	&lt!DOCTYPE html>
	&lthtml>
		&lthead>
		&lt/head>
		&ltbody>
			text
		&ltbody>
	&lthtml></pre>
</code>

<h3 class="fw-bold mt-5">Проблема с заголовками HTTP при include в PHP</h3>
<p>Проблема с заголовками HTTP может также возникнуть при включениях файлов через include. Она проявится в том случае, когда после закрывающий скобки ?> поставлены пробелы или пустые строки, вот так:</p>
<code>
	<pre>//file.php
		&lt?php
		// some code
		?>
	</pre>
</code>
<p>В этом случае при инклуде нашего файла в другой файл оставленные пустые строки подействуют как вывод на экран:</p>
<code>
	<pre>//index.php
		&lt?php
		include 'file.php'; // внутри вывод на экран

		header('Content-Type: text/html');
		?>
	</pre>
</code>
<p>Для исправления проблемы лучше во всех PHP файлах удалять последний закрывающий ?>. Такой прием не ведет к ошибке PHP и при этом страхует нас от случайного добавления пустых строк. Давайте исправим наш файл:</p>

<code>
	<pre>
	&lt?php
		// some code
	</pre>
</code>

<h3 class="fw-bold mt-3">Задача</h3>
<p>Исправьте ошибки, допущенные в следующем коде:</p>
<pre>

	//file1.php
	&lt?php
		function func1()
		{
			echo '1';
		}
	?>

	//file2.php
	&lt?php
		function func2()
		{
			echo '2';
		}
	?>

	//index.php
	&lt?php
		include 'file1.php';
		include 'file2.php';
		header('Content-Type: text/html');
		header('X-Autor: FoxTail25');
	?>
</pre>

<p class="fw-bold">Решение:</p>
<p><i>У меня почему-то выше приведённое решение работает без ошибок. Возможно это из-за настроек сервера в OPS6.0</i> Предпологаю что решение должно быть таким:</p>
<code>
	<pre>
	//file1.php
	&lt?php
		function func1()
		{
			echo '1';
		}

	//file2.php
	&lt?php
		function func2()
		{
			echo '2';
		}

	//index.php
	&lt?php
		header('Content-Type: text/html');
		header('X-Autor: FoxTail25');
		include 'file1.php';
		include 'file2.php';
	?>
	</pre>
</code>
<p class="fw-bold" id="incl">Результат:</p>
<a href="http_prot/incl.php">test</a>

<h3 class="fw-bold mt-5">Отдача стартовой строки HTTP ответа в PHP</h3>
<p>С помощью функции header можно также отдавать стартовую строку HTTP ответа. Как правило это используется для того, чтобы указать статус. В основном для 404 ошибки:</p>
<code>
	<pre>
		&lt?php
		header('HTTP/1.1 404 Not Found');
		?></pre>
</code>
<p class="fw-bold mt-3">Допишите код так, чтобы отдавался заголовок 404 ошибки:</p>
<code>
	<pre>
		&lt?php
			$arr = ['a', 'b', 'c'];
			$key = $_GET['key'];

			if (isset($arr[$key])) {
				echo $arr[$key];
			} else {
				// отдать 404
				echo 'error';
			}
		?>
	</pre>
</code>
<p class="fw-bold">Решение:</p>
<p class="fw-bold" id="key">Результат:</p>
<form action="http_prot/404.php">
	<select name="key" id="">
		<option value="0">1</option>
		<option value="1">2</option>
		<option value="2">3</option>
		<option value="3">4</option>
	</select>
	<input type="submit">
</form>
<!-- <a href="http_prot/404.php?key=3">test</a> -->
<!-- 
    <p class="fw-bold mt-3">Задача</p>
    <p>Пусть в корне вашего сайта лежит папка dir, а в ней какие-то текстовые файлы. Выведите на экран столбец имен этих файлов.</p>
    <p class="fw-bold">Решение:</p>
    <p class="fw-bold">Результат:</p>

-->



<!-- 
<h3 class="fw-bold mt-5">Практические задачи</h3>
 -->

<?php
// $arr = ['a', 'b', 'c'];

// if (isset($_GET['key']) and in_array($_GET['key'], array_keys($arr))) {
// 	$key = $_GET['key'];
// 	echo $arr[$key];
// } else {
// 	header('HTTP/1.1 404 Not Found');
// 	echo"Нет такой страницы";
// }
