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
        $formArr = $_SESSION['formData'];
        foreach ($formArr as $key => $formElem): ?>
        &ltul>
            &ltli>&lt?= $key . ": " . $formElem ?>&lt/li>
        &lt/ul>
        &lt?php endforeach ?>
        </pre>
    </code>
</body>

<?php
session_start();
$formArr = $_SESSION['formData'];
foreach ($formArr as $key => $formElem): ?>
    <ul>
        <li><?= $key . ": " . $formElem ?></li>
    </ul>
<?php endforeach ?>

<p><a href="../index.php">Вернуться к учёбе</a></p>