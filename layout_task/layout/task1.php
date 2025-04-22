<?php
$arrWeekDay = ["пн", "вт", "ср", "чт", "пт", "сб", "вс"];
?>
<select>
	<?php foreach ($arrWeekDay as $key => $day) : ?>
		<option value="<?= $key ?>"><?= $day ?></option>
	<?php endforeach ?>
</select>