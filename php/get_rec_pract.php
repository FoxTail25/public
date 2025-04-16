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
        name="f7_ta"><?= $_GET['f7_ta'] ?? '' ?></textarea>
    <input type="submit">
</form>
<?php
if (isset($_GET['f7_ta'])) {
    $message = $_GET['f7_ta'];
    if (strlen($message) == 0) {
        $wordQuantity = 0;
    } else {
        $wordQuantity = count(explode(' ', $message));
    }
    $symQyantity = preg_replace('#\s#', '', $message);
    echo $message . '<br/>';
    echo "Количество слов: $wordQuantity <br/>";
    echo "Количество символов: " . strlen($symQyantity) . " <br/>";
} ?>

<p class="fw-bold mt-5">Задача 8:</p>
<p>Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку нужно посчитать процентное содержание каждого символа в тексте.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &ltform action="">
        &ltlabel>Напишите что-нибудь:&ltbr />
            &lttextarea 
            name="f8_ta"
            >&lt?= $_GET['f8_ta'] ?? '' ?>&lt/textarea>
        &lt/label>
        &ltinput type="submit" value="расчитать процентное соотношение каждого символа к общему кол-во символов">
    &lt/form>

    &lt?php
    if (isset($_GET['f8_ta'])) {
        $msg = $_GET['f8_ta'];
        $msglen = mb_strlen($msg); // расчитываем длинну строки с учётом русских символов
        preg_match_all('#[a-zA-Zа-яА-Я0-9\W]{1}#u', $msg, $match); // Находим все символы и кладём их в массив.
        $res = array_unique($match[0]);
        $result = array_fill_keys($res, 0); // Создаём ассоциативный массив в котором ключи - уникальные символы, а значения 0

        foreach ($match[0] as $elem) { // Считаем реальное количество символов
            if (in_array($elem, array_keys($result))) {
                $result[$elem]++;
            }
        }

        foreach ($result as $key => $value) { // Формируем ответ
            $value = ($value / $msglen) *  100;
            $value = round($value, 1);
            echo "Символ '$key': $value%&ltbr/>";
        }
    }
    ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
    <label>Напишите что-нибудь:<br />
        <textarea
            name="f8_ta"><?= $_GET['f8_ta'] ?? '' ?></textarea>
    </label>
    <input type="submit" value="расчитать процентное соотношение каждого символа к общему кол-во символов">
</form>

<?php
if (isset($_GET['f8_ta'])) {
    $msg = $_GET['f8_ta'];
    $msglen = mb_strlen($msg);
    preg_match_all('#[a-zA-Zа-яА-Я0-9\W]{1}#u', $msg, $match);
    $res = array_unique($match[0]);
    $result = array_fill_keys($res, 0);

    foreach ($match[0] as $elem) {
        if (in_array($elem, array_keys($result))) {
            $result[$elem]++;
        }
    }

    foreach ($result as $key => $value) {
        $value = ($value / $msglen) *  100;
        $value = round($value, 1);
        echo "Символ '$key': $value%<br/>";
    }
}
?>

<p class="fw-bold mt-5">Задача 9:</p>
<p>Даны 3 селекта и кнопка. Первый селект - это дни от 1 до 31, второй селект - это месяцы от января до декабря, а третий - это годы от 1990 до 2025. С помощью этих селектов можно выбрать дату. По нажатию на кнопку выведите на экран день недели, соответствующий этой дате.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
&ltform>
    &ltlabel>day :
        &ltselect name="f9_day">
            &lt?php for ($i = 1; $i &lt 32; $i++): ?>
                &ltoption value="&lt?= $i ?>"
                    &lt?= (isset($_GET['f9_day']) and $_GET['f9_day'] == $i) ? 'selected' : '' ?>>&lt?= $i ?>&lt/option>
            &lt?php endfor ?>
        &lt/select>
    &lt/label>
    &ltlabel>month :
        &ltselect name="f9_month">
            &lt?php for ($i = 1; $i &lt 13; $i++): ?>
                &ltoption value="&lt?= $i ?>"
                    &lt?= (isset($_GET['f9_day']) and $_GET['f9_month'] == $i) ? 'selected' : '' ?>>&lt?= $i ?>&lt/option>
            &lt?php endfor ?>
        &lt/select>
    &lt/label>
    &ltlabel>year :
        &ltselect name="f9_year">
            &lt?php for ($i = 2025; $i > 1989; $i--): ?>
                &ltoption value="&lt?= $i ?>"
                    &lt?= (isset($_GET['f9_day']) and $_GET['f9_year'] == $i) ? 'selected' : '' ?>>&lt?= $i ?>&lt/option>
            &lt?php endfor ?>
        &lt/select>
    &lt/label>
    &ltinput type="submit">
&lt/form>
&lt?php if (isset($_GET['f9_day']) and isset($_GET['f9_month']) and isset($_GET['f9_year'])) {
    $mkdate =  mktime(0, 0, 0, $_GET['f9_month'], $_GET['f9_day'], $_GET['f9_year']);
    $weekDayEn = date('l', $mkdate);
    $weekDayNum = date('w', $mkdate);
    $weekDayArr = ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"];
    echo "&ltp> ".date("d-m-Y", $mkdate)." был: $weekDayArr[$weekDayNum] ($weekDayEn)&ltp/>";
} ?>
    </pre>
</code>
<p class="fw-bold">Результат:</p>
<form>
    <label>day :
        <select name="f9_day">
            <?php for ($i = 1; $i < 32; $i++): ?>
                <option value="<?= $i ?>"
                    <?= (isset($_GET['f9_day']) and $_GET['f9_day'] == $i) ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor ?>
        </select>
    </label>
    <label>month :
        <select name="f9_month">
            <?php for ($i = 1; $i < 13; $i++): ?>
                <option value="<?= $i ?>"
                    <?= (isset($_GET['f9_day']) and $_GET['f9_month'] == $i) ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor ?>
        </select>
    </label>
    <label>year :
        <select name="f9_year">
            <?php for ($i = 2025; $i > 1989; $i--): ?>
                <option value="<?= $i ?>"
                    <?= (isset($_GET['f9_day']) and $_GET['f9_year'] == $i) ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor ?>
        </select>
    </label>
    <input type="submit">
</form>
<?php if (isset($_GET['f9_day']) and isset($_GET['f9_month']) and isset($_GET['f9_year'])) {
    $mkdate =  mktime(0, 0, 0, $_GET['f9_month'], $_GET['f9_day'], $_GET['f9_year']);
    $weekDayEn = date('l', $mkdate);
    $weekDayNum = date('w', $mkdate);
    $weekDayArr = ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"];
    echo "<p> " . date("d-m-Y", $mkdate) . " был: $weekDayArr[$weekDayNum] ($weekDayEn)<p/>";
} ?>

<p class="fw-bold mt-5">Задача 10:</p>
<p>Сделайте скрипт-гороскоп. Внутри него хранится массив гороскопов на несколько дней вперед для каждого знака зодиака. По заходу на страницу спросите у пользователя дату рождения, определите его знак зодиака и выведите предсказание для этого знака зодиака на текущий день.</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &ltform>
        &ltinput name="f10_date"
            type="date"
            value="&lt?= $_GET['f10_date'] ?? '' ?>">
        &ltinput type="submit">
    &lt/form>
    &lt?php
    $horoscopeDates = [
        ['21.03', '19.04', "Овен", '&#9800;'], 
        ['20.04', '20.05', "Телец", '&#9801;'], 
        ['21.05', '20.06', "Близнецы", '&#9802;'], 
        ['21.06', '22.07', "Рак", '&#9803;'], 
        ['23.07', '22.08', "Лев", '&#9804;'], 
        ['23.08', '22.09', "Дева", '&#9805;'], 
        ['23.09', '22.10', "Весы", '&#9806;'], 
        ['23.10', '21.11', "Скорпион", '&#9807;'], 
        ['22.11', '21.12', "Стрелец", '&#9808;'], 
        ['22.12', '19.01', "Козерог", '&#9809;'], 
        ['20.01', '18.02', "Водолей", '&#9810;'], 
        ['19.02', '20.03', "Рыбы", '&#9811;']
        ]; //формируем массив с гороскопом
    if (isset($_GET['f10_date'])) {
        $birthYear = preg_replace('#(\d{4})-(\d{2})-(\d{2})#', '\1', $_GET['f10_date']); // Вычисляем год рождения
        $incomingDate = strtotime($_GET['f10_date']); //из входящей даты получаем метку времени
        for ($i = 0; $i &lt count($horoscopeDates); $i++) { // перебираем массив дат гороскопа
            $start = $horoscopeDates[$i][0] .".".$birthYear;
            $s_start = preg_replace('#(\d{2})-(\d{2})-(\d{4})#', '\3-\1-\2', $start); // вычисляем метку времени начала действия даты зодиака
            if($incomingDate > strtotime($s_start)) { // если указанная 
                пользователем дата, больше чем начало действия даты знака гороскопа. 
                То вычисляем дату окончания действия знака зодиака
                $end = $horoscopeDates[$i][1] .".".$birthYear;
                $s_end = preg_replace('#(\d{2})-(\d{2})-(\d{4})#', '\3-\1-\2', $end);
                if($incomingDate &lt strtotime($s_end)){ // Если указанноя пользователем
                    дата меньше окончания действия знака зодиака, то выводим
                    сообщение и останавливем цикл.
                    echo "Ваш знак зодиака ".$horoscopeDates[$i][3] .$horoscopeDates[$i][2];
                    return;
                }
            } 
        }
    }
    ?></pre>
</code>
<p class="fw-bold">Результат:</p>
<p>Укажите дату своего рождения</p>
<form>
    <input name="f10_date"
        type="date"
        value="<?= $_GET['f10_date'] ?? '' ?>">
    <input type="submit">
</form>
<?php
$horoscopeDates = [['21.03', '19.04', "Овен", '&#9800;'], ['20.04', '20.05', "Телец", '&#9801;'], ['21.05', '20.06', "Близнецы", '&#9802;'], ['21.06', '22.07', "Рак", '&#9803;'], ['23.07', '22.08', "Лев", '&#9804;'], ['23.08', '22.09', "Дева", '&#9805;'], ['23.09', '22.10', "Весы", '&#9806;'], ['23.10', '21.11', "Скорпион", '&#9807;'], ['22.11', '21.12', "Стрелец", '&#9808;'], ['22.12', '19.01', "Козерог", '&#9809;'], ['20.01', '18.02', "Водолей", '&#9810;'], ['19.02', '20.03', "Рыбы", '&#9811;']];
if (isset($_GET['f10_date'])) {
    $birthYear = preg_replace('#(\d{4})-(\d{2})-(\d{2})#', '\1', $_GET['f10_date']);
    $incomingDate = strtotime($_GET['f10_date']);
    for ($i = 0; $i < count($horoscopeDates); $i++) {
        $start = $horoscopeDates[$i][0] .".".$birthYear;
        $s_start = preg_replace('#(\d{2})-(\d{2})-(\d{4})#', '\3-\1-\2', $start);
        if($incomingDate > strtotime($s_start)) {
            $end = $horoscopeDates[$i][1] .".".$birthYear;
            $s_end = preg_replace('#(\d{2})-(\d{2})-(\d{4})#', '\3-\1-\2', $end);
            if($incomingDate < strtotime($s_end)){
                echo "Ваш знак зодиака ".$horoscopeDates[$i][3] .$horoscopeDates[$i][2];
                return;
            }
        } 
    }
}
?>
