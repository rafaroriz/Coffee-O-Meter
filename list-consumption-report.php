<?php
date_default_timezone_set('Brazil/East');

include 'connect.php';
include 'consumption-db.php';

$total_price = 0;
$total_qty = 0;
$total_cups = 0;
$today = date('d/m/Y H:i:s');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Coffee-O-Meter</title>
		<meta charset="utf-8">
		<link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
		<link href="css/coffeeometer.css" rel="stylesheet" />
	</head>

	<body>
		<div class="container main">
			<div class="row">
				<div class="col" id="report-header">
					<h4>Relatório de consumo em <?=$today?></h4>
					<br/>
				</div>
				<div class="col-2">
					<form name="create_pdf_form" method="post" action="">
						<input type="hidden" name="hidden-html" id="hidden-html" value="" />
						<button type="button" name="create-pdf-btn" class="btn btn-outline-danger" onclick="createPDF();">Gerar PDF</button>
					</form>
				</div>
			</div>

			<div id="report-content">
				<table class="table">
					<tr>
						<th>Data</th>
						<th>Hora</th>
						<th>Dia</th>
						<th>Café</th>
						<th>Qtd</th>
						<th>Preço</th>
					</tr>
					<?php
					$consumption = listConsumption($conn);
					foreach ($consumption as $entry)
					{
						$total_price += $entry['price'];
						$total_qty += $entry['qty'];
						$total_cups++;

						$mili_qty = $entry["qty"];
						$liter_qty = $mili_qty / 1000;
						$formated_qty = ($liter_qty < 1) ? "{$mili_qty}ml" : "{$liter_qty}l";
					?>
						<tr>
							<td><?=$entry['date']?></td>
							<td><?=$entry['hour']?></td>
							<td><?=$entry['week_day']?></td>
							<td><?=$entry['coffee_name']?></td>
							<td><?=$formated_qty?></td>
							<td>R$ <?=number_format($entry['price'],2,',','.')?></td>
						</tr>
					<?php
					}

					$liter_total = $total_qty / 1000;
					$formated_total = ($liter_total < 1) ? "{$total_qty}ml" : "{$liter_total}l";
					?>
				</table>
				<br/>
				<h4>Totais</h4>
				<br/>
				<table class="table">
					<tr>
						<th>Cafés</th>
						<th>Quantidade</th>
						<th>Preço</th>
					</tr>
					<tr>
						<td><?=$total_cups?></td>
						<td><?=$formated_total?></td>
						<td>R$ <?=number_format($total_price,2,',','.')?></td>
					</tr>
				</table>
				<div id="piechart" style="width: 900px; height: 500px;"></div>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var data = google.visualization.arrayToDataTable([
			['Dia da Semana', 'Quantidade'],
			<?php
			$week_day_consumption = listConsumptionByWeekDay($conn);
			foreach ($week_day_consumption as $consumption)
			{
				$day = $consumption['week_day'];
				$qty = $consumption['qty'];
				echo "['{$day} ({$qty})', {$qty}],";
			}
			?>
		]);

		var options = {
			title: 'Cafés por dia da semana',
			is3D: true
		};

		var chart_area = document.getElementById('piechart');
		var chart = new google.visualization.PieChart(chart_area);

		google.visualization.events.addListener(chart, 'ready', function()
		{
			chart_area.innerHTML = '<img src="' + chart.getImageURI() + '">';
		});

		chart.draw(data, options);
	}
</script>

<script>
function createPDF()
{
	document.getElementById('hidden-html').value = document.getElementById('report-header').innerHTML;
	document.getElementById('hidden-html').value += document.getElementById('report-content').innerHTML;
	document.create_pdf_form.action = 'pdf-creator.php';
	document.create_pdf_form.submit();
}
</script>