<p class="fw-bold">Задача 1:</p>
<p>Напишите скрипт, который будет преобразовывать температуру из градусов Цельсия в градусы Фарингейта. Для этого сделайте инпут и кнопку</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &ltp class="fw-bold">Результат:&lt/p>
    &ltform action="">
        &ltp> Введите граду цельсия:&lt/p>
        &ltinput
            name="f1_degrees"
            type="number"
            value="&lt?= $_GET['f1_degrees'] ?? '' ?>">
        &ltinput type="submit" value="Пересчитать в фарингейты">
    &lt/form>

    &lt?php if (isset($_GET['f1_degrees'])) {
        $degreesFar = $_GET['f1_degrees'] * 1.8 + 32;
        echo "&ltp>в градусах фарингейта это будет = $degreesFar";
    } ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
    <p> Введите граду цельсия:</p>
    <input
        name="f1_degrees"
        type="number"
        value="<?= $_GET['f1_degrees'] ?? '' ?>">
    <input type="submit" value="Пересчитать в фарингейты">
</form>

<?php if (isset($_GET['f1_degrees'])) {
    $degreesFar = $_GET['f1_degrees'] * 1.8 + 32;
    echo "<p>в градусах фарингейта это будет = $degreesFar";
} ?>

<p class="fw-bold mt-5">Задача 2:</p>
<p>Напишите скрипт, который будет считать факториал числа. Само число вводится в инпут и после нажатия на кнопку пользователь должен увидеть результат.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &ltform action="">
        &ltp>Введите число для вычисления его факториала:&lt/p>
        &ltinput
            name="f2_number"
            type="number"
            value="&lt?= $_GET['f2_number'] ?? '' ?>">
        &ltinput type="submit" value="Расчитать факториал">
    &lt/form>
    &lt?php if (isset($_GET['f2_number'])) {
        $factorialNum = $_GET['f2_number'];
        $factorial = 1;
        for ($i = 1; $i &lt= $factorialNum; $i++) {
            $factorial *= $i;
        }
        echo "&ltp>Факториал числа $_GET[f2_number]! = $factorial&ltp/>";
    }?></pre>
</code>
<p class="fw-bold">Результат:</p>

<form action="">
    <p>Введите число для вычисления его факториала:</p>
    <input
        name="f2_number"
        type="number"
        value="<?= $_GET['f2_number'] ?? '' ?>">
    <input type="submit" value="Расчитать факториал">
</form>
<?php if (isset($_GET['f2_number'])) {
    $factorialNum = $_GET['f2_number'];
    $factorial = 1;
    for ($i = 1; $i <= $factorialNum; $i++) {
        $factorial *= $i;
    }
    echo "<p>Факториал числа $_GET[f2_number]! = $factorial<p/>";
} ?>

<p class="fw-bold mt-5">Задача 3:</p>
<p>Дан инпут и кнопка. В инпут вводится число. По нажатию на кнопку выведите список делителей этого числа.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &ltform action="">
        &ltp>Введите число для которого необходимо найти делители:&lt/p>
        &ltinput
            name="f3_divider"
            type="number"
            value="&lt?= $_GET['f3_divider'] ?? '' ?>">
        &ltinput type="submit" value="Расчитать делители">
    &lt/form>

    &lt?php if (isset($_GET['f3_divider'])) {
        $num = $_GET['f3_divider'];
        $dividers = '1';
        for ($i = 2; $i &lt= $num; $i++) {
            if ($num % $i == 0) {
                $dividers .= ", $i";
            }
        }
        echo "Делители числа $num:  $dividers";
    }?></pre>
</code>
<p class="fw-bold">Решение:</p>
<form action="">
    <p>Введите число для которого необходимо найти делители:</p>
    <input
        name="f3_divider"
        type="number"
        value="<?= $_GET['f3_divider'] ?? '' ?>">
    <input type="submit" value="Расчитать делители">
</form>

<?php
if (isset($_GET['f3_divider'])) {
    $num = $_GET['f3_divider'];
    $dividers = '1';
    for ($i = 2; $i <= $num; $i++) {
        if ($num % $i == 0) {
            $dividers .= ", $i";
        }
    }
    echo "Делители числа $num:  $dividers";
}
?>

<p class="fw-bold mt-5">Задача 4:</p>
<p>Даны 2 инпута и кнопка. В инпуты вводятся числа. По нажатию на кнопку выведите список общих делителей этих двух чисел.</p>

<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &ltform action="">
        &ltp>Введите числа для которых необходимо найти общие делители:&lt/p>
        &ltlabel for="divider_1">Число 1:&ltbr />
            &ltinput
                id="divider_1"
                name="f4_divider_1"
                type="number"
                value="&lt?= $_GET['f4_divider_1'] ?? '' ?>">
        &lt/label>
        &ltlabel for="divider_2">Число 2:&ltbr />
            &ltinput
                id="divider_2"
                name="f4_divider_2"
                type="number"
                value="&lt?= $_GET['f4_divider_2'] ?? '' ?>">
        &lt/label>
        &ltinput type="submit" value="Расчитать общие делители">
    &lt/form>

    &lt?php if (isset($_GET['f4_divider_1']) and isset($_GET['f4_divider_2'])) {
        function getDivider($num)
        {
            $dividerArr = [];
            for ($i = 1; $i &lt= $num; $i++) {
                if ($num % $i == 0) {
                    $dividerArr[] = $i;
                }
            }
            return $dividerArr;
        }
        $dividersNum_1 = getDivider($_GET['f4_divider_1']);
        $dividersNum_2 = getDivider($_GET['f4_divider_2']);
        $generalDividers = [];
        foreach ($dividersNum_1 as $el) {
            if (array_search($el, $dividersNum_2) > -1) {
                $generalDividers[] = $el;
            }
        }
        echo "Общие делители числа $_GET[f4_divider_1] и $_GET[f4_divider_2]:  " . implode(' ', $generalDividers);
    }?></pre>
</code>
<p class="fw-bold">Решение:</p>
<form action="">
    <p>Введите числа для которых необходимо найти общие делители:</p>
    <label for="divider_1">Число 1:<br />
        <input
            id="divider_1"
            name="f4_divider_1"
            type="number"
            value="<?= $_GET['f4_divider_1'] ?? '' ?>">
    </label>
    <label for="divider_2">Число 2:<br />
        <input
            id="divider_2"
            name="f4_divider_2"
            type="number"
            value="<?= $_GET['f4_divider_2'] ?? '' ?>">
    </label>
    <input type="submit" value="Расчитать общие делители">
</form>

<?php
if (isset($_GET['f4_divider_1']) and isset($_GET['f4_divider_2'])) {
    function getDivider($num)
    {
        $dividerArr = [];
        for ($i = 1; $i <= $num; $i++) {
            if ($num % $i == 0) {
                $dividerArr[] = $i;
            }
        }
        return $dividerArr;
    }
    $dividersNum_1 = getDivider($_GET['f4_divider_1']);
    $dividersNum_2 = getDivider($_GET['f4_divider_2']);
    $generalDividers = [];
    foreach ($dividersNum_1 as $el) {
        if (array_search($el, $dividersNum_2) > -1) {
            $generalDividers[] = $el;
        }
    }
    echo "Общие делители числа $_GET[f4_divider_1] и $_GET[f4_divider_2]:  " . implode(' ', $generalDividers);
}
?>

<p class="fw-bold mt-5">Задача 5:</p>
<p>Даны 3 инпута. В них вводятся числа. Проверьте, что эти числа являются тройкой Пифагора: квадрат самого большого числа должен быть равен сумме квадратов двух остальных.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &ltform action="">
        &ltp>Введит числа для проверки:&lt/p>
        &ltlabel>1е число:&ltbr />
            &ltinput
                name="f5_num1"
                type="number"
                value="&lt?= $_GET['f5_num1'] ?? '' ?>">
        &lt/label>
        &ltlabel>2е число:&ltbr />
            &ltinput
                name="f5_num2"
                type="number"
                value="&lt?= $_GET['f5_num2'] ?? '' ?>">
        &lt/label>
        &ltlabel>3е число:&ltbr />
            &ltinput
                name="f5_num3"
                type="number"
                value="&lt?= $_GET['f5_num3'] ?? '' ?>">
        &lt/label>
        &ltinput type="submit">
    &lt/form>
    &lt?php if(isset($_GET['f5_num1']) and isset($_GET['f5_num2']) and isset($_GET['f5_num3'])) {
        $sortedArr = $_GET;
        $msg1 = 'эти числа';
        $msg2 = 'являются тройкой Пифагора';
        sort($sortedArr, SORT_NUMERIC);
        $answer = pow($sortedArr[2], 2) == pow($sortedArr[1], 2) + pow($sortedArr[0], 2);
        echo $answer ? "Да $msg1 $msg2": "Нет $msg1 не $msg2";
    }?></pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
    <p>Введит числа для проверки:</p>
    <label>1е число:<br />
        <input
            name="f5_num1"
            type="number"
            value="<?= $_GET['f5_num1'] ?? '' ?>">
    </label>
    <label>2е число:<br />
        <input
            name="f5_num2"
            type="number"
            value="<?= $_GET['f5_num2'] ?? '' ?>">
    </label>
    <label>3е число:<br />
        <input
            name="f5_num3"
            type="number"
            value="<?= $_GET['f5_num3'] ?? '' ?>">
    </label>
    <input type="submit">
</form>
<?php
if (isset($_GET['f5_num1']) and isset($_GET['f5_num2']) and isset($_GET['f5_num3'])) {
    $sortedArr = $_GET;
    $msg1 = 'эти числа';
    $msg2 = 'являются тройкой Пифагора';
    sort($sortedArr, SORT_NUMERIC);
    $answer = pow($sortedArr[2], 2) == pow($sortedArr[1], 2) + pow($sortedArr[0], 2);
    echo $answer ? "Да $msg1 $msg2" : "Нет $msg1 не $msg2";
} ?>


<p class="fw-bold mt-5">Задача 6:</p>
<p>Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '01.12.1990'. По нажатию на кнопку выведите на экран сколько дней осталось до дня рождения пользователя.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &ltform action="">
        &ltlabel>
        Введите дату вашего рождения:
            &ltinput 
            name="f6_date"
            type="date"
            value="&lt?=$_GET['f6_date']?? ''?>"
            >
        &lt/label>
        &ltinput type="submit">
    &lt/form>

    &lt?php
    if(isset($_GET['f6_date'])){
        $incomingDate = $_GET['f6_date'];
        $reg = '#(?&ltyear>\d{4})-(?&ltmonth>\d{2})-(?&ltday>\d{2})#';
        preg_match($reg, $incomingDate, $math);
        $now = date('U');
        $birthDay = date('U', mktime(0,0,0, $math['month'], $math['day'], $math['year']));

        if ($now &lt $birthDay){
            echo "День рождения будет в этом году&ltbr/>";
            $day_quantity = ($birthDay - $now) / (60 * 60 * 24);
            echo "Дней осталось: ".round($day_quantity,1);
        } else {
            echo "День рождения будет в следующем году";
            $day_quantity = ($now - $birthDay ) / (60 * 60 * 24);
            echo "Дней осталось: " . (365 - round($day_quantity, 1));
        
        }
    }?></pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
    <label>
        Введите дату вашего рождения:
        <input
            name="f6_date"
            type="date"
            value="<?= $_GET['f6_date'] ?? '' ?>">
    </label>
    <input type="submit">
</form>

<?php
if (isset($_GET['f6_date'])) {
    $incomingDate = $_GET['f6_date'];
    $reg = '#(?<year>\d{4})-(?<month>\d{2})-(?<day>\d{2})#';
    preg_match($reg, $incomingDate, $math);
    $now = date('U');
    $birthDay = date('U', mktime(0, 0, 0, $math['month'], $math['day'], $math['year']));

    if ($now < $birthDay) {
        echo "День рождения будет в этом году<br/>";
        $day_quantity = ($birthDay - $now) / (60 * 60 * 24);
        echo "Дней осталось: " . round($day_quantity, 1);
    } else {
        echo "День рождения будет в следующем году";
        $day_quantity = ($now - $birthDay) / (60 * 60 * 24);
        echo "Дней осталось: " . (365 - round($day_quantity, 1));
    }
} ?>

<p class="fw-bold mt-5">Задача 7:</p>
<p>Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку выведите количество слов и количество символов в тексте.</p>
<p class="fw-bold">Решение</p>
<code>
    <pre>
    &ltform>
        &lttextarea 
        name="f7_ta"
        value="&lt?=$_GET['f7_ta']?? ''?>"
        >&lt/textarea>
        &ltinput type="submit">
    &lt/form>
    &lt?php
    if(isset($_GET['f7_ta'])){
        $message = $_GET['f7_ta'];
        if(strlen($message) == 0){
            $wordQuantity = 0;
        }else {
            $wordQuantity = count(explode(' ',$message));
        }
        $symQyantity = preg_replace('#\s#', '',$message);
        echo $message.'&ltbr/>';
        echo "Количество слов: $wordQuantity &ltbr/>";
        echo "Количество символов: ".strlen($symQyantity)." <br/>";
    }?></pre>
</code>
<p class="fw-bold">Результат:</p>

<form>
    <textarea 
    name="f7_ta"
    value="<?=$_GET['f7_ta']?? ''?>"
    ></textarea>
    <input type="submit">
</form>
<?php
if(isset($_GET['f7_ta'])){
    $message = $_GET['f7_ta'];
    if(strlen($message) == 0){
        $wordQuantity = 0;
    }else {
        $wordQuantity = count(explode(' ',$message));
    }
    $symQyantity = preg_replace('#\s#', '',$message);
    echo $message.'<br/>';
    echo "Количество слов: $wordQuantity <br/>";
    echo "Количество символов: ".strlen($symQyantity)." <br/>";
}?>

<p class="fw-bold mt-5">Задача 8:</p>
<p>Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку нужно посчитать процентное содержание каждого символа в тексте.</p>
<p class="fw-bold">Результат</p>
<form action="">
    <label>Напишите что-нибудь:
        <textarea name="f8_ta"
        value="<?=$_GET['f8_ta']??''?>"></textarea>
    </label>
    <input type="submit" value="расчитать кол-во символов">
</form>

<?php
if(isset($_GET['f8_ta'])){

}?>