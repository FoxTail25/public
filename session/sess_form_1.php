<?php
session_start();
if($_GET['surname'] and $_GET['name'] and $_GET['age']){
$_SESSION['surname'] = $_GET['surname'];
$_SESSION['name'] = $_GET['name'];
$_SESSION['age'] = $_GET['age'];
echo 'данные формы в сессии'
} else :?>
<form method="GET">
    <p>Заполните вашу фамилию имя и возраст:</p>
    <label>Фамилия
        <br/>
        <input name="surname">
    </label>
    <label>Имя
        <br/>
        <input name="name">
    </label>
    <label>Возраст
        <br/>
        <input name="age">
    </label>
    <input type="submit">
</form>
    <?php endif?>