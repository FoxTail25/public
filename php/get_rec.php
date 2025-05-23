<p class="mt-5">Вы уже знаете, что при отправке формы методом GET в адресной строке браузера после знака ? появляются данные формы. Эти данные в PHP коде будут доступны в массиве $_GET.
На самом деле наличие формы на страницы является не обязательным - мы можем просто руками написать в адресной строке знак вопроса, после него перечислить параметры с их значениями и нажать энтер.
В этом случае введенные нами данные также будут доступны в массиве $_GET. То есть получится имитация отправки формы. Такая имитация называется отправить GET запрос. Такие слова означают, что мы должны руками вбить в адресную строку вопросик и параметры запроса.
Параметры запроса перечисляются в следующем формате: имя, затем знак равно, затем значение параметра. Если параметров несколько, то они разделяются знаком амперсанд &.
Давайте попробуем на примерах. Пусть у вас есть некоторый PHP файл. Обратитесь к нему в браузере, как вы обычно это делаете. А затем добавьте в конец адресной строки ?par1=1 и нажмите энтер.
В результате наш параметр будет содержаться в $_GET['par1']:</p>

<?php
	// echo $_GET['par1']."<br/>"; // выведет '1'
    // echo '<br/>';
	// echo "num1: ".$_GET['num1']."<br/>"; // выведет '1'
    // echo '<br/>';
	// echo "num2xnum2 ".pow($_GET['num2'], 2)."<br/>"; // выведет '1'
    // echo '<br/>';
	// echo "num2+num2= ".$_GET['num2']+$_GET['num1']."<br/>"; // выведет '1'
    // echo '<br/>';
    // var_dump($_GET);
    // echo '<br/>';
    // if($_GET['num3']== 1) {
    //     echo 'hello 1';
    // } elseif ($_GET['num3']== 2) {
    //     # code..
    //     echo 'bay 2';
    // }
    // echo '<br/>';
    // $arr = ['a', 'b', 'c', 'd', 'e'];
    // echo $arr[$_GET['num4']];

?>

<h3 class="fw-bold mt-5">GET запросы с помощью ссылок в PHP</h3>
<p>В реальном мире, конечно же, пользователи вашего сайта не будут отправлять GET запросы вручную через адресную строку.
Для этого мы будем предоставлять им ссылки, содержащие параметры GET запроса. Пользователи будут переходить по ссылкам и автоматически отправлять GET запросы.
Давайте посмотрим на примерах. При переходе по следующей ссылке мы попадем на страницу index.php, отправив GET параметры:</p>

<code>
    <pre>&lta href="index.php?par1=1&par2=2">ссылка&lt/a></pre>
</code>

<p>Саму страницу в ссылке можно и не указывать, а просто начать адрес со знака ?. В этом случае при переходе по ссылке мы вернемся на текущую страницу, но с GET параметрами в адресной строке. Вот пример:</p>

<code>
    <pre>&lta href="?par1=1&par2=2">ссылка&lt/a></pre>
</code>

<p class="fw-bold">Задача:</p>
<p>Сделайте три ссылки. Пусть первая передает число 1, вторая - число 2, третья - число 3. Сделайте так, чтобы по нажатию на ссылку на экран выводилось ее число.</p>
<p class="fw-bold">Решение:</p>
<p class="fw-bold">Результат:</p>
<code>
    <pre>
    &lta href="?param1=1"> 1 &lt/a>
    &lta href="?param1=2"> 2 &lt/a>
    &lta href="?param1=3"> 3 &lt/a>
    &ltbr/>
    &lta href="?">get reset&lt/a>
    &ltbr/>
    &lt?php
    if(isset($_GET['param1'])){
        echo 'param1= '.$_GET['param1'];
    }
    ?>        
    </pre>
</code>
<p class="fw-bold">Результат:</p>
<a href="?param1=1"> 1 </a>
<a href="?param1=2"> 2 </a>
<a href="?param1=3"> 3 </a>
<br/>
<a href="?">get reset</a>
<br/>
<?php
if(isset($_GET['param1'])){
    echo 'param1= '.$_GET['param1'];
}
?>

<p class="fw-bold">Задача:</p>
<p>Сформируйте в цикле 10 ссылок. Пусть каждая ссылка передает свое число. Сделайте так, чтобы по нажатию на ссылку на экран выводилось ее число.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &lt?php for($i=0; $i&lt10; $i++):?>
    &lta href="?for_num=&lt?=$i?>">&lt?=$i?>&lt/a>
    &lt?php endfor?>

    &lt?php if(isset($_GET['for_num'])) {
        echo "&ltp>$_GET[for_num]&lt/p>"; 
    }?>        
    </pre>
</code>
<p class="fw-bold">Результат:</p>
<?php for($i=0; $i<10; $i++):?>
    <a href="?for_num=<?=$i?>"><?=$i?></a>
    <?php endfor?>
    
    <?php if(isset($_GET['for_num'])) {
        echo "<p>$_GET[for_num]</p>"; 
    }?>

<p class="fw-bold">Задача:</p>
<p>Дан массив: <code><pre>$arr = ['a', 'b', 'c', 'd', 'e'];</pre></code> Сделайте так, чтобы с помощью GET запроса можно было вывести любой элемент этого массива. Для этого с помощью цикла foreach сделайте ссылку для каждого элемента массива.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>&lt?php
        $arr = ['a', 'b', 'c', 'd', 'e'];
    foreach ($arr as $key => $value):?>
        &lta href="?for2_link=&lt?=$key?>">link &lt?=$value?>&lt/a>        
    &lt?php endforeach?>

    &lt?php if(isset($_GET['for2_link'])){
        echo "&ltp>{$arr[$_GET['for2_link']]}&lt/p>";
    }?></pre>
</code>
<p class="fw-bold">Результат:</p>
<?php
    $arr = ['a', 'b', 'c', 'd', 'e'];
    foreach ($arr as $key => $value):?>
<a href="?for2_link=<?=$key?>">link <?=$value?></a>        
<?php endforeach?>

<?php if(isset($_GET['for2_link'])){
    echo "<p>{$arr[$_GET['for2_link']]}</p>";
}?>
    
