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
<code>
	<pre>
	//file: redirect/redir.php
	&lt?php
	$addr = 'redir2.php';
	header("Location: $addr")
	?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="redirect/redir.php">test</a>

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

<p class="fw-bold mt-3">Задача</p>
<p>Воспроизведите какой-нибудь паразитный эффект в вашем коде. Затем исправьте его с помощью функции die.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	//file: redirect/redir3.php
	&lt?php
if(!isset($_GET['test'])){
header('Location: redir4.php');
die();
} 
file_put_contents('111.txt', '11111111');

?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="redirect/redir3.php">go to redir3</a>


<h3 class="fw-bold mt-5">GET запросы и редирект в PHP</h3>
<p>При редиректе можно так же передавать GET параметры</p>

<code>
	<pre>
		&lt?php
			header('Location: test.php?arg=1')
		?>
	</pre>
</code>

<p class="fw-bold mt-3">Задача</p>
<p>Пусть на странице index.php можно передать GET параметр с именем success. Сделайте так, чтобы при наличии такого параметра, на страницу выводилось сообщение об успехе операции.</p>
<p>Сделайте теперь страницу redir5.php. Пусть при заходе на эту страницу выполняется редирект на страницу index.php из предыдущей задачи. При редиректе передайте в GET параметре success значение 1.</p>
<p class="fw-bold">Решение:</p>

<code>
	<pre>
		// index.php
	&lt?php if(isset($_GET['success'])){?>
	&ltdiv style="border: 1px solid black; padding: 10px; text-align:center; margin:5px;">
		Успех!
	&lt/div>
	&lt?php } ?>
	&lta href="redirect/redir5.php?yes=1">yes&lt/a>
	&lta href="redirect/redir5.php">no&lt/a>

		//redir5.php
	&lt?php
	if(isset($_GET['yes'])){
		header('Location:../index.php?success="yes"#redir_5');
		die();
	} else {
		header('Location:../index.php#redir_5');
	}
	?></pre>
</code>

<p class="fw-bold" id="redir_5">Результат:</p>
<?php if (isset($_GET['success'])) { ?>
	<div style="border: 1px solid black; padding: 10px; text-align:center; margin:5px;">
		Успех!
	</div>
<?php } ?>


<a href="redirect/redir5.php?yes=1">yes</a>
<a href="redirect/redir5.php">no</a>


<h3 class="fw-bold mt-5">Саморедирект с добавлением параметров в PHP</h3>
<p>Пусть на странице index.php передается GET параметр с именем arg. Выведем его содержимое на экран:</p>
<code>
	<pre>
		//index.php

		&lt?php
		echo $_GET['arg'];
		?>
	</pre>
</code>

<p>Пусть наша страница без GET параметра не может работать корректно. В нашем случае это действительно так, так как, если параметр не передан, то обращение к $_GET['arg'] приведет к ошибке.<br />
	Может возникнуть вопрос, почему вообще человек попадет на нашу страницу без параметра? Ведь мы можем везде на нашем сайте ставить ссылки с этим параметром. Однако, это не гарантия: юзер нашего сайта может, к примеру, копировать откуда-нибудь ссылку и потерять при этом параметр. Либо просто случайно его удалить, редактируя адресную строку.<br />
	В общем, в любом случае наш код должен предполагать такую ситуацию и что-то с ней сделать. Что же можно сделать?<br />
	Можно проверять наш GET параметр на существование и выводить его, только если он существует:</p>
<code>
	<pre>
		//index.php
		&lt?php
		if (isset($_GET['arg'])) {
			echo $_GET['arg'];
		} else {
			// как-то реагируем, например, сообщением
		}
		?>
	</pre>
</code>
<p>Можно поступить хитрее:</p>
<code>
	<pre>
		//index.php
		&lt?php
		if (!isset($_GET['arg'])) {
		$_GET['arg'] = 'default'; // значение по умолчанию
		}
		
		echo $_GET['arg']; // гарантировано что-то выведет без ошибки
		?>
	</pre>
</code>
<p>А можно сделать так, чтобы при заходе на страницу без параметра происходил редирект на эту же страницу с параметром:</p>
<code>
	<pre>
		//index.php
		&lt?php
			if (!isset($_GET['arg'])) {
			header('Location: ?arg=default');
		}
		echo $_GET['arg']; // параметр гарантированно есть
		?>
	</pre>
</code>

<p class="fw-bold mt-3" id="redir_6">Задача</p>
<p>Пусть на странице redir_6.php можно передать число с помощью GET параметра с именем num. Сделайте так, чтобы при заходе без данного параметра, автоматически выполнялся редирект на эту же страницу, но с параметром num в значении 1.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		//index.php
		&ltform action="redirect/redir_6.php" method="get">
		введите число:
		&ltinput type="number" name="num">
		&ltinput type="submit">
		&lt/form>
		
		// redir_6.php
		&lt?php
		if($_GET['num'] == "" or !isset($_GET['num'])){
			header('Location: ?num=1&def=true');
			die();
		}
		?>
		&lt?php
		if(isset($_GET['def'])):?>
		&ltp>Число не было передано, по этому по умолчанию установленно число 1&lt/p>
		&lt?php endif?>
		&ltdiv>Передано число: &lt?=$_GET['num']?>&lt/div>
		&lta href="../index.php#redir_6">Назад&lt/a>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="redirect/redir_6.php" method="get">
введите число:
	<input type="number" name="num">
	<input type="submit">
</form>

<h3 class="fw-bold mt-5">Флеш сообщения в PHP</h3>
<p>
Иногда при редиректе нужно передать некоторую информацию с одной страницы на другую. Например, чтобы вывести на целевой странице какое-нибудь текст для пользователя

Такие сообщения называются флеш (flash) сообщениями. Такое название выбрано потому, что сообщение должно показаться только один раз, а при обновлении страницы исчезнуть.

Давайте реализуем описанное. Пусть на странице page.php мы записываем в сессию некоторое сообщение и выполняем редирект на другую страницу:
</p>
<code>
	<pre>
		//page.php
		
		&lt?php
		session_start();
		
		$_SESSION['flash'] = 'сообщение';
		header('Location: index.php');
		die();
		?></pre>
</code>
<p>
	На странице index.php выведем сообщение и удалим его из сессии во избежание повторного показа:
</p>
<code>
	<pre>
		//index.php
			
		&lt?php
		session_start();
		
		if (isset($_SESSION['flash'])) {
			echo $_SESSION['flash'];
			unset($_SESSION['flash']);
		}
		?>
	</pre>
</code>
<p class="fw-bold mt-3">Задача</p>
<p>Реализуйте описанные флеш сообщения. Проверьте их работу.</p>
<p class="fw-bold">Решение:</p>
<p class="fw-bold">Результат:</p>
<!-- 
    <p class="fw-bold mt-3">Задача</p>
    <p></p>
    <p class="fw-bold">Решение:</p>
    <p class="fw-bold">Результат:</p>

-->

<!-- 
<h3 class="fw-bold mt-5">Практические задачи</h3>
 -->