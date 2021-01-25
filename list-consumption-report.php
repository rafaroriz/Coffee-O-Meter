<?php
date_default_timezone_set('Brazil/East');

include 'connect.php';
include 'consumption-db.php';

include 'report-variables.php';
include 'report-header.php';
include 'report-consumption-list.php';
include 'report-totals.php';
include 'report-footer.php';
?>

<script src="js/functions/report.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var data = google.visualization.arrayToDataTable([
			['Dia da Semana', 'Quantidade'],
			<?php include 'report-print-chart-data.php'; ?>
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
