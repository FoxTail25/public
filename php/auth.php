<?php
session_start();
?>
<p>
	Аутентификация - это процесс определения пользователя сайтом. Для этого пользователь обычно должен вбить свой логин и пароль. После этого наш сайт выполняет авторизацию этого пользователя, то есть наделяет его определенными правами на совершение операций.<br />
	Конечно же, изначально этот пользователь должен пройти регистрацию на этом самом сайте: придумать себе логин (то есть имя на сайте), причем так, чтобы это имя было не занято, и пароль.<br />
	Обычно логин - это открытая информация, которая видна всем посетителям сайта. Ну, а пароль - закрытая информация, чтобы только владелец данного логина мог получить доступ к своим данным, или другими словами - к своему аккаунту на сайте.<br />
	В следующих уроках мы будем разбираться, как реализуется авторизация и регистрация пользователей в PHP.
</p>

<h3 class="fw-bold mt-5">Простая авторизация через базу данных на PHP</h3>
<p>Давайте реализуем самую простую авторизацию на базе данных, пока без регистрации. Вместо регистрации пользователей, мы просто вобьем их логины и пароли в таблицу в базе данных:</p>
<?php include('css/table-style.php') ?>
<table>
	<caption><b>users</b></caption>
	<tbody>
		<tr>
			<th>id</th>
			<th>login</th>
			<th>password</th>
		</tr>
		<tr>
			<td>1</td>
			<td>user</td>
			<td>12345</td>
		</tr>
		<tr>
			<td>2</td>
			<td>admin</td>
			<td>123</td>
		</tr>
	</tbody>
</table>

<p>Сделаем теперь форму, в которую будут вбиваться логин и пароль:</p>
<code>
	<pre>
		//login.php

	&ltform action="" method="POST">
		&ltinput name="login">
		&ltinput name="password" type="password">
		&ltinput type="submit">
	&lt/form>
	</pre>
</code>
<p>
	Напишем теперь код, который будет проверять, отправлена ли форма и, если отправлена, то проверять, есть ли в базе данных пользователь с таким логином и паролем:
</p>
<code>
	<pre>
		//login.php

	&lt?php
		if (!empty($_POST['password']) and !empty($_POST['login'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];

			$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
			$res = mysqli_query($link, $query);
			$user = mysqli_fetch_assoc($res);

			if (!empty($user)) {
				// прошел авторизацию
			} else {
				// неверно ввел логин или пароль
			}
		}
	?>
	</pre>
</code>

<p class="fw-bold mt-3" id="auth_1_1">Задача 1</p>
<p>
	Реализуйте описанную выше авторизацию. Сделайте так, чтобы, если пользователь прошел авторизацию - выводилось сообщение об этом, а если не прошел - то сообщение о том, что введенный логин или пароль вбиты не правильно.
</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		//php_tasks/auth_1_1.php

	&ltform style="display: grid; width:200px;" method="POST">
		login
		&ltinput type="text" name="login">
		password
		&ltinput type="password" name="password">
		&ltinput type="submit">
	&lt/form>

	&lt?php
	if (!empty($_POST['login']) and !empty($_POST['password'])) {
		require '../db/connect.php'; // импортируем $db_pract_link
		$login = $_POST['login'];
		$password = $_POST['password'];
		$query = "SELECT * FROM user_auth WHERE login='$login' AND password='$password'";
		$res = mysqli_query($db_pract_link, $query);

		$user = mysqli_fetch_assoc($res);
	}
	?>
	&lt?php if (!empty($user)): ?>
		&ltp>auth success&lt/p>
	&lt?php else: ?>
		&ltp>Логин или пароль вбиты не правильно&lt/p>
	&lt?php endif; ?>

	&ltbr />
	&lta href="../index.php#auth_1_1">Назад&lt/a>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="php_tasks/auth_1_1.php">Реализация</a>

<p class="fw-bold mt-3" id="auth_1_2">Задача 2</p>
<p>Модифицируйте код так, чтобы в случае успешной авторизации форма для ввода пароля и логина не показывалась на экране.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		//file: php_tasks/auth_1_2.php
	&lt?php
	if (!empty($_POST['login']) and !empty($_POST['password'])) {
		require '../db/connect.php'; // импортируем $db_pract_link
		$login = $_POST['login'];
		$password = $_POST['password'];
		$query = "SELECT * FROM user_auth WHERE login='$login' AND password='$password'";
		$res = mysqli_query($db_pract_link, $query);

		$user = mysqli_fetch_assoc($res);
	}
	?>

	&lt?php
	if (empty($_POST)) : ?>

		&ltp>Введите логин и пароль&lt/p>

		&ltform style="display: grid; width:200px;" method="POST">
			login
			&ltinput type="text" name="login">
			password
			&ltinput type="password" name="password">
			&ltinput type="submit">
		&lt/form>

	&lt?php else : ?>
		&lt?php if (!empty($user)): ?>
			&ltp>Auth success&lt/p>
			&lta href="javascript:history.back()">попробовать заново&lt/a>
		&lt?php else: ?>
			&ltp>Логин или пароль введены не правильно&lt/p>
			&lta href="javascript:history.back()">попробовать заново&lt/a>
		&lt?php endif; ?>

	&lt?php endif; ?>
	&ltbr/>
	&ltbr/>
	&lta href="../index.php#auth_1_2">назад&lt/a>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="php_tasks/auth_1_2.php">Реализация</a>

<p class="fw-bold mt-3" id="auth_1_3">Задача 3</p>
<p>Модифицируйте код так, чтобы в случае успешной авторизации происходил редирект на страницу index.php.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		//file: php_tasks/auth_1_3.php
	&lt?php
	if (!empty($_POST['login']) and !empty($_POST['password'])) {
		require '../db/connect.php'; // импортируем $db_pract_link
		$login = $_POST['login'];
		$password = $_POST['password'];
		$query = "SELECT * FROM user_auth WHERE login='$login' AND password='$password'";
		$res = mysqli_query($db_pract_link, $query);

		$user = mysqli_fetch_assoc($res);
	}
	?>

	&lt?php
	if (empty($_POST)) : ?>

	&ltp>Введите логин и пароль&lt/p>

	&ltform style="display: grid; width:200px;" method="POST">
		login
		&ltinput type="text" name="login">
		password
		&ltinput type="password" name="password">
		&ltinput type="submit">
	&lt/form>

	&lt?php else : ?>
		&lt?php if (!empty($user)): header('location:../index.php'); die();?>
			
		&lt?php else: ?>
			&ltp>Логин или пароль введены не правильно&lt/p>
			&lta href="javascript:history.back()">попробовать заново&lt/a>
		&lt?php endif; ?>

	&lt?php endif; ?>
	&ltbr/>
	&ltbr/>
	&lta href="../index.php#auth_1_3">назад&lt/a>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="php_tasks/auth_1_3.php">Реализация</a>

<p class="fw-bold mt-3" id="auth_1_4">Задача 4</p>
<p>Модифицируйте код так, чтобы на странице index.php выводилось сообщение об успешной авторизации. Решите задачу через флеш-сообщения на сессиях.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		//index.php
	&lt?php
	if (!isset($_SESSION['auth']) or $_SESSION['auth'] == false): ?>
		&ltp>Вы не аторизованы&lt/p>
	&lt?php else : ?>
		&ltp>Добро пожаловать&lt/p>
	&lt?php endif; ?>

		//auth_1_4.php
	&lt?php
	session_start();
	$_SESSION['auth'] = false;

	if (!empty($_POST['login']) and !empty($_POST['password'])) {
		require '../db/connect.php'; // импортируем $db_pract_link
		$login = $_POST['login'];
		$password = $_POST['password'];
		$query = "SELECT * FROM user_auth WHERE login='$login' AND password='$password'";
		$res = mysqli_query($db_pract_link, $query);

		$user = mysqli_fetch_assoc($res);
	}
	?>

	&lt?php
	if (empty($_POST)) : ?>

		&ltp>Введите логин и пароль&lt/p>

		&ltform style="display: grid; width:200px;" method="POST">
			login
			&ltinput type="text" name="login">
			password
			&ltinput type="password" name="password">
			&ltinput type="submit">
		&lt/form>

	&lt?php else : ?>
		&lt?php if (!empty($user)):
			$_SESSION['auth'] = true;
			header('location:../index.php#auth_1_4');
			die(); ?>
			
		&lt?php else: ?>
			&ltp>Логин или пароль введены не правильно&lt/p>
			&lta href="javascript:history.back()">попробовать заново&lt/a>
		&lt?php endif; ?>

	&lt?php endif; ?>
	&ltbr/>
	&ltbr/>
	&lta href="../index.php#auth_1_4">назад&lt/a>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
if (!isset($_SESSION['auth']) or $_SESSION['auth'] == false): ?>
	<p>Вы не аторизованы</p>
<?php else : ?>
	<p>Добро пожаловать</p>
<?php endif; ?>

<a href="php_tasks/auth_1_4.php">Реализация</a>


<h3 class="fw-bold mt-5">Авторизация через сессию на PHP</h3>

<p>
	Наша авторизация должна работать так: пользователь, который хочет авторизоваться на сайте, заходит на страницу login.php, вбивает правильные логин и пароль и далее ходит по страницам сайта уже будучи авторизованным.<br />
	Чтобы другие страницы сайта знали о том, что наш пользователь авторизован, мы должны хранить в сессии пометку об этом.<br />
	Пока наша авторизация не совсем рабочая, так как сессию мы еще не подключили и другие страницы сайта не могут понять, авторизован пользователь или нет.<br />
	Будем хранить пометку об авторизации в переменной сессии $_SESSION['auth'] - если там записано true, то пользователь авторизован, а если null - то не авторизован.<br />
	Давайте внесем соответствующую правку в наш код:
</p>
<code>
	<pre>
	&lt?php
		session_start();
		
		if (!empty($_POST['password']) and !empty($_POST['login'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
			$res = mysqli_query($link, $query);
			$user = mysqli_fetch_assoc($res);
			
			if (!empty($user)) {
				$_SESSION['auth'] = true;
			} else {
				// неверно ввел логин или пароль
			}
		}
	?>
	</pre>
</code>
<p>
	Теперь на любой странице сайта мы можем проверить, авторизован пользователь или нет, вот таким образом:
</p>

<code>
	<pre>
	&lt?php
		if (!empty($_SESSION['auth'])) {
			
		}
	?>
	</pre>
</code>

<p>
	Можно закрыть текст какой-нибудь страницы целиком для неавторизованного пользователя:
</p>
<code>
	<pre>
	&lt?php if (!empty($_SESSION['auth'])): ?>
		&lt!DOCTYPE html>
		&lthtml>
			&lthead>
				
			&lt/head>
			&ltbody>
				&ltp>текст только для авторизованного пользователя&lt/p>
			&lt/body>
		&lt/html>
	&lt?php else: ?>
		&ltp>пожалуйста, авторизуйтесь&lt/p>
	&lt?php endif; ?>
	</pre>
</code>

<p>Можно закрыть только часть страницы:</p>

<code>
	<pre>
	&lt!DOCTYPE html>
	&lthtml>
		&lthead>
			
		&lt/head>
		&ltbody>
			&ltp>текст для любого пользователя&lt/p>
			&lt?php
			if (!empty($_SESSION['auth'])) {
				echo 'текст только для авторизованного пользователя';
			}
			?>
			&ltp>текст для любого пользователя&lt/p>
		&lt/body>
	&lt/html>
	</pre>
</code>

<p class="fw-bold mt-3" id="auth_2_1">Задача 1</p>
<p>Пусть на нашем сайте, кроме страницы login.php, есть еще и страницы 1.php, 2.php и 3.php. Сделайте так, чтобы к этим страницам мог получить доступ только авторизованный пользователь.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		//index.php
	&lt?php if (!isset($_SESSION['auth_2_1']) or $_SESSION['auth_2_1'] == false) : ?>
		&ltp>Просмотр страниц доступен только авторизированным пользователям 
			&lta href="php_tasks/auth_2_1.php">Авторизация&lt/a>
		&lt/p>	
	&lt?php else: ?>
		&ltp>Добро пожаловать 
			&lta href="php_tasks/logoff.php">log off&lt/a>
		&lt/p>
		&lta href="php_tasks/auth_2_pages/page_1.php">page_1&lt/a> &ltbr />
		&lta href="php_tasks/auth_2_pages/page_2.php">page_2&lt/a> &ltbr />
		&lta href="php_tasks/auth_2_pages/page_3.php">page_3&lt/a> &ltbr />
	&lt?php endif; ?>


		//auth_2_1.php
	&lt?php
	session_start();
	$_SESSION['auth'] = false;
	if (!empty($_POST['login']) and !empty($_POST['password'])) {
		require '../db/connect.php'; // импортируем $db_pract_link
		$login = $_POST['login'];
		$password = $_POST['password'];
		$query = "SELECT * FROM user_auth WHERE login='$login' AND password='$password'";
		$res = mysqli_query($db_pract_link, $query);
		$user = mysqli_fetch_assoc($res);
	}
	?>
	&lt?php
	if (empty($_POST)) : ?>
		&ltp>Введите логин и пароль&lt/p>
		&ltform style="display: grid; width:200px;" method="POST">
			login
			&ltinput type="text" name="login">
			password
			&ltinput type="password" name="password">
			&ltinput type="submit">
		&lt/form>
	&lt?php else : ?>
		&lt?php if (!empty($user)):
			$_SESSION['auth_2_1'] = true;
			header('location:../index.php#auth_2_1');
			die(); ?>
		&lt?php else: ?>
			&ltp>Логин или пароль введены не правильно&lt/p>
			&lta href="javascript:history.back()">попробовать заново&lt/a>
		&lt?php endif; ?>
	&lt?php endif; ?>
	&ltbr />
	&ltbr />
	&lta href="../index.php#auth_2_1">назад&lt/a>


		//php_tasks/auth_2_pages/page_*.php
	&lt?php
	session_start();
	if (!isset($_SESSION['auth_2_1']) or $_SESSION['auth_2_1'] == false): ?>
		&ltp>Страница доступна только авторизированным пользователям&lt/p>
		&lta href="../auth_2_1.php">Авторизация&lt/a>
		&lta href="../../index.php#auth_2_1">Вернуться на главную&lt/a>
	&lt?php else : ?>
		&ltp>Страница 1&lt/p>
		&lta href="../../index.php#auth_2_1">Вернуться на главную&lt/a>
	&lt?php endif; ?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
if (!isset($_SESSION['auth_2_1']) or $_SESSION['auth_2_1'] == false) : ?>
	<p>Просмотр страниц доступен только авторизированным пользователям
		<a href="php_tasks/auth_2_1.php">Авторизация</a>
	</p>
<?php else: ?>
	<p>Добро пожаловать
		<a href="php_tasks/logoff.php">log off</a>
	</p>
	<a href="php_tasks/auth_2_pages/page_1.php">page_1</a> <br />
	<a href="php_tasks/auth_2_pages/page_2.php">page_2</a> <br />
	<a href="php_tasks/auth_2_pages/page_3.php">page_3</a> <br />

<?php endif; ?>

<p class="fw-bold mt-3">Задача 2</p>
<p>Пусть на нашем сайте есть еще и страница index.php. Сделайте так, чтобы часть этой страницы была открыта для всех пользователей, а часть - только для авторизованных.</p>
<p class="fw-bold">Решение:</p>
<p>Для решения, достаточно взять предыдущий вариант и немного доработать код на странице index.php:</p>
<code>
	<pre>
		//index.php


	&ltp>Рады видеть вас на нашем сайте!&lt/p> // добавив эту строку к предыдущему коду - мы решим задачу.
	&lt?php
	if (!isset($_SESSION['auth_2_1']) or $_SESSION['auth_2_1'] == false) : ?>
		&ltp>Просмотр страниц доступен только авторизированным пользователям
			&lta href="php_tasks/auth_2_1.php">Авторизация&lt/a>
		&lt/p>
	&lt?php else: ?>
		&ltp>Добро пожаловать
			&lta href="php_tasks/logoff.php">log off&lt/a>
		&lt/p>
		&lta href="php_tasks/auth_2_pages/page_1.php">page_1&lt/a> &ltbr />
		&lta href="php_tasks/auth_2_pages/page_2.php">page_2&lt/a> &ltbr />
		&lta href="php_tasks/auth_2_pages/page_3.php">page_3&lt/a> &ltbr />
	&lt?php endif; ?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<p>Рады видеть вас на нашем сайте!</p>
<?php
if (!isset($_SESSION['auth_2_1']) or $_SESSION['auth_2_1'] == false) : ?>
	<p>Просмотр страниц доступен только авторизированным пользователям
		<a href="php_tasks/auth_2_1.php">Авторизация</a>
	</p>
<?php else: ?>
	<p>Добро пожаловать
		<a href="php_tasks/logoff.php?auth=2_1">log off</a>
	</p>
	<a href="php_tasks/auth_2_pages/page_1.php">page_1</a> <br />
	<a href="php_tasks/auth_2_pages/page_2.php">page_2</a> <br />
	<a href="php_tasks/auth_2_pages/page_3.php">page_3</a> <br />

<?php endif; ?>

<p class="fw-bold mt-3">Задача 3 и 4</p>
<p>Модифицируйте ваш код так, чтобы при успешной авторизации в сессию записывался также логин пользователя.</p>
<p>Сделайте так, чтобы при заходе на любую страницу сайта, авторизованный пользователь видел свой логин, а не авторизованный - ссылку на страницу авторизации.</p>
<p class="fw-bold">Решение:</p>
<p>Для решения этих задач нам нужно будет более серёзно модифицировать код:</p>
<code>
	<pre>
		//index.php
	&ltp>Рады видеть вас на нашем сайте
		&lt?php // В сесси теперь лежит массив! 
				//По ключу 'auth' - находится результат авторизации. 
				//По ключу 'name' - находится login пользователя.
		if (!isset($_SESSION['auth_2_3']['auth']) or $_SESSION['auth_2_3']['auth'] == false) : ?>
			Неизвестный!
		&lt?php else : echo ($_SESSION['auth_2_3']['name']) . '!'; ?>
		&lt?php endif; ?>
	&lt/p>
	&lt?php
	if (!isset($_SESSION['auth_2_3']['auth']) or $_SESSION['auth_2_3']['auth'] == false) : ?>
		&ltp>Просмотр страниц доступен только авторизированным пользователям
			&lta href="php_tasks/auth_2_3.php">Авторизация&lt/a>
		&lt/p>
		&ltp>
			&lta href="php_tasks/auth_2_3_pages/page_1.php">page_1&lt/a> &ltbr />
			&lta href="php_tasks/auth_2_3_pages/page_2.php">page_2&lt/a> &ltbr />
			&lta href="php_tasks/auth_2_3_pages/page_3.php">page_3&lt/a> &ltbr />
		&lt/p>
	&lt?php else: ?>
		&lta href="php_tasks/auth_2_3_pages/page_1.php">page_1&lt/a> &ltbr />
		&lta href="php_tasks/auth_2_3_pages/page_2.php">page_2&lt/a> &ltbr />
		&lta href="php_tasks/auth_2_3_pages/page_3.php">page_3&lt/a> &ltbr />
		&ltbr />
		&ltp>
			&lta href="php_tasks/logoff.php">log off&lt/a>
		&lt/p>
	&lt?php endif; ?>

		//auth_2_3.php
		&lt?php
			session_start();
			$_SESSION['auth_2_3']['auth'] = false;

			if (!empty($_POST['login']) and !empty($_POST['password'])) {
				require '../db/connect.php'; // импортируем $db_pract_link
				$login = $_POST['login'];
				$password = $_POST['password'];
				$query = "SELECT * FROM user_auth WHERE login='$login' AND password='$password'";
				$res = mysqli_query($db_pract_link, $query);

				$user = mysqli_fetch_assoc($res);
			}
		?>
		&lt?php
		if (empty($_POST)) : ?>
			&ltp>Введите логин и пароль&lt/p>
			&ltform style="display: grid; width:200px;" method="POST">
				login
				&ltinput type="text" name="login">
				password
				&ltinput type="password" name="password">
				&ltinput type="submit">
			&lt/form>
		&lt?php else : ?>
			&lt?php if (!empty($user)):
				$_SESSION['auth_2_3'] = ['auth' => true, 'name' => $user['login']];
				header('location:../index.php#auth_2_3');
				die(); ?>
			&lt?php else: ?>
				&ltp>Логин или пароль введены не правильно&lt/p>
				&lta href="javascript:history.back()">попробовать заново&lt/a>
			&lt?php endif; ?>
		&lt?php endif; ?>
		&ltbr />
		&ltbr />
		&lta href="../index.php#auth_2_3">назад&lt/a>

			//auth_2_3_pages/page_*.php
		&lt?php
		session_start();
		if (!isset($_SESSION['auth_2_3']['auth']) or $_SESSION['auth_2_3']['auth'] == false): ?>
			&ltp>Страница доступна только авторизированным пользователям&lt/p>
			&lta href="../auth_2_3.php">Авторизация&lt/a>
			&ltbr/>
			&ltbr/>
			&lta href="../../index.php#auth_2_3">Вернуться на главную&lt/a>
		&lt?php else : ?>
			&ltp>Приветствуем вас &lt?= $_SESSION['auth_2_3']['name'] ?>&lt/p>
			&ltp>Страница 1&lt/p>
			&lta href="../../index.php#auth_2_3">Вернуться на главную&lt/a>
		&lt?php endif; ?>

	</pre>
</code>
<p class="fw-bold" id="auth_2_3">Результат:</p>
<p>Рады видеть вас на нашем сайте
	<?php
	if (!isset($_SESSION['auth_2_3']['auth']) or $_SESSION['auth_2_3']['auth'] == false) : ?>
		Неизвестный!
	<?php else : echo ($_SESSION['auth_2_3']['name']) . '!'; ?>
	<?php endif; ?>
</p>
<?php
if (!isset($_SESSION['auth_2_3']['auth']) or $_SESSION['auth_2_3']['auth'] == false) : ?>
	<p>Просмотр страниц доступен только авторизированным пользователям
		<a href="php_tasks/auth_2_3.php">Авторизация</a>
	</p>
	<p>
		<a href="php_tasks/auth_2_3_pages/page_1.php">page_1</a> <br />
		<a href="php_tasks/auth_2_3_pages/page_2.php">page_2</a> <br />
		<a href="php_tasks/auth_2_3_pages/page_3.php">page_3</a> <br />
	</p>
<?php else: ?>
	<a href="php_tasks/auth_2_3_pages/page_1.php">page_1</a> <br />
	<a href="php_tasks/auth_2_3_pages/page_2.php">page_2</a> <br />
	<a href="php_tasks/auth_2_3_pages/page_3.php">page_3</a> <br />
	<br />
	<p>
		<a href="php_tasks/logoff.php?auth=2_3">log off</a>
	</p>
<?php endif; ?>

<h3 class="fw-bold mt-5">Выход из сессии на PHP</h3>
<p>Авторизованный пользователь должен возможность перестать быть авторизованным, то есть совершить выход из своего аккаунта. Для этого нужно сделать отдельную страницу и удалять на ней пометку об авторизации, примерно вот так:</p>

<code>
	<pre>
	&lt?php
	session_start();
	$_SESSION['auth'] = null;
	?>
	</pre>
</code>

<p class="fw-bold mt-3">Задача</p>
<p>Реализуйте страницу logout.php, зайдя на которую, пользователь перестанет быть авторизованным.</p>
<p>Модифицируйте предыдущую задачу так, чтобы страница logout.php после выполнения своего кода выполняла редирект на index.php. Покажите на этой странице сообщение о том, что пользователь перестал быть авторизованным.</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
		//file: index.php
	&lta href="php_tasks/logoff.php?auth=2_3">log off</a>
		
	
		//file: logoff.php
	&lt?php
		session_start();
		$sess_num = 'auth_' . $_GET['auth'];
		$_SESSION[$sess_num] = null;
		header('location: ../../index.php#' . $sess_num);
	?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>

<h3 class="fw-bold mt-5">Регистрация на PHP</h3>
<p>
	Давайте теперь реализуем регистрацию. Для этого сделаем отдельную страницу register.php. По заходу на эту страницу, пользователь должен увидеть форму, в которую он должен вбить желаемый логин и пароль:
</p>
<code>
	<pre>
		//file: registr.php
	&ltform action="" method="POST">
		&ltinput name="login">
		&ltinput name="password" type="password">
		&ltinput type="submit">
	&lt/form>
	</pre>
</code>
<p>
	По нажатию на кнопку отправки форму логин и пароль пользователя должны занестись в базу данных с помощью INSERT запроса, вот так:
</p>
<code>
	<pre>
		//file: registr.php
	&lt?php
	if (!empty($_POST['login']) and !empty($_POST['password'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];

		$query = "INSERT INTO users SET login='$login', password='$password'";
		mysqli_query($link, $query);
	}
	?>	
	</pre>
</code>
<p>
	Затем пользователь может зайти на страницу авторизации, ввести логин и пароль, под которым он зарегистрировался и авторизоваться.
</p>

<p class="fw-bold mt-3">Задача 1</p>
<p>
	Реализуйте описанную выше регистрацию. После этого зарегистрируйте нового пользователя и авторизуйтесь под ним. Убедитесь, что все работает, как надо.
</p>
<p class="fw-bold">Решение:</p>
<p class="fw-bold" id="register">Результат:</p>
<a href="php_tasks/registr/registr_1_1.php">1 Регистрация нового пользователя</a>

<p class="fw-bold mt-3" id="register2">Задача 2</p>
<p>Модифицируйте ваш код так, чтобы кроме логина и пароля пользователю нужно было ввести еще и дату своего рождения и email. Сохраните эти данные в базу данных.</p>
<p class="fw-bold">Решение:</p>
<p>Для решения этой задачи, на понадобиться либо "расширить" таблицу user_auth, добавив в неё ещё 2 столбца email и birth_date. Либо добавить ещё 2 таблицы user_email и user_birth_date в которых надо будет указать необходимую нам информацию. А так же id user к которому она относиться.</p>
<p><b>Давайте поразмышляем....</b><br />
	<i>Может быть у пользователя 2 (официальных) дня рождения? - конечно же нет. <br />
		А может быть у пользоателя 2 (официальных) email ? - Да! (у меня у самого их более 3х :))</i>
</p>
<p>Я думаю что самым оптимальным решением этой задачи, будет добавить столбец birth_date в таблицу user_auth. И сделать дополнительную таблицу user_email (с полями email и user_id) для почтовых ящиков пользователя.</p>
<p class="fw-bold">Результат:</p>
<a href="php_tasks/registr/registr_1_2.php">2 Регистрация нового пользователя</a>

<h3 class="fw-bold mt-5">Авторизация сразу при регистрации в PHP</h3>

<p>
	Сейчас наша регистрация сделана таким образом, что пользователь первый раз вбивает логин-пароль регистрируясь, а потом сразу же вбивает их второй раз, желая зайти на сайт.

	Это на самом деле не очень удобно и будет раздражать пользователей. Лучше сделать так, чтобы при успешной регистрации сразу же происходила автоматическая авторизация. Для этого сразу после успешной регистрации запишем в сессию пометку об успешной авторизации:
</p>

<code>
	<pre>
	&lt?php
	if (!empty($_POST['login']) and !empty($_POST['password'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];

		$query = "INSERT INTO users SET login='$login', password='$password'";
		mysqli_query($link, $query);

		$_SESSION['auth'] = true; // пометка об авторизации
	}
	?>
	</pre>
</code>

<!-- 
    <p class="fw-bold mt-3">Задача</p>
    <p></p>
    <p class="fw-bold">Решение:</p>
    <p class="fw-bold">Результат:</p>
	-->

<!-- 
<h3 class="fw-bold mt-5">Практические задачи</h3>
 -->