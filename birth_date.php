<?php if ($_POST) {
     $year = $_POST['year'];
     $month = $_POST['month'];
     $day = $_POST['day'];
     $weekDayN = date('w', mktime(0, 0, 0, $month, $day, $year));
     $weekDayW = date('l', mktime(0, 0, 0, $month, $day, $year));
     $weekDayNameRu = ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"];
     $weekDayWRu = $weekDayNameRu[$weekDayN];

     echo 'День недели: ' .$_POST['day'] . '-' . $_POST['month'] . '-' . $_POST['year'] . " был".'<br/>';
     echo 'Номер дня: '. $weekDayN . '<br/>';
     echo 'Английское название: ' . $weekDayW . '<br/>';
     echo 'Русское название: ' . $weekDayWRu . '<br/>';
}
