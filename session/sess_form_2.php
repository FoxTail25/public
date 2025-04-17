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
        $surName = $_SESSION['surname'];
        $name = $_SESSION['name'];
        $age = $_SESSION['age'];
        ?>
        
        &ltp>Здравствуйте &lt?= $name . ' ' . $surName ?>!&lt/p>
        &ltp>Вам &lt?= $age ?> лет&lt/p>

        &ltp>&lta href="../index.php">Вернуться к учёбе&lt/a>&lt/p>
        </pre>
    </code>
</body>

<?php
session_start();
$surName = $_SESSION['surname'];
$name = $_SESSION['name'];
$age = $_SESSION['age'];
?>
<p>Здравствуйте <?= $name . ' ' . $surName ?>!</p>
<p>Вам <?= $age ?> лет</p>

<p><a href="../index.php">Вернуться к учёбе</a></p>