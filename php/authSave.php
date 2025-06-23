<?php session_start(); ?>
<h3 class="fw-bold mt-5">Хеширование пароля</h3>
<p>
    Хранить пароль в открытом виде - неправильно. Хакер-злоумышленник может получить доступ к вашей базе данных и украсть пароли.
    <br />Поэтому обычно логин хранится в открытом виде, а пароль хешируется специальной функцией md5, которая параметром принимает пароль, а возвращает его хеш, по которому нельзя восстановить этот самый пароль.
    <br />Давайте, например, найдем хеш какой-нибудь строки:
</p>
<code>
    <pre>
    &lt?php
        echo md5('12345'); // выведет <?= md5('12345'); ?>
    </pre>
</code>

<p>
    Сейчас нам необходимо переделать нашу регистрацию и нашу авторизацию. Для начала я бы советовал очистить таблицу с юзерами, так как там сейчас хранятся пароли в открытом виде, а должны хранится их хеши. Затем при тестировании регистрации таблица заполнится данными в новом формате.<br />Давайте теперь поправим нашу регистрацию так, чтобы при сохранении нового пользователя в базу добавлялся не пароль, а его хеш.<br />Описанная правка будет представлять собой что-то такое:
</p>
<code>
    <pre>
    &lt?php
    $login = $_POST['login'];
    $password = md5($_POST['password']); // преобразуем пароль в его хеш

    $query = "INSERT INTO users SET login='$login', password='$password'";
    ?>
    </pre>
</code>
<p>Внесем аналогичные правки в авторизацию:</p>
<code>
    <pre>
    &lt?php
	$login = $_POST['login'];
	$password = md5($_POST['password']); // преобразуем пароль в его хеш
		
	$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
    ?>
    </pre>
</code>
<p class="fw-bold mt-3">Задача</p>
<p>Внесите изменения в регистрацию с учетом хеширования, зарегистрируйте пару новых пользователей, убедитесь, что в базу данных они добавились с хешированными паролями.</p>
<p class="fw-bold">Решение:</p>
<p class="fw-bold" id="save_reg_1">Результат:</p>
<p>Приветствую

    <?php if (!empty($_SESSION['user'])) : ?>
        <span><?= $_SESSION['user'] ?></span>
    <?php else : ?>
        <span>неизвестный</span>
    <?php endif; ?>
    !
</p>
<br />
<a href="php_tasks/auth_save/1/reg_1.php">Регистрация</a>
<br />
<?php if (!empty($_SESSION['user'])) : ?>
    <a href="php_tasks/auth_save/1/logoff_1.php">Выход</a>
<?php else : ?>
    <a href="php_tasks/auth_save/1/auth_1.php">Вход</a>
<?php endif; ?>
<br />

<h3 class="fw-bold mt-5">Добавление соли в регистрацию</h3>
<p>
    Итак, вы уже знаете, что хеширование через md5 - необратимый процесс и хакер, получивший доступ к хешу, не сможет получить по этому хешу пароль.<br />
    На самом деле это утверждение не совсем верное - в настоящее время злые хакеры составили библиотеки хешей популярных и не очень паролей и любой дурак может разгадать пароль, просто загуглив его хеш.<br />
    Речь идет о достаточно простых, популярных паролях.<br />
    Загуглите, например, хеш 827ccb0eea8a706c4c34a16891f84e7b и сразу в поиске гугла вы увидите, что это пароль '12345'.<br />
    Хеши достаточно сложных паролей таким образом не разгадать (попробуйте).
    Вы можете спросить, в чем тогда проблема - давайте все мы будем регистрироваться со сложными паролями. Есть, однако, проблема - большинство пользователей не задумываются о безопасности своих данных и могут вводить достаточно простые пароли.<br />
    Мы можем при регистрации заставлять придумывать более длинные пароли, ограничивая, к примеру, минимальное количество символов 6-ю или 8-ю, однако, все равно будут появляться пароли вида '123456' или '12345678'.<br />
    Можно, конечно, придумать более умный алгоритм проверки пароля на сложность, но есть другое решение.<br />
    Суть этого решения такая: пароли надо посолить. Соль - это специальная случайная строка, которая будет добавляться к паролю при регистрации и хеш уже будет вычисляться не от простого пароля типа, а от строки соль+пароль, то есть от соленого пароля.<br />
    То есть при регистрации вы будете делать что-то типа такого:<br />
</p>
<code>
    <pre>
    &lt?php
        $salt = '1sJg3hfdf'; // соль - сложная случайная строка
        $password = md5($salt . $_POST['password']); // преобразуем пароль в соленый 
            хеш 
    ?>
    </pre>
</code>

<p>
    При этом соль будет разная для каждого пользователя, ее нужно будет генерировать случайным образом в момент регистрации.<br />
    Вот готовая функция, которая сделает это:
</p>

<code>
    <pre>
    &lt?php
        function generateSalt()
        {
            $salt = '';
            $saltLength = 8; // длина соли
            
            for($i = 0; $i < $saltLength; $i++) {
                $salt .= chr(mt_rand(33, 126)); // символ из ASCII-table
            }
            
            return $salt;
        }
    ?>
    </pre>
</code>
<p>
    С помощью этой функции можно переписать наш код вот так:
</p>
<code>
    <pre>
    &lt?php
        $salt = generateSalt(); // соль
        $password = md5($salt . $_POST['password']); // соленый пароль
    ?>
    </pre>
</code>
<p>
    Еще раз повторю, что это были изменения при регистрации - в БД сохраняем не просто хеш пароля, а хеш соленого пароля.<br />
    Это еще не все: в таблице с юзерами кроме поля login и password нужно сделать еще и поле salt, в котором мы будем хранить соль каждого пользователя.
</p>
<p class="fw-bold mt-3">Задача</p>
<p>
    Реализуйте описанную выше регистрацию с соленым паролем.
</p>
<p class="fw-bold">Решение:</p>
<p class="fw-bold" id="save_reg_2">Результат:</p>

<p>Приветствую

    <?php if (!empty($_SESSION['user_2'])) : ?>
        <span><?= $_SESSION['user_2'] ?></span>
    <?php else : ?>
        <span>неизвестный</span>
    <?php endif; ?>
    !
</p>
<br />
<a href="php_tasks/auth_save/2/reg_2.php">Регистрация</a>
<br />
<?php if (!empty($_SESSION['user_2'])) : ?>
    <a href="php_tasks/auth_save/2/logoff_2.php">Выход</a>
<?php else : ?>
    <a href="php_tasks/auth_save/2/auth_2.php">Вход</a>
<?php endif; ?>
<br />

<h3 class="fw-bold mt-5">Добавление соли в авторизацию</h3>
<p>
    Теперь нам необходимо поменять авторизацию. Здесь уже изменения будут более существенными.<br />
    Уже не получится проверить правильность пары логин-пароль сразу же, одним запросом. Почему: потому что, чтобы проверить пароль, надо получить его соленый хеш, а соль хранится в базе данных и уникальная для каждого логина.
    <vr />
    Придется вначале получить запись только по логину, прочитать соль, посолить введенный пароль и сравнить с соленым паролем из базы и только, если они совпадают, - авторизовывать пользователя.<br />
    Учтите, что может такое быть, что логин вбит неправильно, в этом случае проверку пароля можно не осуществлять, а сразу вывести, что авторизация не возможна - данные не верны:<br />
</p>
<code>
    <pre>
    &lt?php
        $login = $_POST['login'];
        
        $query = "SELECT * FROM users WHERE login='$login'";
        $res = mysqli_query($link, $query);
        $user = mysqli_fetch_assoc($res);
            
        if (!empty($user)) {
            // пользователь с таким логином есть, теперь надо проверять 
                пароль... 
        } else {
            // пользователя с таким логином нет, выведем сообщение
        }
    ?>
    </pre>
</code>
<p>
    Давайте добавим проверку пароля:
</p>
<code>
    <pre>
    &lt?php
        $login = $_POST['login'];
        
        $query = "SELECT * FROM users WHERE login='$login'";
        $res = mysqli_query($link, $query);
        $user = mysqli_fetch_assoc($res);
            
        if (!empty($user)) {
            $salt = $user['salt']; // соль из БД
            $hash = $user['password']; // соленый пароль из БД
            
            $password = md5($salt . $_POST['password']); // соленый пароль от юзера
            
            // Сравниваем соленые хеши
            if ($password == $hash) {
                // все ок, авторизуем...
            } else {
                // пароль не подошел, выведем сообщение
            }
        } else {
            // пользователя с таким логином нет, выведем сообщение
        }
    ?>
    </pre>
</code>
<p class="text-danger bg-light">
    В целях безопасности пользователю обычно не сообщают, что именно не подошло - логин или пароль, чтобы усложнить подбор пар логин-пароль хакерами. Просто выводят сообщение о том, что пара логин-пароль неверна или что-то в таком роде.
</p>
<p class="fw-bold mt-3">Задача</p>
<p>
    Реализуйте описанную выше авторизацию с соленым паролем. Попробуйте зарегистрируйтесь, авторизуйтесь, убедитесь, что все работает.
</p>
<p class="fw-bold">Решение:</p>
<p class="fw-bold">Результат:</p>
<a href="#save_reg_2">результат представлен выше</a>

<h3 class="fw-bold mt-5">Функция password_hash</h3>
<p>
    На самом деле функция md5 и соление пароля с ее помощью считается устаревшим. Мы изучали ее, чтобы вы поняли дальнейший материал, а также потому, что вы можете столкнуться с этим, работая с чужими проектами.<br />
    Существует более совершенный способ получить соленый пароль. Для этого используется функция password_hash. Первым параметром она принимает строку, а вторым - алгоритм шифрования (о нем позднее), и возвращает хеш этой строки вместе с солью.<br />
    Попробуйте несколько раз запустите этот код:<br />
</p>
<code>
    <pre>
    &lt?php
    echo password_hash('12345', PASSWORD_DEFAULT);
    ?>
    </pre>
</code>
<p>
    echo password_hash('12345', PASSWORD_DEFAULT) = <?= password_hash('12345', PASSWORD_DEFAULT) ?>
</p>
<p>
    Вы каждый раз будете получать разный результат и в этом результате первая часть строки будет являться солью, а вторая часть - соленым паролем.<br />
    Пусть у нас есть хеш, полученный из функции <b>password_hash</b> и какой-то пароль. Чтобы проверить, это хеш этого пароля или нет, следует использовать функцию <b>password_verify</b> - первым параметром она принимает пароль, а вторым - хеш, и возвращает true или false.<br />
    Давайте посмотрим на примере:<br />
</p>
<code>
    <pre>
    &lt?php
    $password = '12345'; // пароль
    $hash = '$2y$10$xoYFX1mFPxBSyxaRe3iIRutxkIWhxGShzEhjYUVd3qpCUKfJE1k7a'; // хеш

    if (password_verify($password, $hash)) {
    // хеш от этого пароля
    } else {
    // хеш не от этого пароля
    }
    ?>
    </pre>
</code>
<p>
    Что это дает нам на практике: мы можем не создавать в базе данных отдельное поле для хранения соли, не заморачиваться с генерированием этой соли - PHP все сделает за нас!<br />
    То есть получится, что в базе данных в поле password мы будем хранить соленый пароль вместе с его солью. При этом хешированный пароль будет иметь большую длину. Поэтому в базе данных нам нужно исправить размер поля с паролем и установить ее в 60 символов.<br />
    Теперь давайте поправим код регистрации. Вот то, что есть сейчас:<br />
</p>
<code>
    <pre>
    &lt?php
    function generateSalt()
    {
        $salt = '';
        $saltLength = 8; // длина соли

        for ($i = 0; $i < $saltLength; $i++) {
            $salt .= chr(mt_rand(33, 126)); // символ из ASCII-table
        }

        return $salt;
    }

    $salt = generateSalt(); //  соль
    $password = md5($salt . $_POST['password']); // преобразуем пароль в соленый хеш
    ?>
    </pre>
</code>
<p>С помощью <b>password_hash</b> мы сократим это до:</p>
<code>
    <pre>
    &lt?php
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    ?>
    </pre>
</code>
<p>
    Аналогичным образом подправится код авторизации:
</p>
<code>
    <pre>
    &lt?php
    $login = $_POST['login'];

    $query = "SELECT * FROM users WHERE login='$login'"; // получаем юзера по логину
    $res = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($res);

    if (!empty($user)) {
        $hash = $user['password']; // соленый пароль из БД

        // Проверяем соответствие хеша из базы введенному паролю
        if (password_verify($_POST['password'], $hash)) {
            // все ок, авторизуем...
        } else {
            // пароль не подошел, выведем сообщение
        }
    } else {
        // пользователя с таким логином нет, выведем сообщение
    }
    ?>
    </pre>
</code>

<p class="fw-bold mt-3" id="save_reg_3">Задача</p>
<p>Переделайте вашу авторизацию и регистрацию на новые изученные функции.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
        //file: index.php

        &ltp>Приветствую

            &lt?php if (!empty($_SESSION['user_3'])) : ?>
                &ltspan>&lt?= $_SESSION['user_3'] ?>&lt/span>
            &lt?php else : ?>
                &ltspan>неизвестный&lt/span>
            &lt?php endif; ?>
            !
        &lt/p>
        &ltbr />
        &lta href="php_tasks/auth_save/3/reg_3.php">Регистрация&lt/a>
        &ltbr />
        &lt?php if (!empty($_SESSION['user_3'])) : ?>
            &lta href="php_tasks/auth_save/3/logoff_3.php">Выход&lt/a>
        &lt?php else : ?>
            &lta href="php_tasks/auth_save/3/auth_3.php">Вход&lt/a>
        &lt?php endif; ?>


        //file: php_tasks/auth_save/3/reg_3.php

        &lt?php
        session_start();
        if (!empty($_POST)) {
            if (checkLogin()['test']) {
                if (checkPassword()['test']) {
                    if (checkConfirmPass()['test']) {
                        addNewUserRegDataInBase();
                    }
                }
            }
        }
        ?>

        &ltform method="post" style="display: grid; width:300px;">
            login: &lt?= (!empty($_POST) and !checkLogin()['test']) ? checkLogin()['msg'] : '' ?>
            &ltinput type="text" name="login">
            password: &lt?= (!empty($_POST) and !checkPassword()['test']) ? checkPassword()['msg'] : '' ?>
            &ltinput type="password" name="password">
            confirm password: &lt?= (!empty($_POST) and !checkConfirmPass()['test']) ? checkConfirmPass()['msg'] : '' ?>
            &ltinput type="password" name="confirm">
            &ltbr />
            &ltinput type="submit">
        &lt/form>
        &lta href="../../../index.php#save_reg_3">на главную&lt/a>

        &lt?php
        function checkLogin()
        {
            $login = trim($_POST['login']);
            if (empty($login)) {
                if (empty($login) and strlen($login) == 1) {
                    return ['test' => false, 'msg' => 'Логин слишком короткий'];
                }
                return ['test' => false, 'msg' => 'Логин не заполнен'];
            }
            return ['test' => true];
        };

        function checkPassword()
        {
            $password = trim($_POST['password']);
            if (empty($password)) {
                if (empty($password) and strlen($password) == 1) {
                    return ['test' => false, 'msg' => 'Пароль слишком короткий'];
                }
                return ['test' => false, 'msg' => 'Пароль не заполнен'];
            }
            return ['test' => true];
        }

        function checkConfirmPass()
        {
            $confirm = trim($_POST['confirm']);
            if ($confirm !== $_POST['password']) {
                return ['test' => false, 'msg' => 'Пароли не совпадают'];
            }
            return ['test' => true];
        }

        function addNewUserRegDataInBase()
        {

            include('../../../db/connect_2.php');
            $login = $_POST['login'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $queryAddUser = "INSERT INTO user SET name = '$login', password = '$password'";
            mysqli_query($db_pract_link, $queryAddUser);
            unset($_POST);
            $_SESSION['user_3'] = $login;
            header('location:../../../index.php#save_reg_3');
        }
        ?>


        //file: php_tasks/auth_save/3/logoff_3.php

        &lt?php
        session_start();
        unset($_SESSION['user_3']);
        header('location:../../../index.php#save_reg_3');
        ?>


        //file: php_tasks/auth_save/3/auth_3.php

        &lt?php
        session_start();
        if (!empty($_POST)) {
            $login = $_POST['login'];
            include('../../../db/connect_2.php');
            $query_getLog = "SELECT * FROM user WHERE name = '$login'";
            $user = mysqli_fetch_assoc(mysqli_query($db_pract_link, $query_getLog));
            if ($user) {

                if (password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['user_3'] = $user['name'];
                    header('location:../../../index.php#save_reg_3');
                    die();
                }
            }

            echo '&ltspan style="color:red">неверая пара login | password&lt/span>';
        }
        ?>

        &ltform method="post" style="display: grid; width:300px">
            login:
            &ltinput type="text" name="login">
            password:
            &ltinput type="password" name="password">
            &ltbr />
            &ltinput type="submit">
        &lt/form>
        &ltbr />
        &lta href="../../../index.php#save_reg_3">На главную&lt/a>
    </pre>
</code>
<p class="fw-bold">Результат:</p>

<p>Приветствую

    <?php if (!empty($_SESSION['user_3'])) : ?>
        <span><?= $_SESSION['user_3'] ?></span>
    <?php else : ?>
        <span>неизвестный</span>
    <?php endif; ?>
    !
</p>
<br />
<a href="php_tasks/auth_save/3/reg_3.php">Регистрация</a>
<br />
<?php if (!empty($_SESSION['user_3'])) : ?>
    <a href="php_tasks/auth_save/3/logoff_3.php">Выход</a>
<?php else : ?>
    <a href="php_tasks/auth_save/3/auth_3.php">Вход</a>
<?php endif; ?>
<br />
<!-- 
    <p class="fw-bold mt-3">Задача</p>
    <p></p>
    <p class="fw-bold">Решение:</p>
    <p class="fw-bold">Результат:</p>
-->

<!-- 
<h3 class="fw-bold mt-5">Практические задачи</h3>
-->

<h3 class="fw-bold mt-5">Реализация профиля на PHP</h3>

<p>
    Давайте теперь реализуем просмотр профиля пользователя. Под профилем понимается информация, которую этот пользователь указал при регистрации.<br/>
    Сделаем так, чтобы можно было смотреть профиль любого из пользователей. Для этого сделаем страницу profile.php, в которую GET параметром будем передавать id пользователя, которого мы хотим посмотреть.<br/>
    На странице профиля мы будем показывать не всю информацию, которую указал о себе пользователь. К примеру, пароль там показывать точно не стоит. Кроме того, скорее всего показ емейла также будет лишним, так как в этом случае спамеры могут собирать эти емейлы программами-парсерами и рассылать спам на них.<br/>
</p>