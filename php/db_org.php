<style>
    th,
    td {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
        background: gray;
        width: 50px;
    }

    th {
        background: black;
        color: white;
    }

    table {
        caption-side: top;
    }
</style>
<?php
$host = 'MySQL-8.0';
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
require 'func/func.php';
?>
<h3 class="fw-bold mt-5">Связывание таблиц в базах данных</h3>
<p>Пусть у нас есть таблица с именами юзеров и городами, в которых они живут:</p>
<table>
    <thead>

        <tr>
            <th>id</th>
            <th>name</th>
            <th>city</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>user1</td>
            <td>city1</td>
        </tr>
        <tr>
            <td>2</td>
            <td>user2</td>
            <td>city1</td>
        </tr>
        <tr>
            <td>3</td>
            <td>user3</td>
            <td>city2</td>
        </tr>
        <tr>
            <td>4</td>
            <td>user4</td>
            <td>city1</td>
        </tr>
        <tr>
            <td>5</td>
            <td>user5</td>
            <td>city3</td>
        </tr>
        <tr>
            <td>6</td>
            <td>user6</td>
            <td>city2</td>
        </tr>
    </tbody>
</table>
<p>Недостатком этой таблицы является то, что один и тот же город повторяется несколько раз для разных юзеров. Это приводит к некторым проблемам.</p>
<ol>
    <li>Постоянное повторение приводит к том что база начинает занимать намного больше места.</li>
    <li>Достаточно неудобно выполнять операции с городами. К примеру, мы хотим вывести на экран список всех городов. Так просто это сделать не получится.Нам предётся получить всех юзеров вместе с их городами, затем удалить дубли у полученных городов и только тогда мы получим список уникльных городов.</li>
</ol>
<p><i><b>А теперь представим что в нашей базе 10 000 юзеров из 10 городов - ради этих 10 городов, нам предется достать всю таблицу из 10 000 тысяч строк затем обработать её - получится очень медленная операция с бессмысленной тратой ресурсов.</b></i></p>

<h4 class="fw-bold mt-3">Решение проблемы</h4>
<p>Нужно разбить нашу таблицу на 2. В одной будут храниться города, в другой - юзеры. При этом в таблице юзерами будет колонка city_id, которая будет <i>ссылаться</i> на город юзера. Иными словами в ней будут храниться id из таблицы городов.</p>
<p>Рассмотрим это на примере:</p>


<table>
    <caption class="pb-0">cities</caption>
    <tbody>
        <tr>
            <th>id</th>
            <th>city</th>
        </tr>
        <tr>
            <td>1</td>
            <td>city1</td>
        </tr>
        <tr>
            <td>2</td>
            <td>city2</td>
        </tr>
        <tr>
            <td>3</td>
            <td>city3</td>
        </tr>
    </tbody>
</table>
<p class="m-0 mt-3">Таблица с юзерами:</p>
<table>
    <caption class="p0-0">users</caption>
    <tbody>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>city_id</th>
        </tr>
        <tr>
            <td>1</td>
            <td>user1</td>
            <td>1</td>
        </tr>
        <tr>
            <td>2</td>
            <td>user2</td>
            <td>1</td>
        </tr>
        <tr>
            <td>3</td>
            <td>user3</td>
            <td>2</td>
        </tr>
        <tr>
            <td>4</td>
            <td>user4</td>
            <td>1</td>
        </tr>
        <tr>
            <td>5</td>
            <td>user5</td>
            <td>3</td>
        </tr>
        <tr>
            <td>6</td>
            <td>user6</td>
            <td>2</td>
        </tr>
    </tbody>
</table>

<h3 class="fw-bold mt-5">Практические задачи</h3>
<p class="fw-bold mt-3">Задача 1</p>
<p>Пусть вам нужно хранить товары (название, цена, количество) и категории этих товаров. Распишите структуру хранения.</p>
<p class="fw-bold">Решение:</p>
<p>1 Вариант. Создаём 2 таблицы. Первая <i>"Товары"</i> в ней хранится <i>названи, цена и количество</i>. Во второй таблице <i>"категория"</i>хранится <i>категория товара</i></p>
<p>2 Вариант. Создаём 4 таблицы: <i>"Название", "Цена", "Количество", "Категории"</i></p>
<p class="fw-bold mt-3">Задача 2</p>
<p>Пусть вам нужно хранить реки и моря, в которые впадают эти реки. Распишите структуру хранения.</p>
<p class="fw-bold">Решение:</p>
<p>Создаём 2 таблицы. Первая <i>"Моря"</i> Вторая <i>"Реки"</i></p>
<p class="fw-bold mt-3">Задача 3</p>
<p>Пусть вам нужно хранить города и страны, в которых они находятся. Распишите структуру хранения.</p>
<p class="fw-bold">Решение:</p>
<p>Создаём 2 таблицы. Первая <i>"Города"</i> Вторая <i>"Страны"</i></p>

<h3 class="fw-bold mt-5">Получении данных из связанных таблиц в PHP</h3>
<p>Давайте сделаем запрос, который достанет всех юзеров вместе с их городами. <br />Для этого нам понадобится команда:</p>
<h5 class="text-info">LEFT JOIN:</h5>
<p>Ее синтаксис выглядит следующим образом:</p>
<pre>
    <span class="text-warning">SELECT</span> поля <span class="text-warning">FROM</span> имя<span class="text-warning">_</span>таблицы
    <span class="text-warning">LEFT JOIN</span> имя<span class="text-warning">_</span>связанной<span class="text-warning">_</span>таблицы 
    <span class="text-warning">WHERE</span> условие<span class="text-warning">_</span>выборки</pre>
<p>Давайте разберем отдельные части синтаксиса этой команды.</p>

<h3 class="fw-bold mt-5">Поле</h3>
<p>Так как выборка идет из нескольких таблиц, то выборка всех полей через * не будет работать. Следующий запрос выберет поля только из основной таблицы, но не из связанной:</p>
<p><span class="text-warning">SELECT</span> *</p>
<p>Для того, чтобы данные выбирались из всех таблиц, нужно перед * указать имя таблицы для выборки:</p>
<p><span class="text-warning">SELECT</span> users.*, cities.*</p>
<p>Либо можно перечислить нужные нам поля с указанием имени таблицы перед ними:</p>
<p><span class="text-warning">SELECT</span> users.name, cities.name</p>
<p>Эти два способа имеют проблему. Дело в том, что если поля в таблицах имеют одинаковые имена, то в массиве PHP произойдет конфликт имен и победит только одно поле, а второго не будет.<br />
    Для решения проблемы нужно конфликтные имена переименовывать через команду as:</p>
<p><span class="text-warning">SELECT</span> users.name, cities.name as city_name</p>

<h3 class="fw-bold mt-5">Связь</h3>
<p>После команды <i><b>ON</b></i> мы должны указать поля из двух таблиц, по которым осуществляется связь. В нашем случае это будет поле <i><b>id</b></i> из таблицы с городами и поле <i><b>city_id</b></i> из таблицы с юзерами:</p>
<p><span class="text-warning">ON</span> cities.id=users.city_id</p>

<h3 class="fw-bold mt-5">Запрос</h3>
<p>В итоге запрос, который достанет юзеров вместе с их городами будет выглядеть следующим образом:</p>
<pre>
    <span class="text-warning">SELECT</span>
      users.name, cities.name as city_name
    <span class="text-warning">FROM</span>
      users
    <span class="text-warning">LEFT JOIN</span> cities <span class="text-warning">ON</span> cities.id=users.city_<span class="text-warning">_</span>id</pre>


<h3 class="fw-bold mt-5">Практические задачи</h3>

<p class="fw-bold mt-3">Задача 1</p>
<p>Пусть у вас есть таблица с товарами и таблица с их категориями. Напишите запрос, который достанет названия товаров вместе с их категориями.</p>
<p class="fw-bold">Решение:</p>

<p><i>Для начала нам придется снова подключить файл (в котором хранится функция создания таблицы из ответа на SQL-запрос) <b>require 'func/func.php'</b> И снова прописать коннект к базе данных. Вот готовой код:</i></p>
<code>
    <pre>
    &lt?php
    $host = 'MySQL-8.0';
    $user = 'root';
    $pass = '';
    $name = 'mydb';
    $link = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($link, "SET NAMES 'utf8'");
    require 'func/func.php';
    ?>
    </pre>
</code>
<p><i>Теперь нам надо модернизировать функцию создания таблицы из данных sql запроса. В файле func/func.php. Добавим в это файл следующий код:</i></p>
<code>
    <pre>
    function getTableM2($data)
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
        $arrKeys = array_keys($data[1]);
        foreach ($arrKeys as $header) {
            $res .= "&ltth>$header&lt/th>";
        }
        $res .= "&lt/tr>";
        foreach ($data as $row) {
            $res .= "&lttr>";
            foreach($arrKeys as $key) {
                $res .= "&lttd>{$row[$key]}&lt/td>";
            }
            $res .= "&lt/tr>";
        }
        echo $res . "&lt/table>";
    }
    </pre>
</code>
<p><i>Теперь для отображения данных мы будем использовать функцию <b>getTableM2!</b><br />
        Теперь в базе данных mydb. Нам необходимо создать 2 таблицы. В одной (goods) будт храниться товары. В другой (g_category) категории.</i></p>

<p class="mt-2">После этих приготовлений, мы можем выполнить поставленную задачу.</p>
<code>
    <pre>
    &lt?php
        $query = "SELECT
                    goods.name,
                    podcateg.name AS category
                FROM
                    goods
                LEFT JOIN
                    podcateg ON podcateg.id = goods.category_id";
        $res = mysqli_query($link, $query);
        for($data=[];$row = mysqli_fetch_assoc($res);$data[]=$row);
        getTableM2($data);
    ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query = "SELECT
        goods.name,
        podcateg.name AS category
    FROM
        goods
    LEFT JOIN
	    podcateg ON podcateg.id = goods.podcateg_id";
$res = mysqli_query($link, $query);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM2($data);
?>

<h3 class="fw-bold mt-5">Цепочка связанных таблиц</h3>
<p>Пусть теперь юзеры живут в определенных городах, а эти города расположены в разных странах. В таком случае для хранения нам понадобятся уже три таблицы: юзеры будут связаны с городами, а города - со странами. При этом нам не нужно будет поле связи юзеров со странами - ведь юзеры и так будут связаны со странами через связь городов и стран.
    <br />
    Давайте посмотрим на наши таблицы.
</p>
<h6 class="m-0 mt-2">Таблица со странами:</h6>
<table>
    <caption class="pb-0">countries</caption>
    <tbody>
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
        <tr>
            <td>1</td>
            <td>country1</td>
        </tr>
        <tr>
            <td>2</td>
            <td>country2</td>
        </tr>
    </tbody>
</table>
<h6 class="m-0 mt-2">Таблица с городами:</h6>
<table>
    <caption class="pb-0">cities</caption>
    <tbody>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>country_id</th>
        </tr>
        <tr>
            <td>1</td>
            <td>city1</td>
            <td>1</td>
        </tr>
        <tr>
            <td>2</td>
            <td>city2</td>
            <td>1</td>
        </tr>
        <tr>
            <td>3</td>
            <td>city3</td>
            <td>2</td>
        </tr>
    </tbody>
</table>
<h6 class="m-0 mt-2">Таблица с юзерами остаётся неизменной:</h6>
<table>
    <caption class="pb-0">users</caption>
    <tbody>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>city_id</th>
        </tr>
        <tr>
            <td>1</td>
            <td>user1</td>
            <td>1</td>
        </tr>
        <tr>
            <td>2</td>
            <td>user2</td>
            <td>1</td>
        </tr>
        <tr>
            <td>3</td>
            <td>user3</td>
            <td>2</td>
        </tr>
        <tr>
            <td>4</td>
            <td>user4</td>
            <td>1</td>
        </tr>
        <tr>
            <td>5</td>
            <td>user5</td>
            <td>3</td>
        </tr>
        <tr>
            <td>6</td>
            <td>user6</td>
            <td>2</td>
        </tr>
    </tbody>
</table>

<h3 class="fw-bold mt-5">Запросы</h3>
<p>Для того, чтобы достать юзеров вместе с их городами и странами, нам придется сделать два джоина: первый присоединит города к юзерам, а второй - страны к городам:</p>

<pre>
    <span class="text-warning">SELECT</span>
      users.name,
      cities.name as city<span class="text-warning">_</span>name,
      countries.name as country<span class="text-warning">_</span>name
    <span class="text-warning">FROM</span>
      users
    <span class="text-warning">LEFT JOIN</span> cities <span class="text-warning">ON</span> cities.id=users.city<span class="text-warning">_</span>id
    <span class="text-warning">LEFT JOIN</span> countries <span class="text-warning">ON</span> countries.id=cities.country<span class="text-warning">_</span>id</pre>


<h3 class="fw-bold mt-5">Практические задачи</h3>
<p class="fw-bold mt-3">Задача 1</p>
<p>Пусть товары принадлежат определенной подкатегории, а подкатегории принадлежат определенной категории. Распишите структуру хранения.</p>
<p class="fw-bold">Решение:</p>
<p>Всего понадобится 3 таблицы:<br />
    Таблица "Товары", которая состоит из полей <i>id, name, podcateg_id</i><br />
    Таблица "Подкатегории", которая состоит из полей <i>id, name, categ_id</i><br />
    Таблица "Катерогии", которая состоит из полей <i>id, name</i>
</p>
<p class="fw-bold mt-3">Задача 2</p>
<p>Напишите запрос, который достанет товары, вместе с их подкатегориями и категориями.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
        &lt?php
        $query="SELECT
                    goods.name,
                    podcateg.name AS podcateg,
                    category.name AS category
                FROM
                    goods
                LEFT JOIN  podcateg ON podcateg.id = goods.podcateg_id
                LEFT JOIN  category ON category.id = podcateg.category_id";
        $res = mysqli_query($link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
        getTableM2($data);
        ?>
    </pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query = "SELECT
        goods.name,
        podcateg.name AS podcateg,
        category.name AS category
    FROM
        goods
    LEFT JOIN  podcateg ON podcateg.id = goods.podcateg_id
    LEFT JOIN  category ON category.id = podcateg.category_id";
$res = mysqli_query($link, $query);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM2($data);
?>

<p class="fw-bold mt-3">Задача 3</p>
<p>Напишите запрос, который достанет подкатегории вместе с их категориями.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
        &lt?php
        $query = "SELECT
            podcateg.name,
            category.name as cat_name
        FROM
        podcateg
        LEFT JOIN category ON category.id = podcateg.category_id";
        $res = mysqli_query($link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
        getTableM2($data);
        ?>
    </pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query = "SELECT
            podcateg.name,
            category.name as cat_name
        FROM
        podcateg
        LEFT JOIN category ON category.id = podcateg.category_id";
$res = mysqli_query($link, $query);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM2($data);
?>

<h3 class="fw-bold mt-5">Связывание через таблицу связи в PHP</h3>
<p>Пусть теперь юзер был в разных городах. В этом случае таблица с юзерами могла бы иметь следующий вид:</p>


<table>
    <caption>users</caption>
    <tbody>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>city</th>
        </tr>
        <tr>
            <td>1</td>
            <td>user1</td>
            <td>city1, city2, city3</td>
        </tr>
        <tr>
            <td>2</td>
            <td>user2</td>
            <td>city1, city2</td>
        </tr>
        <tr>
            <td>3</td>
            <td>user3</td>
            <td>city2, city3</td>
        </tr>
        <tr>
            <td>4</td>
            <td>user4</td>
            <td>city1</td>
        </tr>
    </tbody>
</table>

<p>Понятно, что так хранить данные неправильно - города нужно вынести в отдельную таблицу. Вот она:</p>

<table>
    <caption>cities</caption>
    <tbody>
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
        <tr>
            <td>1</td>
            <td>city1</td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td>2</td>
            <td>city2</td>
        </tr>
        <tr>
            <td>3</td>
            <td>city3</td>
        </tr>
    </tbody>
</table>

<p>Однако, нам нужно сделать так, чтобы каждый юзер мог ссылаться на несколько городов. С помощью двух таблиц это сделать невозможно.<br />
    Нам понадобится ввести так называемую таблицу связи, которая будет связывать юзера с его городами.<br />
    В каждой записи этой таблицы будет хранится связь между юзером и одним городом. При этом для одного юзера в этой таблице будет столько записей, в скольки городах он был.<br />
    Вот наша таблица связи:</p>

<table>
    <caption>users_cities</caption>
    <tbody>
        <tr>
            <th>id</th>
            <th>user_id</th>
            <th>city_id</th>
        </tr>
        <tr>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
            <td>2</td>
        </tr>
        <tr>
            <td>3</td>
            <td>1</td>
            <td>3</td>
        </tr>
        <tr>
            <td>4</td>
            <td>2</td>
            <td>1</td>
        </tr>
        <tr>
            <td>5</td>
            <td>2</td>
            <td>2</td>
        </tr>
        <tr>
            <td>6</td>
            <td>3</td>
            <td>2</td>
        </tr>
        <tr>
            <td>7</td>
            <td>3</td>
            <td>3</td>
        </tr>
        <tr>
            <td>8</td>
            <td>4</td>
            <td>1</td>
        </tr>
    </tbody>
</table>
<p>Таблица с юзерами будет хранить только имена юзеров, без связей:</p>
<table>
    <caption>users</caption>
    <tbody>
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
        <tr>
            <td>1</td>
            <td>user1</td>
        </tr>
        <tr>
            <td>2</td>
            <td>user2</td>
        </tr>
        <tr>
            <td>3</td>
            <td>user3</td>
        </tr>
        <tr>
            <td>4</td>
            <td>user4</td>
        </tr>
        <tr>
            <td>5</td>
            <td>user5</td>
        </tr>
    </tbody>
</table>

<h3 class="fw-bold mt-5">Запросы</h3>
<p>Давайте сделаем запрос, с помощью которого вытащим юзеров вместе с их городами. Для этого нам понадобится сделать два джоина: первый джоин присоединит к юзерам таблицу связи, а второй джоин по связям присоединит города:</p>


<pre>
    <span class="text-warning">SELECT</span>
      users.name as user_name,
      cities.name as city_name,
    <span class="text-warning">FROM</span>
      user_cities
    <span class="text-warning">LEFT JOIN</span> user_cities <span class="text-warning">ON</span> user_cities.user_id=users.id
    <span class="text-warning">LEFT JOIN</span> cities <span class="text-warning">ON</span> user_cities.city_id=cities.id</pre>

<h3 class="fw-bold mt-5">Результат запроса</h3>
<p>Результат нашего запроса в PHP будет содержать имя каждого юзера столько раз, со скольки городами он связан:</p>

<code>
    <pre>
    &lt?php
        $arr = [
        ['user_name' => 'user1', 'city_name' => 'city1'],
        ['user_name' => 'user1', 'city_name' => 'city2'],
        ['user_name' => 'user1', 'city_name' => 'city3'],
        ['user_name' => 'user2', 'city_name' => 'city1'],
        ['user_name' => 'user2', 'city_name' => 'city2'],
        ['user_name' => 'user3', 'city_name' => 'city2'],
        ['user_name' => 'user3', 'city_name' => 'city3'],
        ['user_name' => 'user4', 'city_name' => 'city1'],
        ];
    ?></pre>
</code>
<p>Удобнее было бы переконвертировать такой массив и превратить его в следующий:</p>

<code>
    <pre>
    &lt?php
        $res = [
            ['user1' => ['city1', 'city2', 'city3']],
            ['user2' => ['city1', 'city2']],
            ['user3' => ['city2', 'city3']],
            ['user4' => ['city1']],
        ];
    ?></pre>
</code>
<p>Напишем код, выполняющий такую конвертацию:</p>


<code>
    <pre>
    &lt?php
        $res = [];
        
        foreach ($data as $elem) {
            $res[$elem['user_name']][] = $elem['city_name'];
        }
        
        var_dump($res);
    ?></pre>
</code>

<p class="fw-bold mt-3">Задача 1</p>
<p>Пусть товар может принадлежать нескольким категориям. Распишите структуру хранения.</p>
<p class="fw-bold">Решение:</p>
<p>Понадобятся 3 таблицы. Таблица с наименование товара. Таблица с наименованием категорий и таблица связи имени товара с категорией товара</p>

<p class="fw-bold mt-3">Задача 2</p>
<p>Напишите запрос, который достанет товары вместе с их категориями.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
        &lt?php
        $host = 'MySQL-8.0';
        $user = 'root';
        $pass = '';
        $dbname = 't_shop';

        $t_shopLink = mysqli_connect($host, $user, $pass, $dbname);
        mysqli_query($t_shopLink, "SET NAMES 'utf8'");

        $query = "SELECT
                product.name as product_name,
                category.name as category_name
        FROM
            product_category
        LEFT JOIN product ON product_category.product_id = product.id
        LEFT JOIN category ON product_category.category_id = category.id";
        $res = mysqli_query($t_shopLink, $query);
        for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
        getTableM2($data);
        ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$host = 'MySQL-8.0';
$user = 'root';
$pass = '';
$dbname = 't_shop';

$t_shopLink = mysqli_connect($host, $user, $pass, $dbname);
mysqli_query($t_shopLink, "SET NAMES 'utf8'");

$query = "SELECT
                product.name as product_name,
                category.name as category_name
        FROM
            product_category
        LEFT JOIN product ON product_category.product_id = product.id
        LEFT JOIN category ON product_category.category_id = category.id";
$res = mysqli_query($t_shopLink, $query);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
getTableM2($data);
?>

<p class="fw-bold mt-3">Задача 3</p>
<p>Выведите полученные данные в виде списка ul так, чтобы в каждой li вначале стояло имя продукта, а после двоеточия через запятую перечислялись категории этого продукта. Примерно так:
    <code>
        <pre>
    &ltul>
        &ltli>product1: category1, category2, category3&lt/li>
        &ltli>product2: category1, category3&lt/li>
        &ltli>product3: category1&lt/li>
    &lt/ul>
        </pre>
    </code>
</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &lt?php
    $query = "SELECT
            product.name as product_name,
            category.name as category_name
    FROM
        product_category
    LEFT JOIN product ON product_category.product_id = product.id
    LEFT JOIN category ON product_category.category_id = category.id";
    $res = mysqli_query($t_shopLink, $query);
    for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
    $result = [];

    foreach ($data as $elem) {
        $result[$elem['product_name']][] = $elem['category_name'];
    }
    ?>
    &ltul>
        &lt?php foreach ($result as $key => $categoryArr): ?>
        &ltli>&lt?= $key ?>: &lt?php foreach ($categoryArr as $category): ?> &lt?= $category ?>,&lt?php endforeach ?>&lt/li>
        &lt?php endforeach ?>
    &lt/ul></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
$query = "SELECT
                product.name as product_name,
                category.name as category_name
        FROM
            product_category
        LEFT JOIN product ON product_category.product_id = product.id
        LEFT JOIN category ON product_category.category_id = category.id";
$res = mysqli_query($t_shopLink, $query);
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
$result = [];

foreach ($data as $elem) {
    $result[$elem['product_name']][] = $elem['category_name'];
}
?>
<ul>
    <?php foreach ($result as $key => $categoryArr): ?>
        <li><?= $key ?>: <?php foreach ($categoryArr as $category): ?> <?= $category ?>,<?php endforeach ?></li>
    <?php endforeach ?>
</ul>


<h3 class="fw-bold mt-5">Родственные связи данных в PHP</h3>
<p>Пусть перед нами стоит задача хранить отцов и сыновей. Пусть каждый отец может иметь только одного сына, а сын в свою очередь тоже может иметь одного сына.<br />
    Нужно придумать, как мы будем хранить данные. Первая идея, которая может прийти в голову - сделать две таблицы: parents для отцов и sons для сыновей. Затем связать эти таблицы каким-нибудь полем: son_id или parent_id.<br />
    Однако, это идея не очень хорошая - ведь один и тот же человек может быть одновременно и отцом и сыном - и придется хранить его в обоих таблицах, а это неудобно, занимает больше место и легко приводит к ошибкам.<br />
    Более хороший вариант - связать таблицу саму с собой: сделаем таблицу users, в ней будем хранить всех юзеров и каждому сделаем поле son_id, в котором будет храниться id сына из этой же таблицы:</p>

<table>
    <caption>users</caption>
    <tbody>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>son_id</th>
        </tr>
        <tr>
            <td>1</td>
            <td>user1</td>
            <td>2</td>
        </tr>
        <tr>
            <td>2</td>
            <td>user2</td>
            <td>3</td>
        </tr>
        <tr>
            <td>3</td>
            <td>user3</td>
            <td>null</td>
        </tr>
    </tbody>
</table>

<h3 class="fw-bold mt-5">Запросы</h3>
<p>Давайте теперь напишем запрос, который достанет юзера вместе с его сыном.<br />
    Для начала давайте просто достанем юзеров:</p>
<code>
    <pre>
    SELECT
        *
    FROM
        users</pre>
</code>
<p>Теперь заджойним к юзерам их сыновей. Джойнить мы будем таблицу саму к себе, поэтому нам нужно выполнить ее переименование:</p>
<code>
    <pre>LEFT JOIN users as sons</pre>
</code>
<p>Теперь мы можем указать связь основой таблицы и переименованной:</p>
<code>
    <pre>LEFT JOIN users as sons ON sons.id=users.son_id</pre>
</code>
<p>Укажем теперь поля:</p>
<code>
    <pre>
    SELECT
	users.name as user_name, sons.name as son_name</pre>
</code>
<p>Соберем все вместе и получим следующий запрос:</p>
<code>
    <pre>
    SELECT
    	users.name as user_name, sons.name as son_name
    FROM
        users
    LEFT JOIN users as sons ON sons.id=users.son_id</pre>
</code>
<h3 class="fw-bold mt-5">Практические задачи</h3>

<p class="fw-bold mt-3">Задача 1</p>
<p>Пусть у нас есть категории. Каждая категория может принадлежать родительской категории, та в свою очередь своей родительской и так далее. Распишите структуру хранения.</p>
<p class="fw-bold">Решение:</p>
<p>все категории записываются в одну таблицу</p>
<!-- 
<p class="fw-bold mt-3">Задача 1</p>
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