<?php
include 'connect.php';
include 'consumption-db.php';

include('user.php');
include 'validate-user-access.php';

$sheet_file = "my-consumption.xls";

$html = "<meta charset='utf-8'>";
$html .= "<table border='1'>
			<tr>
				<td>Data</td>
				<td>Hora</td>
				<td>Dia</td>
				<td>Café</td>
				<td>Qtd</td>
				<td>Preço</td>
			</tr>";

		$consumption = listConsumption($conn);
		foreach ($consumption as $entry)
		{
			$html .= "<tr>
						<td>{$entry['date']}</td>
						<td>{$entry['hour']}</td>
						<td>{$entry['week_day']}</td>
						<td>{$entry['coffee_name']}</td>
						<td>{$entry['qty']}</td>
						<td>{$entry['price']}</td>
					</tr>";
		}
$html .= "</table>";

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=" . $sheet_file);
header("Content-Description: Dados gerados via PHP.");

echo $html;
?>