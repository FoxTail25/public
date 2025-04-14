<p class="fw-bold">Задача:</p>
<p>Напишите скрипт, который будет преобразовывать температуру из градусов Цельсия в градусы Фарингейта. Для этого сделайте инпут и кнопку</p>
<p class="fw-bold">Решение:</p>
<code>
    <pre>
    &ltform action="">
    &ltlabel for="">
        Введите граду цельсия: &ltbr/>
        &ltinput 
        name="f1_degrees" 
        type="number"
        value="&lt?= $_GET['f1_degrees'] ?? '' ?>">
        &ltinput type="submit" value="Пересчитать в фарингейты">
    &lt/label>    
    &lt/form>

    &lt?php 
    if(isset($_GET['f1_degrees'])) {
        $degreesFar = $_GET['f1_degrees'] * 1.8 + 32;
        echo "&ltp>в градусах фарингейта это будет = $degreesFar";
    }?></pre>
</code>
<p class="fw-bold">Результат:</p>
<form action="">
<label for="">
    Введите граду цельсия: <br/>
    <input 
    name="f1_degrees" 
    type="number"
    value="<?= $_GET['f1_degrees'] ?? '' ?>">
    <input type="submit" value="Пересчитать в фарингейты">
</label>    
</form>

<?php 
if(isset($_GET['f1_degrees'])) {
    $degreesFar = $_GET['f1_degrees'] * 1.8 + 32;
    echo "<p>в градусах фарингейта это будет = $degreesFar";
}
?>

<p class="fw-bold mt-5">Задача:</p>
<p>Напишите скрипт, который будет считать факториал числа. Само число вводится в инпут и после нажатия на кнопку пользователь должен увидеть результат.</p>