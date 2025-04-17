<p>Когда мы видим страницу сайта в своем браузере, PHP скрипт этой страницы уже давно отработал и забыл о нас. Поэтому, если мы переходим с одной страницы сайта на другую - PHP скрипт не может запомнить данные с предыдущей страницы, например, значения переменных. Однако, такой механизм очень нужен, хотя бы для того, чтобы запоминать выбор пользователя или то, что пользователь был авторизован. В PHP для хранения данных пользователя между страницами сайта предназначены сессии. Мы можем записывать какую-либо информацию в сессию и считывать ее оттуда в следующем запуске этого или другого скрипта сайта. С помощью сессии можно реализовать авторизацию пользователей, корзину интернет-магазина и другое. Сессия пользователя хранится на сервере. При этом она живет не вечно, а всего около получаса - если пользователь за это время не выполнил никаких обращений к сайту, то его сессия удалится и станет пустой. Итак, давайте посмотрим, как работать с сессиями на PHP. Чтобы записать что-то в сессию ее сначала нужно инициализировать с помощью функции <b>session_start</b>:
</p>

<code>
	<pre>
		&lt?php
		session_start();
		?></pre>
</code>
<p>После инициализации мы можем записать что-нибудь в сессию или прочитать что-нибудь оттуда. Это делается с помощью суперглобального массива $_SESSION. Давайте попробуем на практике. Сделаем файл test1.php и разместим в нем следующий код:</p>
<p>Ссылка на файл <a href="/session/sess_1.php">ссылка на файл /session/sess_1.php</a></p>
<code>
	<pre>
		file:/session/sess_1.php
		&lt?php
		session_start();
		$_SESSION['test'] = 'abcde'; // пишем в сессию
		?></pre>
</code>

<p>Теперь для начала откройте в браузере файл test1.php, а потом test2.php. При открытии второго файла в браузере выведется то, что было записано в сессию в первом файле.</p>

<p class="fw-bold mt-5">Задача</p>
<p>Сделайте два файла. При запуске первого файла запишите в сессию два числа, а при запуске второго файла - выведите на экран сумму этих чисел.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		file: /session/sess_1.php
		&lt?php
			$_SESSION['num1'] = 20; // пишем в сессию
			$_SESSION['num2'] = 40; // пишем в сессию
		?>

		file: /session/sess_2.php
		&lt?php
			$num1 = $_SESSION['num1']; // берем данные из сессии
			$num2 = $_SESSION['num2']; // берем данные из сессии
		echo $num1 + $num2;
		?></pre>
</code>
<p class="fw-bold">Результат:</p>
<p>Ссылка на файл <a href="/session/sess_1.php">ссылка на файл /session/sess_1.php</a></p>

<h3 class="fw-bold mt-5">Возможные проблемы при работе с сессиями в PHP</h3>
<p>Основная проблема при работе с сессией следующая: нельзя делать никакого вывода в браузер (из PHP) до окончания работы с сессиями, в противном случае вы увидите следующую ошибку: Warning: Cannot send session cookie - headers already sent.

	Что такое вывод в браузер? Это любой символ <b>перед</b> &lt?php, например, текст или тег, даже пробел, а также сообщение об ошибке со стороны PHP. Кроме того нельзя делать выводы через echo, var_dump и print_r.

	Кодировка вашего документа обязательно должна быть utf-8 без BOM. Если она будет просто utf-8, то <b>перед</b> &lt?php будет вставлен спец. символ, характерный для данной кодировки и сессии работать не будут.
</p>
<p><b>Опытным путём удалось установить. Что всё-таки можно добавлять тескет перед &lt?php, но не более 1525 символов между двумя тегами &ltp>&lt/p></b></p>

<h3 class="fw-bold mt-5">Использование сессий на одной странице в PHP</h3>
<p>В первом примере на сессии мы что-то записывали в сессию в одном файле, а прочитывали в другом. На самом деле это не обязательно - можно делать это и в одном файле. Например, можно сделать счетчик обновления страницы пользователем сайта. Для этого при первом заходе пользователя запишем в переменную сессии единицу, а при всех последующих заходах будем увеличивать эту переменную на один:
</p>
<code>
	<pre>
	&lt?php
	session_start();

	if (!isset($_SESSION['counter'])) {
		$_SESSION['counter'] = 1; // первый заход на страницу
	} else {
		$_SESSION['counter']++;   // последующие заходы
	}

	echo $_SESSION['counter'];
	?>
</pre>
</code>

<p class="fw-bold mt-5">Задача</p>
<p>Запишите в сессию время захода пользователя на сайт. При обновлении страницы выводите сколько секунд назад пользователь зашел на сайт.</p>
<p class="fw-bold"><a href="/session/s3.php">Решение:</a></p>


<h3 class="fw-bold mt-5">Удаление сессий в PHP</h3>
<p>Иногда нам может понадобится удалить какую нибудь переменную сессии, не затрагивая остальных. Это делается с помощью функции <b>unset:</b></p>
<code>
	<pre>
&lt?php
unset($_SESSION['var']);
?></pre>
</code>
<p>После выполнения такого кода наша переменная станет null:</p>
<code>
	<pre>
&lt?php
var_dump($_SESSION['var'); // выведет null
?></pre>
</code>

<p class="fw-bold mt-5">Задача</p>
<p>Модифицируйте предыдущее решение так, чтобы при достижении счетчиком значения 10, отсчет начинался сначала.</p>
<p class="fw-bold"><a href="/session/s3.php">Решение:</a></p>


<h3 class="fw-bold mt-5">Завершение всей сессии в PHP</h3>
<p>Если же вам нужно удалить все переменные сессии для данного пользователя, то следует воспользоваться функцией <b>session_destroy:</b></p>
<p><b>Учнение, что эту функцию можно вызывать только тогда, когда сессия запущена через session_start.</b></p>
<code>
	<pre>
		&lt?php
		session_destroy();
		?></pre>
</code>

<p class="fw-bold mt-5">Задача</p>
<p>Сделайте страницу logout.php, при заходе на которую будет завершаться сессия пользователя.</p>
<p class="fw-bold"><a href="/session/s3.php">Решение:</a></p>

<h3 class="fw-bold mt-5">Сессии и формы в PHP</h3>
<p>Пусть у нас есть два PHP файла. Давайте в файле test1.php разместим форму, спрашивающую у пользователя два числа:</p>
<code>
	<pre>
		file: /session/sess_form_1.php
	&ltform method="GET">
		&ltinput name="num1">
		&ltinput name="num2">
		&ltinput type="submit">
	&lt/form></pre>
</code>
<p>В этом же файле разместим код обработки формы. В этом коде мы запишем данные инпутов в сессию:</p>
<code>
	<pre>
	&lt?php
		file: /session/sess_form_1.php
		session_start();
		
		if (!empty($_GET)) {
			$_SESSION['num1'] = $_GET['num1'];
			$_SESSION['num2'] = $_GET['num2'];
		}
	?></pre>
</code>
<p>Важный нюанс: в файле код обработки формы должен стоять до самой формы. Почему: потому что в этом коде мы работаем с сессией, а значит не должно быть никакого вывода на экран до этого.</p>
<p>Давайте теперь в файле test2.php найдем сумму чисел, сохраненных в сессии:</p>
<code>
	<pre>
	file: /session/sess_form_2.php
	&lt?php
		if (!empty($_SESSION)) {
			echo $_SESSION['num1'] + $_SESSION['num2'];
		}
	?></pre>
</code>
<p>В какой последовательности это все должно работать? Сначала пользователь заходит на страницу test1.php, заполняет форму и жмет на кнопку. После этого он опять попадает на test1.php, но уже с отправленными данными формы. При этом он попадает в условие, в котором мы пишем данные формы в сессию.
<br/>
Затем пользователь должен вручную зайти на страницу test2.php - и там он увидит сумму введенных чисел.
<br/>
Вы можете спросить: зачем так мудрить? Ведь можно было сразу отправить форму на страницу test2.php. Дело в том, что в данном случае удобство в том, что сама форма и код ее обработки размещаются на одной странице. Такое, конечно же, удобно не всегда, но иногда бывает нужно.</p>

<p class="fw-bold mt-5">Задача</p>
<p>На одной странице с помощью формы спросите у пользователя фамилию, имя и возраст. Запишите эти данные в сессию. При заходе на другую страницу выведите эти данные на экран.</p>
<p class="fw-bold"><a href="/session/sess_form_1.php">Решение</a></p>
