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
<p class="fw-bold">Результат:</p>
<?php
if(!isset($_SESSION['auth']) or $_SESSION['auth'] == false ):?>
<p>Вы не аторизованы</p>
<?php else :?>
	<p>Добро пожаловать</p>
<?php endif;?>

<a href="php_tasks/auth_1_4.php">Реализация</a>


<h3 class="fw-bold mt-5">Авторизация через сессию на PHP</h3>

<p>
Наша авторизация должна работать так: пользователь, который хочет авторизоваться на сайте, заходит на страницу login.php, вбивает правильные логин и пароль и далее ходит по страницам сайта уже будучи авторизованным.<br/>
Чтобы другие страницы сайта знали о том, что наш пользователь авторизован, мы должны хранить в сессии пометку об этом.<br/>
Пока наша авторизация не совсем рабочая, так как сессию мы еще не подключили и другие страницы сайта не могут понять, авторизован пользователь или нет.<br/>
Будем хранить пометку об авторизации в переменной сессии $_SESSION['auth'] - если там записано true, то пользователь авторизован, а если null - то не авторизован.<br/>
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
<!-- 
    <p class="fw-bold mt-3">Задача</p>
    <p></p>
    <p class="fw-bold">Решение:</p>
    <p class="fw-bold">Результат:</p>
	-->

<!-- 
<h3 class="fw-bold mt-5">Практические задачи</h3>
 -->