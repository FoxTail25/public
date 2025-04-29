<h3 class="fw-bold mt-5">Оформление вывода из базы данных в PHP</h3>
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
    &lt/p>
    &lt/pre>
&lt/code>
<p>Для начала давайте получим массив записей из нашей базы данных:</p>
<code>
    <pre>
    &lt?php
        $query = "SELECT * FROM users";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    ?>
    </pre>
</code>