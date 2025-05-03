<h3 id="top" class="fw-bold mt-5">Оформление вывода из базы данных в PHP</h3>
<p>Вы уже умеете получать данные из базы данных. Давайте выведем теперь такие данные, оформив их тегами.</p>
<p>Например, записи нашей тестовой таблицы users выведем в следующем виде:</p>
<code>
    <pre>
    &ltp>
        &ltb>user1&lt/b>
        &ltb>23&lt/b>
        &ltb>400&lt/b>
    &lt/p>
    &ltp>
        &ltb>user2&lt/b>
        &ltb>24&lt/b>
        &ltb>500&lt/b>
    &lt/p>
    &ltp>
        &ltb>user3&lt/b>
        &ltb>25&lt/b>
        &ltb>600&lt/b>
    &lt/p></pre>
</code>
<p>Для начала давайте получим массив записей из нашей базы данных:</p>
<code>
    <pre>
    &lt?php
        $query = "SELECT * FROM users";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    ?></pre>
</code>
<p>Выведем теперь данные нашего массива в оформленном виде:</p>
<code>
    <pre>
        &lt?php
        $result = '';

        foreach ($data as $elem) {
            $result .= '&ltp>';

            $result .= '&ltb>' . $elem['name'] . '&lt/b>';
            $result .= '&ltb>' . $elem['age'] . '&lt/b>';
            $result .= '&ltb>' . $elem['salary'] . '&lt/b>';

            $result .= '&lt/p>';
        }

        echo $result;
        ?></pre>
</code>
<p>Можно переписать и в следующем виде:</p>
<code>
    <pre>
    &lt?php foreach ($data as $elem): ?>
        &ltp>
            &ltb>&lt?= $elem['name'] ?>&lt/b>
            &ltb>&lt?= $elem['age'] ?>&lt/b>
            &ltb>&lt?= $elem['salary'] ?>&lt/b>
        &lt/p>
    &lt?php endforeach; ?>
    </pre>
</code>

<p class="fw-bold mt-3">Задача 1</p>
<p>Выведите записи нашей таблицы в следующем виде:</p>
<code>
    <pre>
    &ltdiv>
        &lth2>user1&lt/h2>
        &ltp>
            23 years, &ltb>400$&lt/b>
        &lt/p>
    &lt/div>
    &ltdiv>
        &lth2>user2&lt/h2>
        &ltp>
            24 years, &ltb>500$&lt/b>
        &lt/p>
    &lt/div>
    &ltdiv>
        &lth2>user3&lt/h2>
        &ltp>
            25 years, &ltb>600$&lt/b>
        &lt/p>
    &lt/div>
    </pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
        &lt?php

        // Эта чать нам понадобится только один раз что бы создать коннект к базе данных в которой хранится таблица//
        $host = "MySQL-8.0";
        $user = "root";
        $pass = "";
        $dbname = 'db_pract';
        $db_pract_link = mysqli_connect($host, $user, $pass, $dbname);
        mysqli_query($db_pract_link, "SET NAMES 'utf8'");
        /////////////////Далее мы будем использовать только $db_pract_link для подключения к базе данных////////////

        $query = "SELECT *
            FROM users";
        $res = mysqli_query($db_pract_link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
        echo '&ltdiv>';
        foreach ($data as $elem) : ?>
    &lth2>&lt?= $elem['name'] ?>&lt/h2>
    &ltp>
        &lt?= $elem['age'] ?> years, &ltb> &lt?= $elem['salary'] ?>&lt/b>
    &lt/p>
    &lt?php endforeach ?>
    &lt/div>
	</pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$host = "MySQL-8.0";
$user = "root";
$pass = "";
$dbname = 'db_pract';
$db_pract_link = mysqli_connect($host, $user, $pass, $dbname);
mysqli_query($db_pract_link, "SET NAMES 'utf8'");

$query = "SELECT *
        FROM users";
$res = mysqli_query($db_pract_link, $query);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo '<div>';
foreach ($data as $elem) : ?>
    <h2><?= $elem['name'] ?></h2>
    <p>
        <?= $elem['age'] ?> years, <b> <?= $elem['salary'] ?></b>
    </p>
<?php endforeach ?>
</div>

<p class="fw-bold mt-3">Задача 2</p>
<p>Выведите записи нашей таблицы в следующем виде:</p>
<code>
    <pre>
    &lttable>
        &lttr>
            &ltth>id&lt/th>
            &ltth>name&lt/th>
            &ltth>age&lt/th>
            &ltth>salary&lt/th>
        &lt/tr>
        &lttr>
            &lttd>1&lt/td>
            &lttd>user1&lt/td>
            &lttd>23&lt/td>
            &lttd>400&lt/td>
        &lt/tr>
        &lttr>
            &lttd>2&lt/td>
            &lttd>user2&lt/td>
            &lttd>25&lt/td>
            &lttd>500&lt/td>
        &lt/tr>
        &lttr>
            &lttd>3&lt/td>
            &lttd>user3&lt/td>
            &lttd>23&lt/td>
            &lttd>500&lt/td>
        &lt/tr>
    &lt/table>
    </pre>
</code>
<p class="fw-bold">Решение:</p>
<p>В данном случае можно воспользоваться написанной ранее функцией <b>getTableM2</b> в результате у нас получится вот такой код:</p>
<code>
    <pre>
        &lt?php
        $res = mysqli_query($db_pract_link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
        require('func/func.php');  // подключаем файл, в котором хранится функция getTableM2
        getTableM2($data);
        ?>
    </pre>
</code>

<p class="fw-bold">Результат:</p>
<?php
$res = mysqli_query($db_pract_link, $query);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
require('func/func.php');
getTableM2($data);
?>

<p class="fw-bold mt-3">Задача 3</p>
<p>Выведите записи нашей таблицы в следующем виде:</p>
<code>
    <pre>
    &ltul>
        &ltli>user1&lt/li>
        &ltli>user2&lt/li>
        &ltli>user3&lt/li>
    &lt/ul>
    </pre>
</code>

<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &lt?php
        $res = mysqli_query($db_pract_link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
        echo "&ltul>";
        foreach ($data as $elem): ?>
        &ltli>&lt?= $elem['name'] ?>&lt/li>
    &lt?php endforeach ?>
    &lt/ul>
    </pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$res = mysqli_query($db_pract_link, $query);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
echo "<ul>";
foreach ($data as $elem): ?>
    <li><?= $elem['name'] ?></li>
<?php endforeach ?>
</ul>

<h3 class="fw-bold mt-5">Удаление данных из БД с помощью GET запросов</h3>

<p>Давайте теперь будем удалять записи из базы данных, передавая id для их удаления через GET параметры.<br />Пусть у нас передается GET параметр с именем del. Давайте получим получим id для удаления в переменную:</p>

<code>
    <pre>
        &lt?php
        $del = $_GET['del'];
        ?></pre>
</code>
<p>Сформируем запрос на удаление:</p>
<code>
    <pre>
        &lt?php
        $query = "DELETE FROM users WHERE id=$del";
        ?></pre>
</code>

<P>Удалим запись из базы данных:</P>
<code>
    <pre>
        &lt?php
        mysqli_query($link, $query) or die(mysqli_error($link));
        ?></pre>
</code>

<p class="fw-bold mt-3">Задача 1</p>
<p>Сделайте так, чтобы в адресной строке можно было отправить GET запрос с id юзера и этот юзер удалялся из БД.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &lt?php
        if(isset($_GET['del'])){
            $delId = $_GET['del'];
            echo 'DEL ID = '.$delId;
            $queryDel = "DELETE FROM users WHERE id = $delId";
            mysqli_query($db_pract_link, $queryDel);
            echo "user с id $delId удалён";
        }
    ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
// if (isset($_GET['del'])) {
//     $delId = $_GET['del'];
//     echo 'DEL ID = ' . $delId;
//     $queryDel = "DELETE FROM users WHERE id = $delId";
//     mysqli_query($db_pract_link, $queryDel);
//     echo "user с id $delId удалён";
// }
?>


<p class="fw-bold mt-3">Задача 2</p>
<p>Модифицируйте предыдущую задачу так, чтобы на странице были ссылки для удаления каждого юзера:</p>
<code>
    <pre>
    &lta href="?del=1">user1&lt/a>
    &lta href="?del=2">user2&lt/a>
    &lta href="?del=3">user3&lt/a></pre>
</code>
<p>Ссылки, конечно же, должны формироваться в цикле из полученных из БД данных.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &lt?php
	if (isset($_GET['del'])) {
            $delId = $_GET['del'];
            $queryDel = "DELETE FROM users WHERE id = $delId";
            $answer = mysqli_query($db_pract_link, $queryDel);
        }

        $querySelectId = "SELECT id, name FROM users";
        $res = mysqli_query($db_pract_link, $querySelectId);
        for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
        foreach ($data as $elem): ?>
            &lta href="?del=&lt?= $elem['id'] ?>">&lt?= $elem['name'] ?>&lt/a>&ltbr />
        &lt?php endforeach
    ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
if (isset($_GET['del'])) {
    $delId = $_GET['del'];
    $queryDel = "DELETE FROM users WHERE id = $delId";
    $answer = mysqli_query($db_pract_link, $queryDel);
}


$querySelectId = "SELECT id, name FROM users";
$res = mysqli_query($db_pract_link, $querySelectId);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
foreach ($data as $elem): ?>
    <a href="?del=<?= $elem['id'] ?>"><?= $elem['name'] ?></a><br />
<?php endforeach ?>


<p class="fw-bold mt-3">Задача 3</p>
<p>Модифицируйте предыдущую задачу так, чтобы у вас был следующий HTML код:</p>
<code>
    <pre>
    &ltul>
	&ltli>user1 &lta href="?del=1">удалить&lt/a>&lt/li>
	&ltli>user2 &lta href="?del=2">удалить&lt/a>&lt/li>
	&ltli>user3 &lta href="?del=3">удалить&lt/a>&lt/li>
    &lt/ul></pre>
</code>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
	&lt?php
    	if (isset($_GET['del'])) {
            $delId = $_GET['del'];
            $queryDel = "DELETE FROM users WHERE id = $delId";
            $answer = mysqli_query($db_pract_link, $queryDel);
        }

        $querySelectId = "SELECT id, name FROM users";
        $res = mysqli_query($db_pract_link, $querySelectId);
        for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
        foreach ($data as $elem): ?>
            &ltli> &lt?= $elem['name'] ?> &lta href="?del=&lt?= $elem['id'] ?>">удалить&lt/a>&ltbr />
        &lt?php endforeach
	?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
if (isset($_GET['del'])) {
    $delId = $_GET['del'];
    $queryDel = "DELETE FROM users WHERE id = $delId";
    $answer = mysqli_query($db_pract_link, $queryDel);
}

$querySelectId = "SELECT id, name FROM users";
$res = mysqli_query($db_pract_link, $querySelectId);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
?>
<ul>
    <?php foreach ($data as $elem): ?>

        <li><?= $elem['name'] ?> <a href="?del=<?= $elem['id'] ?>">удалить</a><br />
        <?php endforeach ?>

</ul>


<p class="fw-bold mt-3">Задача 4</p>
<p>Модифицируйте предыдущую задачу так, чтобы у вас был следующий HTML код:</p>
<code>
    <pre>
    &lttable>
    &lttr>
        &ltth>id&lt/th>
        &ltth>name&lt/th>
        &ltth>age&lt/th>
        &ltth>salary&lt/th>
        &ltth>delete&lt/th>
    &lt/tr>
    &lttr>
        &lttd>1&lt/td>
        &lttd>user1&lt/td>
        &lttd>23&lt/td>
        &lttd>400&lt/td>
        &lttd>&lta href="?del=1">удалить&lt/a>&lt/td>
    &lt/tr>
    &lttr>
        &lttd>2&lt/td>
        &lttd>user2&lt/td>
        &lttd>25&lt/td>
        &lttd>500&lt/td>
        &lttd>&lta href="?del=2">удалить&lt/a>&lt/td>
    &lt/tr>
    &lttr>
        &lttd>3&lt/td>
        &lttd>user3&lt/td>
        &lttd>23&lt/td>
        &lttd>500&lt/td>
        &lttd>&lta href="?del=3">удалить&lt/a>&lt/td>
    &lt/tr>
    &lt/table></pre>
</code>


<p class="fw-bold">Решение:</p>
<code>
    <pre>
&lt?php
$querySelect = "SELECT * FROM users";
$res = mysqli_query($db_pract_link, $querySelect);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
$result = "&lttable>";
$heads = array_keys($data[0]);
$result .= "&lttr>";
foreach ($heads as $head) {
    $result .= "&ltth>$head&lt/th>";
}
$result .= "&ltth>delete&lt/th>";
$result .= "&lt/tr>";
foreach ($data as $elem) {
    $result .= "&lttr>";
    $result .="&lttd>$elem[id]&lt/td>";
    $result .="&lttd>$elem[name]&lt/td>";
    $result .="&lttd>$elem[age]&lt/td>";
    $result .="&lttd>$elem[salary]&lt/td>";
    $result .="&lttd>&lta href=\"?del=$elem[id]\">Удалить&lt/a>&lt/td>";
    $result .= "&lt/tr>";
}

$result .= "&lt/table>";
echo $result;?></pre>
</code>

<p class="fw-bold">Результат:</p>
<?php
$querySelect = "SELECT * FROM users";
$res = mysqli_query($db_pract_link, $querySelect);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
$result = "<table>";
$heads = array_keys($data[0]);
$result .= "<tr>";
foreach ($heads as $head) {
    $result .= "<th>$head</th>";
}
$result .= "<th>delete</th>";
$result .= "</tr>";
foreach ($data as $elem) {
    $result .= "<tr>";
    $result .= "<td>$elem[id]</td>";
    $result .= "<td>$elem[name]</td>";
    $result .= "<td>$elem[age]</td>";
    $result .= "<td>$elem[salary]</td>";
    $result .= "<td><a href=\"?del=$elem[id]\">Удалить</a></td>";
    $result .= "</tr>";
}

$result .= "</table>";
echo $result;
?>

<h3 class="fw-bold mt-5">Просмотр данных из БД в PHP</h3>

<p>
    Давайте сделаем страницу show.php, на которой можно будет посмотреть данные юзера, оформленные в определенную верстку.<br />
    Пусть для этого у нас дана следующая верстка:
</p>
<code>
    <pre>
    &ltdiv>
        &lth1>user1&lt/h1>
        &ltp>
            age: &ltspan class="age">23&lt/span>,
            salary: &ltspan class="salary">400&lt/span>
        &lt/p>
    &lt/div></pre>
</code>
<p>Пусть id юзера, которого мы хотим просмотреть, передается через GET параметр с именем id. Получим его в переменную:</p>
<code>
    <pre>
        &lt?php
        $id = $_GET['id'];
        ?></pre>
</code>
<p>Сформируем запрос на получение этого юзера:</p>
<code>
    <pre>
        &lt?php
        $query = "SELECT * FROM users WHERE id=$id";
        ?></pre>
</code>
<p>Выполним запрос:</p>
<code>
    <pre>
        &lt?php
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        ?></pre>
</code>
<p>Запишем данные юзера в переменную:</p>
<code>
    <pre>
        &lt?php
        $user = mysqli_fetch_assoc($result);
        ?></pre>
</code>
<p>Выведем эти данные в нашей верстке:</p>
<code>
    <pre>
    &ltdiv>
        &lth1>&lt?= $user['name'] ?>&lt/h1>
        &ltp>
            age: &ltspan class="age">&lt?= $user['age'] ?>&lt/span>,
            salary: &ltspan class="salary">&lt?= $user['salary'] ?>&lt/span>
        &lt/p>
    &lt/div></pre>
</code>

<p class="fw-bold mt-3">Задача 1</p>
<p>Реализуйте просмотр юзера с помощью следующей верстки:</p>

<pre>
    &ltdiv>
	&ltp>
		имя: &ltspan class="name">user1&lt/span>
	&lt/p>
	&ltp>
		возраст: &ltspan class="age">23&lt/span>,
		зарплата: &ltspan class="salary">400$&lt/span>,
	&lt/p>
    &lt/div></pre>

<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &lt?php
        // file: user/show.php

        &lt?php
        if (isset($_GET['show'])): ?>
        &lt?php
            $host = "MySQL-8.0";
            $user = "root";
            $pass = "";
            $dbname = 'db_pract';
            $db_pract_link = mysqli_connect($host, $user, $pass, $dbname);
            mysqli_query($db_pract_link, "SET NAMES 'utf8'");

            $id = $_GET['show'];
            $queryUserData = "SELECT * FROM users WHERE id = $id";
            $res = mysqli_query($db_pract_link, $queryUserData);
            $data = mysqli_fetch_assoc($res);
            for ($dat = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
        ?>

        &ltdiv>
            &ltp>
                имя: &ltspan class="name">&lt?= $data['name'] ?>&lt/span>
            &lt/p>
            &ltp>
                возраст: &ltspan class="age">&lt?= $data['age'] ?>&lt/span>,
                зарплата: &ltspan class="salary">&lt?= $data['salary'] ?>&lt/span>,
            &lt/p>
        &lt/div>
    &lt?php endif ?>

    &lta href="../index.php">nazad&lt/a>
    ?></pre>
</code>

<p class="fw-bold mt-3">Задача 2</p>
<p>На странице index.php реализуйте вывод ссылок на просмотр каждого из юзеров:</p>
<code>
    <pre>
    &lta href="show.php?id=1">user1&lt/a>
    &lta href="show.php?id=2">user2&lt/a>
    &lta href="show.php?id=3">user3&lt/a>
    </pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="user/show.php?show=1">user1</a>
<a href="user/show.php?show=2">user2</a>
<a href="user/show.php?show=3">user3</a>

<h3 class="fw-bold mt-5">Добавление новой записи в БД на PHP</h3>
<p>Давайте теперь сделаем страницу new.php для добавления нового юзера в нашу базу данных. Сделаем для этого соответствующую форму:</p>
<code>
    <pre>
    &ltform action="" method="POST">
        &ltinput name="name">
        &ltinput name="age">
        &ltinput name="salary">
        &ltinput type="submit">
    &lt/form></pre>
</code>
<p>После отправки формы сохраним ее данные в базу. Для начала поймаем сам момент отправки формы:</p>
<code>
    <pre>
    &lt?php
        if (!empty($_POST)) {
            // тут будет код обработки формы
        }
    ?>    </pre>
</code>
<p>Внутри условия получим наши данные в переменные:</p>
<code>
    <pre>
    &lt?php
        $name = $_POST['name'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];
    ?>    </pre>
</code>

<p>Сформируем запрос на вставку данных:</p>

<code>
    <pre>
    &lt?php
        $query = "INSERT INTO users SET name='$name', age='$age', 
            salary='$salary'"; 
    ?>    </pre>
</code>

<p>Выполним этот запрос:</p>

<code>
    <pre>
    &lt?php
        mysqli_query($link, $query) or die(mysqli_error($link));
    ?>    </pre>
</code>

<p class="fw-bold mt-3">Задача 1</p>
<p>На странице new.php реализуйте форму для добавления нового юзера.</p>
<p class="fw-bold mt-3">Задача 2</p>
<p>Модифицируйте предыдущую задачу так, чтобы после отправки формы значения из нее не удалялись.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    // file: user/new.php

        &lt?php
        if (!empty($_POST)) {
            $host = "MySQL-8.0";
            $user = "root";
            $pass = "";
            $dbname = "db_pract";
            $db_pract_link = mysqli_connect($host, $user, $pass, $dbname);
            mysqli_query($db_pract_link, "SET NAMES 'utf8'");

            $name = $_POST['name'];
            $age = $_POST['age'];
            $salary = $_POST['salary'];
            $query = "INSERT INTO users SET name='$name', age='$age', 
		salary='$salary'";
            mysqli_query($db_pract_link, $query) or die(mysqli_error($db_pract_link));
        }
        ?>

&ltform action="" method="POST">
	&ltlabel for="">Имя:&ltbr />
		&ltinput name="name" value=&lt?= isset($_POST['name']) ? $_POST['name'] : "" ?>>
	&lt/label>&ltbr />
	&ltlabel for="">Возраст:&ltbr />
		&ltinput name="age" value=&lt?= isset($_POST['age']) ? $_POST['age'] : "" ?>>
	&lt/label>&ltbr />
	&ltlabel for="">Зарплата:&ltbr />
		&ltinput name="salary" value=&lt?= isset($_POST['salary']) ? $_POST['salary'] : "" ?>>
	&lt/label>&ltbr />
	&ltinput type="submit">
&lt/form>

&lta href="../index.php">nazad&lt/a>
    </pre>
</code>
<p class="fw-bold">Результат:</p>

<p><a href="user/new.php">Добавить нового пользвателя</a></p>


<h3 class="fw-bold mt-5">Редактирование записи в БД на PHP</h3>
<p>Давайте теперь реализуем редактирование юзера. Для этого нам понадобится две страницы: страница edit.php, на которой будет размещаться форма для редактирования юзера, и страница save.php, на которую форма будет отправляться для последующего сохранения.</p>
<h4 class="fw-bold mt-5">Страница редактирования</h4>
<p>Для начала на странице edit.php сделаем форму:</p>
<code>
    <pre> //file: edit.php
    &ltform action="" method="POST">
        &ltinput name="name">
        &ltinput name="age">
        &ltinput name="salary">
        &ltinput type="submit">
    &lt/form>
    </pre>
</code>
<p>В эту форму мы будем загружать текущее данные юзера из базы данных. Пусть id юзера для редактирования передается в GET параметре:</p>
<code>
    <pre> //file: edit.php
        $id = $_GET['id'];
    </pre>
</code>
<p>Сформируем запрос на получение юзера:</p>
<code>
    <pre> //file: edit.php
        $query = "SELECT * FROM users WHERE id=$id";
    </pre>
</code>
<p>Выполним запрос:</p>
<code>
    <pre> //file: edit.php
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
    </pre>
</code>
<p>Получим данные юзера в переменную:</p>
<code>
    <pre> //file: edit.php
        $user = mysqli_fetch_assoc($result);
    </pre>
</code>
<p>Выведем эти данные в нашей форме:</p>
<code>
    <pre> //file: edit.php
    &ltform method="POST">
        &ltinput name="name" value="&lt?= $user['name']
                                    ?>"> 
        &ltinput name="age" value="&lt?= $user['age'] ?>">
        &ltinput name="salary" value="&lt?= $user['salary']
                                    ?>"> 
        &ltinput type="submit">
    &lt/form>
    </pre>
</code>
<p>Поменяем action формы так, чтобы она отправлялась на страницу save.php:</p>
<code>
    <pre>
        &ltform action="save.php" method="POST">
    </pre>
</code>
<p>При этом GET параметром будем передавать id юзера для редактирования:</p>
<code>
    <pre>
        &ltform action="save.php?id=&lt?= $_GET['id'] ?>" method="POST">
    </pre>
</code>
<h4 class="fw-bold mt-5">Страница редактирования</h4>
<p>На странице save.php получим отправленные данные:</p>
<code>
    <pre>
        &lt?php
        $id = $_GET['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];
        ?>
    </pre>
</code>
<p>Сформируем запрос на обновление:</p>
<code>
    <pre>
        &lt?php
        $query = "UPDATE users SET
		name='$name', age='$age', salary='$salary'
	    WHERE id=$id";
        ?>
    </pre>
</code>
<p>Выполним запрос:</p>
<code>
    <pre>
        &lt?php
        mysqli_query($link, $query) or die(mysqli_error($link));
        ?>
    </pre>
</code>
<p>Вывыдем сообщение об успехе операции:</p>
<code>
    <pre>
        &lt?php
        echo 'юзер успешно изменен!';
        ?>
    </pre>
</code>

<!-- <a href="user/edit.php?id=1">user1</a><br/>
<a href="user/edit.php?id=2">user2</a><br/>
<a href="user/edit.php?id=3">user3</a><br/> -->



<p class="fw-bold mt-3">Задача</p>
<p>На странице index.php выведите на экран список юзеров так, чтобы для каждого юзера была ссылка для его редактирования:</p>
<pre>
    &ltul>
	&ltli>user1 &lta href="?edit=1">edit&lt/a>&lt/li>
	&ltli>user2 &lta href="?edit=2">edit&lt/a>&lt/li>
	&ltli>user3 &lta href="?edit=3">edit&lt/a>&lt/li>
    &lt/ul>   
</pre>


<p class="fw-bold">Решение:</p>
<code>
    <pre>
    //file index.php
    &lt?php
        $res = mysqli_query($db_pract_link, $querySelect);
        for ($data = []; $row = mysqli_fetch_array($res); $data[] = $row);
    ?>
    &ltul>
        &lt?php foreach ($data as $user): ?>
            &ltli>&lt?= $user['name'] ?> &lta href="user/edit.php?id=&lt?= $user['id'] ?>">edit&lt/a>&lt/li>
        &lt?php endforeach ?>
    &lt/ul>

    //file user/edit.php
    &lt?php
    $host = "MySQL-8.0";
    $user = "root";
    $pass = "";
    $dbname = "db_pract";
    $db_pract_link = mysqli_connect($host, $user, $pass, $dbname);
    mysqli_query($db_pract_link, "SET NAMES 'utf8'");


    $id = $_GET['id'];
    $query = "SELECT
                name, age, salary
                FROM users
                WHERE id = $id
            ";
    $res = mysqli_query($db_pract_link, $query);
    $userData = mysqli_fetch_assoc($res);
    ?>
    &ltform action="save.php?id=&lt?= $_GET['id'] ?>" method="POST">
        &ltlabel>Name:&ltbr/>
    &ltinput type="text" name="name" value="&lt?= $userData['name'] ?>">
        &lt/label>&ltbr/>
        &ltlabel>Age:&ltbr/>
    &ltinput type="number" name="age" value="&lt?= $userData['age'] ?>">
        &lt/label>&ltbr/>
        &ltlabel>Salary:&ltbr/>
    &ltinput type="number" name="salary" value="&lt?= $userData['salary'] ?>">
        &lt/label>&ltbr/>
        &ltinput type="submit" >
    &lt/form>

    //file user/save.php
    &lt?php

    $host = "MySQL-8.0";
    $user = "root";
    $pass = "";
    $dbname = "db_pract";
    $db_pract_link = mysqli_connect($host, $user, $pass, $dbname);
    mysqli_query($db_pract_link, "SET NAMES 'utf8'");

    $id = $_GET['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];
    $query = "UPDATE users SET 
        name = '$name', age = '$age', salary = '$salary'
        WHERE id = $id";

    mysqli_query($db_pract_link, $query) or die(mysqli_error($link));
    echo "Данные $name изменены";
    ?>
    &ltbr/>
    &lta href="../index.php">nazad&lt/a></pre>
</code>
<p class="fw-bold">Результат:</p>

<?php
$res = mysqli_query($db_pract_link, $querySelect);
for ($data = []; $row = mysqli_fetch_array($res); $data[] = $row);
?>
<ul>
    <?php foreach ($data as $user): ?>
        <li><?= $user['name'] ?> <a href="user/edit.php?id=<?= $user['id'] ?>">edit</a></li>
    <?php endforeach ?>
</ul>

<p class="fw-bold mt-3">Задача</p>
<p>Реализуйте обработку формы на странице edit2.php.</p>
</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    //file index.php
    &lt?php
        $res = mysqli_query($db_pract_link, $querySelect);
        for ($data = []; $row = mysqli_fetch_array($res); $data[] = $row);
    ?>
    &ltul id="editlist">
        &lt?php foreach ($data as $user): ?>
            &ltli>&lt?= $user['name'] ?> &lta href="user/edit2.php?id=&lt?= $user['id'] ?>">edit&lt/a>&lt/li>
        &lt?php endforeach ?>
    &lt/ul>
    //file edit2.php
    &lt?php
    $host = "MySQL-8.0";
    $user = "root";
    $pass = "";
    $dbname = "db_pract";
    $db_pract_link = mysqli_connect($host, $user, $pass, $dbname);
    mysqli_query($db_pract_link, "SET NAMES 'utf8'");

    if (!isset($_GET['save'])) : ?>
        &lt?php
            $id = $_GET['id'];
            $query = "SELECT
                name, age, salary
                FROM users
                WHERE id = $id
            ";
            $res = mysqli_query($db_pract_link, $query);
            $userData = mysqli_fetch_assoc($res);
        ?>
        &ltform action="?save=&lt?= $id ?>" method="POST">
            &ltlabel>Name:&ltbr />
                &ltinput type="text" name="name" value="&lt?= $userData['name'] ?>">
            &lt/label>&ltbr />
            &ltlabel>Age:&ltbr />
                &ltinput type="number" name="age" value="&lt?= $userData['age'] ?>">
            &lt/label>&ltbr />
            &ltlabel>Salary:&ltbr />
                &ltinput type="number" name="salary" value="&lt?= $userData['salary'] ?>">
            &lt/label>&ltbr />
            &ltinput type="submit">
        &lt/form>
    &lt?php else : ?>
        &lt?php
            $id = $_GET['save'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $salary = $_POST['salary'];
            $query = "UPDATE users SET 
            name = '$name', age = '$age', salary = '$salary'
            WHERE id = $id";

            mysqli_query($db_pract_link, $query) or die(mysqli_error($link));
        ?>
        &ltp>Данные &lt?= $name ?> изменены&lt/p>
        &ltbr />
        &lta href="../index.php#editlist">вернуться&lt/a>

    &lt?php endif ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$res = mysqli_query($db_pract_link, $querySelect);
for ($data = []; $row = mysqli_fetch_array($res); $data[] = $row);
?>
<ul id="editlist">
    <?php foreach ($data as $user): ?>
        <li><?= $user['name'] ?> <a href="user/edit2.php?id=<?= $user['id'] ?>">edit</a></li>
    <?php endforeach ?>
</ul>



<!-- 
    <p class="fw-bold mt-3">Задача 1</p>
    <p>Пусть в корне вашего сайта лежит папка dir, а в ней какие-то текстовые файлы. Выведите на экран столбец имен этих файлов.</p>
    <p class="fw-bold">Решение:</p>
    <p class="fw-bold">Результат:</p>

-->



<!-- 
<h3 class="fw-bold mt-5">Практические задачи</h3>
 -->