<?php
session_start();
if(isset($_SESSION['flash'])):?>
<div style="border: 1px solid red; padding: 5px; margin: 5px; text-align:center;"><?=$_SESSION['flash']?></div>
<?php unset($_SESSION['flash']);
endif?>
<p>
	При переходе на эту страницу первый раз отобразится приветствие, реалезованное через flash сообщение.<br/>
	Если обновить эту страницу, то сообщени исчезнет.
</p>
<a href="../index.php#flash">назад</a>