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
function getTableM($data)
{
	$res = "<style>
			td,
			th {
				border: 1px solid black;
				padding: 5px;
				text-align: center;
			}
			</style>
			<table>
				<tr>";

	foreach (array_keys($data[0]) as $header) {
		$res .= "<th>$header</th>";
	}

	$res .= "</tr>";
	foreach ($data as $row) {

		$res .= "<tr>";
		isset($row['id']) ? $res .= "<td>$row[id]</td>" : "";
		isset($row['name']) ? $res .= "<td>$row[name]</td>" : "";
		isset($row['age']) ? $res .= "<td>$row[age]</td>" : "";
		isset($row['salary']) ? $res .= "<td>$row[salary]</td>" : "";
		$res .= "</tr>";
	}
	echo $res. "</table>";
}
function getTableM2($data)
{
	$res = "<style>
			td,
			th {
				border: 1px solid black;
				padding: 5px;
				text-align: center;
			}
			</style>
			<table>
				<tr>";
	$arrKeys = array_keys($data[1]);
	foreach ($arrKeys as $header) {
		$res .= "<th>$header</th>";
	}

	$res .= "</tr>";
	foreach ($data as $row) {

		$res .= "<tr>";

		foreach($arrKeys as $key) {
			$res .= "<td>{$row[$key]}</td>";
		}

		$res .= "</tr>";
	}
	echo $res . "</table>";
}
?>