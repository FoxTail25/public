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
<code>
	<pre>
	&lt?php
	session_start();
	?>
	&ltp>Регистрация нового пользователя&lt/p>

	&ltform method="post" style="display: grid; width:200px;">
		login:
		&ltinput type="text" name="login">
		passqord:
		&ltinput type="password" name="password">
		&ltinput type="submit">
	&lt/form>

	&lt?php
	if (!empty($_POST['login']) and !empty($_POST['password'])) {
		include('../../db/connect.php');
		$login = $_POST['login'];
		$password = $_POST['password'];
		$query = "INSERT INTO user_auth SET login='$login', password = '$password'";
		mysqli_query($db_pract_link, $query);
		$_SESSION['success'] = true;
		unset($_POST);
		header('location:#');
		die();
	}
	?>
	&lt?php
	if (isset($_SESSION['success'])): ?>
		&ltp>Пользователь успешно добавлен в базу&lt/p>
		&lta href="../index.php#register">вернуться на главную&lt/a>
	&lt?php endif;
	$_SESSION['success'] = null;
	?>
	&ltbr/>
	&lta href="../../index.php">На главную&lt/a>
	</pre>
</code>
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
<code>
	<pre>
	&lt?php
	session_start();

	if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['email']) and !empty($_POST['birthdate'])) {
		include('../../db/connect.php');
		$login = $_POST['login'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$birthDate = $_POST['birthdate'];
		$timestamp = date('Y-m-d H:i:s');
		$query = "INSERT INTO user_auth SET login='$login', password = '$password', birth_date='$birthDate', register_date='$timestamp'";
		mysqli_query($db_pract_link, $query);

		// $query_user_id = "SELECT * FROM user_auth WHERE login = '$login'";  //Длинный способ получени id только что добавленной записи в базу данных
		// $res = mysqli_query($db_pract_link, $query_user_id);
		// for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
		// $userId = $data[0]["id"];

		$userId = $id = mysqli_insert_id($db_pract_link); //Короткий способ!

		$query_add_email = "INSERT INTO user_email SET email='$email', user_id ='$userId'";
		mysqli_query($db_pract_link, $query_add_email);


		$_SESSION['success'] = true;
		unset($_POST);
		header('location:#');
		die();
	}
	?>

	&ltp>Регистрация нового пользователя&lt/p>
	&ltform method="post" style="display: grid; width:200px;">
		login:
		&ltinput type="text" name="login">
		password:
		&ltinput type="password" name="password">
		email:
		&ltinput type="email" name="email">
		BirthDate:
		&ltinput type="date" name="birthdate">

		&ltinput type="submit">
	&lt/form>


	&lt?php
	if (isset($_SESSION['success'])): ?>
		&ltp>Пользователь успешно добавлен в базу&lt/p>
		&lta href="../../index.php#register2">вернуться на главную&lt/a>
	&lt?php else : ?>
		&ltbr />
		&lta href="../../index.php#register2">На главную&lt/a>
	&lt?php endif;

	$_SESSION['success'] = null;
	?>
	</pre>
</code>
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

<p class="fw-bold mt-3">Задача</p>
<p>Модифицируйте ваш код так, чтобы после регистрации пользователь автоматически становился авторизованным.</p>
<p class="fw-bold">Решение:</p>
<p>добавим к предыдущему коду пару строк:</p>
<code>
	<pre>
	$_SESSION['auth_2_3']['auth'] = true; // записываем данные в сессию что бы пользоатель сразу авторизовался на сайте.
	$_SESSION['auth_2_3']['name'] = $login; // записываем логин пользователя в сессию.
	</pre>
</code>
<p class="fw-bold">Результат:</p>

<h3 class="fw-bold mt-5">Добавление id пользователя в сессию</h3>
<p>
	Пусть кроме пометки об авторизации мы бы хотели записать в сессию еще и его id.
	В этом случае мы можем получить его с помощью функции mysqli_insert_id. Эта функция получает id последней вставленной в данном скрипте записи, то есть как раз то, что нам нужно.
	Реализуем:
</p>
<code>
	<pre>
	&lt?php
		if (!empty($_POST['login']) and !empty($_POST['password'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			$query = "INSERT INTO users SET login='$login', password='$password'";
			mysqli_query($link, $query);
			
			$_SESSION['auth'] = true;
			
			$id = mysqli_insert_id($link);
			$_SESSION['id'] = $id; // пишем id в сессию
		}
	?>
	</pre>
</code>

<p class="fw-bold mt-3">Задача</p>
<p>Запишите при регистрации в сессию еще и id пользователя.</p>
<p class="fw-bold">Решение:</p>
<p>добавим к предыдущему коду ещё одну строку:</p>
<code>
	<pre>
	$_SESSION['user_id'] = $userId;
	</pre>
</code>
<p class="fw-bold">Результат:</p>

<h3 class="fw-bold mt-5">Скрытие пароля при регистрации на PHP</h3>
<p>
	Поле ввода пароля обычно представляет собой инпут с типом password, в котором введенные символы скрываются под звездочками. Это сделано для того, чтобы злоумышленник не мог подсмотреть пароль пользователя через плечо в момент регистрации.<br />
	Сокрытие пароля таким образом конечно хорошо, но есть, однако, проблема - пользователь не видит, что вводит. Он может ошибиться при вводе какого-либо символа и зарегистрироваться не с тем паролем, с которым он хотел. Это будет печально:(, так как он затем не сможет авторизоваться на сайте.<br />
	Существует стандартное решение этой проблемы: пользователю показываются два инпута для ввода пароля - в первый инпут он вводит пароль, а во второй инпут - его подтверждение, то есть этот же пароль второй раз:
</p>
<code>
	<pre>
	&ltform action="" method="POST">
		&ltinput name="login">
		&ltinput type="password" name="password">
		&ltinput type="password" name="confirm">
		&ltinput type="submit">
	&lt/form>
	</pre>
</code>
<p>
	Задача нашего сайта - проверить, что пароль и его подтверждение совпадают, так как логично, что в этом случае пользователь ввел именно то, что хотел ввести:
</p>
<code>
	<pre>
	&lt?php
		if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])) {
			if ($_POST['password'] == $_POST['confirm']) {
				// регистрируем
			} else {
				// выведем сообщение о несовпадении
			}
		}
	?>
	</pre>
</code>

<p class="fw-bold mt-3">Задача</p>
<p>Модифицируйте ваш код так, чтобы при отправке формы пароль сравнивался с его подтверждением. Если они совпадают - то продолжаем регистрацию, а если не совпадают - то выводим сообщение об этом.
</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	session_start();

	if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['email']) and !empty($_POST['birthdate'])) {
		if ($_POST['password'] == $_POST['confirm']) {

			include('../../db/connect.php');
			$login = $_POST['login'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$birthDate = $_POST['birthdate'];
			$timestamp = date('Y-m-d H:i:s');
			$query = "INSERT INTO user_auth SET login='$login', password = '$password', birth_date='$birthDate', register_date='$timestamp'";
			mysqli_query($db_pract_link, $query);

			$userId = $id = mysqli_insert_id($db_pract_link); //Короткий способ!

			$query_add_email = "INSERT INTO user_email SET email='$email', user_id ='$userId'";
			mysqli_query($db_pract_link, $query_add_email);

			$_SESSION['success'] = true;
			$_SESSION['auth_2_3']['auth'] = true; // записываем данные в сессию что бы пользоатель сразу авторизовался на сайте.
			$_SESSION['auth_2_3']['name'] = $login; // записываем логин пользователя в сессию.
			$_SESSION['user_id'] = $userId;
			unset($_POST);
			header('location:#');
			die();
		} else {
			echo 'введённые пароли не совпадают';
		}
	}
	?>

	&ltp>Регистрация нового пользователя&lt/p>
	&ltform method="post" style="display: grid; width:200px;">
		login:
		&ltinput type="text" name="login">
		password:
		&ltinput type="password" name="password">
		confirm password:
		&ltinput type="password" name="confirm">
		email:
		&ltinput type="email" name="email">
		BirthDate:
		&ltinput type="date" name="birthdate">

		&ltinput type="submit">
	&lt/form>


	&lt?php
	if (isset($_SESSION['success'])): ?>
		&ltp>Пользователь успешно добавлен в базу&lt/p>
		&lta href="../../index.php#register2">вернуться на главную&lt/a>
	&lt?php else : ?>
		&ltbr />
		&lta href="../../index.php#register2">На главную&lt/a>
	&lt?php endif;

	$_SESSION['success'] = null;
	?>
	</pre>
</code>
<p class="fw-bold" id="registr_3_1">Результат:</p>
<a href="php_tasks/registr/registr_2.php">Регистрация 3</a>

<h3 class="fw-bold mt-5">Проверка логина на занятость</h3>
<p>
	Сейчас наша регистрация имеет одну проблему - новый пользователь нашего сайта может зарегистрироваться под уже существующим логином, что, конечно же, недопустимо.

	Для решения проблемы необходимо перед запросом на добавление нового пользователя в базу данных, выполнить SELECT запрос, который проверит, занят желаемый логин или нет. Если не занят - регистрируем, если занят - не регистрируем, а выводим сообщение об этом.

	Давайте напишем этот код:
</p>
<code>
	<pre>
	&lt?php
		if (!empty($_POST['login']) and !empty($_POST['password'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			$query = "SELECT * FROM users WHERE login='$login'";
			$user = mysqli_fetch_assoc(mysqli_query($link, $query));
			
			if (empty($user)) {
				$query = "INSERT INTO users SET login='$login', password='$password'";
				mysqli_query($link, $query);
				
				$_SESSION['auth'] = true;
				
			} else {
				// логин занят, выведем сообщение об этом
			}
		}
	?>
	</pre>
</code>

<p class="fw-bold mt-3" id="registr_3_2">Задача</p>
<p>
	Модифицируйте ваш код так, чтобы при попытке регистрации выполнялась проверка на занятость логина и, если он занят, - выводите сообщение об этом и просите ввести другой логин.
</p>
<p class="fw-bold">Решение:</p>
<code>
	<pre>
	&lt?php
	session_start();

	if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['email']) and !empty($_POST['birthdate'])) {


		$login = $_POST['login'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$birthDate = $_POST['birthdate'];
		$timestamp = date('Y-m-d H:i:s');

		if ($_POST['password'] == $_POST['confirm']) {

			include('../../db/connect.php');

			$query_check_user = "SELECT * FROM user_auth WHERE login='$login'";
			$check_user = mysqli_fetch_assoc(mysqli_query($db_pract_link, $query_check_user));

			if (empty($check_user)) {


				$query = "INSERT INTO user_auth SET login='$login', password = '$password', birth_date='$birthDate', register_date='$timestamp'";
				mysqli_query($db_pract_link, $query);

				$userId = $id = mysqli_insert_id($db_pract_link); //Короткий способ!

				$query_add_email = "INSERT INTO user_email SET email='$email', user_id ='$userId'";
				mysqli_query($db_pract_link, $query_add_email);

				$_SESSION['success'] = true;
				$_SESSION['auth_2_3']['auth'] = true; // записываем данные в сессию что бы пользоатель сразу авторизовался на сайте.
				$_SESSION['auth_2_3']['name'] = $login; // записываем логин пользователя в сессию.
				$_SESSION['user_id'] = $userId;
				unset($_POST);
				header('location:#');
				die();
			} else {
				echo "Данный логин уже занят";
			}
		} else {
			echo 'введённые пароли не совпадают';
		}
	}
	?>

	&ltp>Регистрация нового пользователя&lt/p>
	&ltform method="post" style="display: grid; width:200px;">
		login:
		&ltinput type="text" name="login">
		password:
		&ltinput type="password" name="password">
		confirm password:
		&ltinput type="password" name="confirm">
		email:
		&ltinput type="email" name="email">
		BirthDate:
		&ltinput type="date" name="birthdate">

		&ltinput type="submit">
	&lt/form>


	&lt?php
	if (isset($_SESSION['success'])): ?>
		&ltp>Пользователь успешно добавлен в базу&lt/p>
		&lta href="../../index.php#registr_3_2">вернуться на главную&lt/a>
	&lt?php else : ?>
		&ltbr />
		&lta href="../../index.php#registr_3_2">На главную&lt/a>
	&lt?php endif;

	$_SESSION['success'] = null;
	?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="php_tasks/registr/registr_3.php">Регистрация 3_1</a>

<h3 class="fw-bold mt-5">Валидация данных при регистрации на PHP</h3>
<p>
	Сейчас мы не накладываем никаких ограничений на пару логин-пароль, однако, это неправильно. К примеру, сейчас у нас пользователи случайно или намеренно могут зарегистрироваться с пустым логином или паролем, или с паролем, состоящим из одного символа. Такой пароль будет слишком простым и не безопасным.<br />
	Учтите, что если какое-то поле вбито некорректно, форма не должна очищаться, так как это будет доставлять ему неудобство пользователю: он вводил-вводил данные, нажал - и все пропало, хотя ошибка возможно была в одном символе.
</p>
<p class="fw-bold mt-3" id="valid_reg">Задача</p>
<p>
	Модифицируйте ваш код так, чтобы нельзя было зарегистрировать пользователя с пустым логином или паролем.
</p>
<p class="fw-bold">Решение:</p>
<p><i>Ниже приведённый код, будет проверять логин и пароль на "незаполненность" и на количество символов менее 2х. Так же он будет выподить сообщение о той ошибке, по которой логин или пароль не могут быть приняты.</i></p>
<code>
	<pre>
		//file: php_tasks/register/valid_reg.php

	&lt?php
	session_start();

	if (!empty($_POST)) {
		if (checkLog()['test']) {
			echo checkLog($_POST['login'])['msg'];

			if (checkPass()['test']) {
				echo checkPass()['msg'];

				if (!empty($_POST['confirm'])) {

					if ($_POST['password'] == $_POST['confirm'] and strlen($_POST['password']) == strlen($_POST['confirm'])) {
						echo 'password и password confirm совпадают&ltbr/>';
						echo 'Можно добалять в базу';

						//Код добавления в базу.

					} else {
						echo 'password и password confirm не совпадают';
					}
				} else {
					echo 'подтверждение пароля не заполнено&ltbr/>';
				}
			} else {
				echo checkPass()['msg'];
			}
		} else {
			echo checkLog()['msg'];
		}
	}
	?>


	&ltform action="" method="post" style="display: grid; width:200px;">
		login:
		&ltinput type="text" name="login" value="&lt?= isset($_POST['login']) ? $_POST['login'] : '' ?>">
		password:
		&ltinput type="password" name="password" value="&lt?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
		confirm password:
		&ltinput type="password" name="confirm" value="&lt?= isset($_POST['confirm']) ? $_POST['confirm'] : '' ?>">
		&ltbr />
		&ltinput type="submit">
	&lt/form>
	&ltbr />
	&lta href="../../index.php#valid_reg">вернуться на главную&lt/a>

	&lt?php
	function checkLog()
	{
		$_POST['login'] = trim($_POST['login']);
		$login = $_POST['login'];

		if (empty($login)) { // проверка на заполненность поля и 0
			if (empty($login) and $login == 0) {
				return ['test' => false, 'msg' => "логин слишком короткий&ltbr/>"];
			}
			return ['test' => false, 'msg' => "логин не заполнен&ltbr/>"];
		}
		$loginLength = strlen(trim($login));

		if ($loginLength &lt 2) { // проверка на длинну
			return ['test' => false, 'msg' => "логин слишком короткий&ltbr/>"];
		}

		return ['test' => true, 'msg' => "логин подходит&ltbr/>"]; // все проверки прошли успешно.
	}

	function checkPass()
	{
		$_POST['password'] = trim($_POST['password']);
		$pass = $_POST['password'];

		if (empty($pass)) { // проверка на заполненность поля и 0
			if (empty($pass) and $pass == 0) {
				return ['test' => false, 'msg' => "пароль слишком короткий&ltbr/>"];
			}
			return ['test' => false, 'msg' => "пароль не заполнен&ltbr/>"];
		}

		$passLength = strlen(trim($pass));
		if ($passLength &lt 2) { // проверка на длинну
			return ['test' => false, 'msg' => "пароль слишком короткий&ltbr/>"];
		}

		return ['test' => true, 'msg' => "пароль подходит&ltbr/>"]; // все проверки прошли успешно.
	}
	?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="php_tasks/registr/valid_reg.php">Регистрация с валидацией</a>

<p class="fw-bold mt-3" id="valid_reg2">Задача</p>
<p>
	Модифицируйте ваш код так, чтобы логин мог содержать только латинские буквы и цифры. В случае, если это не так, выводите сообщение об этом над формой.
</p>
<p class="fw-bold">Решение:</p>
<p><i>Для решения этой задачи, нам достаточно немного дополнить наш код. А именно добавить ещё одну проверку в функцию checkLog. Вот как теперь будет выглядеть наша функция:</i></p>
<code>
	<pre>
		//file: php_tasks/registr/valid_reg_2.php
	function checkLog()
	{
		$_POST['login'] = trim($_POST['login']);
		$login = $_POST['login'];

		if (empty($login)) { // проверка на заполненность поля и 0
			if (empty($login) and $login == 0) {
				return ['test' => false, 'msg' => "логин слишком короткий&ltbr/>"];
			}
			return ['test' => false, 'msg' => "логин не заполнен&ltbr/>"];
		}
		$loginLength = strlen($login);

		if ($loginLength &lt 2) { // проверка на длинну
			return ['test' => false, 'msg' => "логин слишком короткий&ltbr/>"];
		}
		
		$ciril_sym = preg_match('#\W#', $login); // Проверка на наличие только латинских букв и цифр
		if($ciril_sym) {
			return ['test' => false, 'msg' => "должны быть только латинские символы и цифры&ltbr/>"];
		}

		return ['test' => true, 'msg' => "логин подходит&ltbr/>"]; // все проверки прошли успешно.
	}
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="php_tasks/registr/valid_reg_2.php">Регистрация с валидацией 2</a>

<p class="fw-bold mt-3" id="valid_reg3">Задача</p>
<p>
	Модифицируйте ваш код так, чтобы логин был длиной от 4 до 10 символов. В случае, если это не так, выводите сообщение об этом над формой.
</p>
<p>
	Модифицируйте ваш код так, чтобы пароль был длиной от 6 до 12 символов. В случае, если это не так, выводите сообщение об этом над формой.
</p>
<p class="fw-bold">Решение:</p>
<p><i>Для этого так же поправил функции проверки логина и пароля:</i></p>
<code>
	<pre>
	&lt?php
	function checkLog()
	{
		$_POST['login'] = trim($_POST['login']);
		$login = $_POST['login'];

		if (empty($login)) { // проверка на заполненность поля и 0
			if (empty($login) and $login == 0) {
				return ['test' => false, 'msg' => "логин слишком короткий&ltbr/>"];
			}
			return ['test' => false, 'msg' => "логин не заполнен&ltbr/>"];
		}
		$loginLength = strlen($login);

		if ($loginLength &lt 4) { // проверка что бы не был слишком короткий
			return ['test' => false, 'msg' => "логин слишком короткий&ltbr/>"];
		}
		if ($loginLength > 10) { // проверка что бы не был слишком длинный
			return ['test' => false, 'msg' => "логин слишком длинный&ltbr/>"];
		}

		$ciril_sym = preg_match('#\W#', $login); // Проверка на наличие только латинских букв и цифр
		if ($ciril_sym) {
			return ['test' => false, 'msg' => "должны быть только латинские символы и цифры&ltbr/>"];
		}

		return ['test' => true, 'msg' => "логин подходит&ltbr/>"]; // все проверки прошли успешно.
	}

	function checkPass()
	{
		$_POST['password'] = trim($_POST['password']);
		$pass = $_POST['password'];

		if (empty($pass)) { // проверка на заполненность поля и 0
			if (empty($pass) and $pass == 0) {
				return ['test' => false, 'msg' => "пароль слишком короткий&ltbr/>"];
			}
			return ['test' => false, 'msg' => "пароль не заполнен&ltbr/>"];
		}

		$passLength = strlen(trim($pass));
		if ($passLength &lt 6) { // проверка что бы не был слишком короткий
			return ['test' => false, 'msg' => "пароль слишком короткий&ltbr/>"];
		}
		if ($passLength > 12) { // проверка что бы не был слишком длинный
			return ['test' => false, 'msg' => "пароль слишком длинный&ltbr/>"];
		}

		return ['test' => true, 'msg' => "пароль подходит&ltbr/>"]; // все проверки прошли успешно.
	}
	?>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="php_tasks/registr/valid_reg_3.php">Регистрация с валидацией 3</a>

<p class="fw-bold mt-3" id="valid_reg4">Задача</p>
<p>
	Модифицируйте ваш код так, чтобы, если логин или пароль вбиты некорректно, над соответствующим инпутом выводилось сообщение об этом.
</p>
<p class="fw-bold">Решение:</p>
<p><i>Здесь нужно немного доработать вывод сообщений. Функции проверки можно не трогать</i></p>
<code>
	<pre>
	&lt?php
	session_start();

	if (!empty($_POST)) {
		if (checkLog()['test']) {

			if (checkPass()['test']) {

				if (!empty($_POST['confirm'])) {

					if ($_POST['password'] == $_POST['confirm'] and strlen($_POST['password']) == strlen($_POST['confirm'])) {
						echo 'password и password confirm совпадают&ltbr/>';
						echo 'Можно добалять в базу';

						//Код добавления в базу.

					} else {
						echo 'password и password confirm не совпадают';
					}
				} else {
					echo 'подтверждение пароля не заполнено&ltbr/>';
				}
			} else {
			}
		} else {
		}
	}
	?>
	&ltform action="" method="post" style="display: grid; width:200px;">
		login: &lt?= (!empty($_POST) and !checkLog()['test']) ? checkLog()['msg'] : '' ?>
		&ltinput type="text" name="login" value="&lt?= isset($_POST['login']) ? $_POST['login'] : '' ?>">
		password: &lt?= (!empty($_POST) and !checkPass()['test']) ? checkPass()['msg'] : '' ?>
		&ltinput type="password" name="password" value="&lt?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
		confirm password:
		&ltinput type="password" name="confirm" value="&lt?= isset($_POST['confirm']) ? $_POST['confirm'] : '' ?>">
		&ltbr />
		&ltinput type="submit">
	&lt/form>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="php_tasks/registr/valid_reg_4.php">Регистрация с валидацией 4</a>

<p class="fw-bold mt-3">Задача</p>
<p>
	Спросите у пользователя при регистрации еще и email. Занесите его в базу данных. Выполните проверку емейла на корректность и, если он некорректен, над соответствующим инпутом выведите сообщение об этом.
</p>
<p class="fw-bold">Решение:</p>
<p class="fw-bold">Результат:</p>

<p class="fw-bold mt-3">Задача</p>
<p>
	Спросите у пользователя при регистрации еще и дату рождения в формате день.месяц.год. Занесите дату в базу данных. Выполните проверку даты на соответствие формату.
</p>
<p class="fw-bold">Решение:</p>
<p class="fw-bold">Результат:</p>

<p class="fw-bold mt-3">Задача 8</p>
<p>
	Спросите у пользователя при регистрации еще и страну проживания. Предложите ему выбрать одну из стран с помощью выпадающего списка select.
</p>
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