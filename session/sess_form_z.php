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
    if (isset($_GET['name']) and isset($_GET['age']) and isset($_GET['salary']) and isset($_GET['elseone'])) {
        $_SESSION['formData'] = [
            'name' => $_GET['name'],
            'age' => $_GET['age'],
            'salary' => $_GET['salary'],
            'elseone' => $_GET['elseone']
        ];

        echo 'данные формы в сессии&ltbr/>';
        echo "&ltp>&lta href= \"/session/sess_form_z2.php\">Перейти на следующую страниц&lt/a>&lt/p>";
    } ?>
    &lt?php
    if (!(isset($_GET['name']) and isset($_GET['age']) and isset($_GET['salary']) and isset($_GET['elseone']))): ?>
        &ltform method="GET">
            &ltp>Заполните вашу имя, возраст, зарплату и ещё что-нибудь:&lt/p>
            &ltlabel>Имя
                &ltbr />
                &ltinput name="name">
            &lt/label>&ltbr />
            &ltlabel>Возраст
                &ltbr />
                &ltinput name="age">
            &lt/label>&ltbr />
            &ltlabel>Зарплата
                &ltbr />
                &ltinput name="salary">
            &lt/label>&ltbr />
            &ltlabel>Ещё что-нибудь...
                &ltbr />
                &ltinput name="elseone">
            &lt/label>&ltbr />
            &ltinput type="submit">
        &lt/form>
    &lt?php endif ?>
    </pre>
    </code>

    <?php
    session_start();
    if (isset($_GET['name']) and isset($_GET['age']) and isset($_GET['salary']) and isset($_GET['elseone'])) {
        $_SESSION['formData'] = [
            'name' => $_GET['name'],
            'age' => $_GET['age'],
            'salary' => $_GET['salary'],
            'elseone' => $_GET['elseone']
        ];

        echo 'данные формы в сессии<br/>';
        echo "<p><a href= \"/session/sess_form_z2.php\">Перейти на следующую страниц</a></p>";
    } ?>
    <?php
    if (!(isset($_GET['name']) and isset($_GET['age']) and isset($_GET['salary']) and isset($_GET['elseone']))): ?>
        <form method="GET">
            <p>Заполните вашу имя, возраст, зарплату и ещё что-нибудь:</p>
            <label>Имя
                <br />
                <input name="name">
            </label><br />
            <label>Возраст
                <br />
                <input name="age">
            </label><br />
            <label>Зарплата
                <br />
                <input name="salary">
            </label><br />
            <label>Ещё что-нибудь...
                <br />
                <input name="elseone">
            </label><br />
            <input type="submit">
        </form>
    <?php endif ?>
</body>

</html>