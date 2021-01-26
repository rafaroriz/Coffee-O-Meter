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
						<button type="button" name="create-pdf-btn" id="create-pdf-btn" class="btn btn-outline-danger"
						onclick="createPDF();" disabled>Gerar PDF</button>
					</form>
				</div>
			</div>