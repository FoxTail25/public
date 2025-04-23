<?php
function getScuare($num){
	return pow($num, 2);
}
function getQube($num){
	return pow($num, 3);
}

function getTable($data){
	$res = "<style>
	td,
	th {
		border: 1px solid black;
		padding: 5px;
		text-align: center;
	}
</style>
<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>age</th>
		<th>salary</th>
	</tr>";
	foreach ($data as $row) {

		$res .="<tr>";
		$res .= "<td>$row[id]</td>";
		$res .= "<td>$row[name]</td>";
		$res .= "<td>$row[age]</td>";
		$res .= "<td>$row[salary]</td>";
		$res .= "</tr>";
	}
	$res .= "</table>";
	return $res;
}
?>