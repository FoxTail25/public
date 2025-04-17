<html lang="ru">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="ps-4">
    <p>На этой странице используется вот такой код:</p>
    <code>
        <pre>
    &lt?php
    session_start();
    if (isset($_GET['surname']) and isset($_GET['name']) and isset($_GET['age'])) {
        $_SESSION['surname'] = $_GET['surname'];
        $_SESSION['name'] = $_GET['name'];
        $_SESSION['age'] = $_GET['age'];
        echo 'данные формы в сессии&ltbr/>';
        echo "
        &ltp>&lta href= \"/session/sess_form_2.php\">Перейти на следующую страниц&lt/a>&lt/p>
        ";
    } ?>
    &lt?php
    if (!(isset($_GET['surname']) and isset($_GET['name']) and isset($_GET['age']))): ?>
    &ltform method="GET">
        &ltp>Заполните вашу фамилию имя и возраст:&lt/p>
        &ltlabel>Фамилия
            &ltbr />
            &ltinput name="surname">
        &lt/label>&ltbr />
        &ltlabel>Имя
            &ltbr />
            &ltinput name="name">
        &lt/label>&ltbr />
        &ltlabel>Возраст
            &ltbr />
            &ltinput name="age">
        &lt/label>
        &ltbr />
        &ltinput type="submit">
    &lt/form>
    &lt?php endif ?>
    </pre>
    </code>

    <?php
    session_start();
    if (isset($_GET['surname']) and isset($_GET['name']) and isset($_GET['age'])) {
        $_SESSION['surname'] = $_GET['surname'];
        $_SESSION['name'] = $_GET['name'];
        $_SESSION['age'] = $_GET['age'];
        echo 'данные формы в сессии<br/>';
        echo "
    <p><a href= \"/session/sess_form_2.php\">Перейти на следующую страниц</a></p>
    ";
    } ?>
    <?php
    if (!(isset($_GET['surname']) and isset($_GET['name']) and isset($_GET['age']))): ?>
        <form method="GET">
            <p>Заполните вашу фамилию имя и возраст:</p>
            <label>Фамилия
                <br />
                <input name="surname">
            </label><br />
            <label>Имя
                <br />
                <input name="name">
            </label><br />
            <label>Возраст
                <br />
                <input name="age">
            </label>
            <br />
            <input type="submit">
        </form>
    <?php endif ?>
</body>

</html>