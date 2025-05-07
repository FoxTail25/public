<h3 class="fw-bold mt-5">Введение в редиректы PHP</h3>
<p>С помощью функции header можно перенаправить браузер с одной страницы на другую. Для этого нужно передать в ней HTTP заголовок Location:</p>
<code>
	<pre>	&lt?php
		header('Location: test.php');
	?></pre>
</code>
<p>Адрес целевой страницы может хранится и в переменной:</p>
<code>
	<pre>	&lt?php
		$addr = 'test.php';
		header('Location: ' . $addr);
	?></pre>
</code>
<p>Вместо конкатенации можно использовать вставку переменных:</p>
<code>
	<pre>	&lt?php
		$addr = 'test.php';
		header("Location: $addr");
	?></pre>
</code>

<p class="fw-bold mt-3" id="redir">Задача</p>
<p>При заходе на страницу index.php выполните редирект на страницу page.php.</p>
<p class="fw-bold">Решение:</p>
<p class="fw-bold">Результат:</p>
<a href="http_prot/redir.php">test</a>

<h3 class="fw-bold mt-5">Мгновенные редирект в PHP</h3>
<p>Редирект, выполненный с помощью функции header не происходит в момент вызова этой функции. Ведь PHP сам не выполняет редирект, а только отправляет соответствующий HTTP заголовок в браузер.<br />Это значит, что редирект произойдет только тогда, когда PHP выполнит весь скрипт до конца. Из-за этого могут происходить всякие паразитные эффекты.<br />Для примера, в следующем коде мы хотим выполнить или редирект, или запрос к базе. Но запрос к базе выполнится даже если была команда на редирект:</p>
<code>
	<pre>
		&lt?php
		if ($_GET['test']) {
			header('Location: test.php');
		}

		$query = "UPDATE users SET changed=1 WHERE id=1";
		mysqli_query($link, $query); // выполнится даже при редиректе!
		?></pre>
</code>
<p>Для избежания подобных проблем нужно сразу после редиректа вызвать функцию die, которая мгновенно завершит выполнение скрипта и редирект произойдет сразу же:</p>
<code>
	<pre>
		&lt?php
		if ($_GET['test']) {
			header('Location: test.php');
			die();
		}

		$query = "UPDATE users SET changed=1 WHERE id=1";
		mysqli_query($link, $query);
		?></pre>
</code>