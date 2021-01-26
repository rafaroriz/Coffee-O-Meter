<?php
date_default_timezone_set('Brazil/East');

include 'connect.php';
include 'consumption-db.php';

include 'report-variables.php';
include 'report-header.php';
include 'report-consumption-table.php';
include 'report-totals-table.php';
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
			chartArea:{left:'20%',top:80,width:'75%',height:'100%'},
			title: 'Cafés por dia da semana',
			fontSize: 18,
			legend: {alignment:'center', textStyle: {fontSize: 16, italic:true}},
			colors: ['#4d7583', '#705d6a', '#904853', '#bb2c36', '#e90e16',
					'#870f0f', '#400000', '#27343c', '#2f5156', '#6fa3a7'],
			is3D: true
		};

		var chart_area = document.getElementById('piechart');
		var chart = new google.visualization.PieChart(chart_area);

		google.visualization.events.addListener(chart, 'ready', function()
		{
			document.getElementById('create-pdf-btn').disabled = false;
			chart_area.innerHTML = '<img src="' + chart.getImageURI() + '">';
		});

		chart.draw(data, options);
	}
</script>
