<?php
include ("pdf.php");

$pdf_file = "report.pdf";

$html = '<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />';
$html .= '<link href="css/coffeeometer.css" rel="stylesheet" />';
$html .= '<div class="container main">' . $_REQUEST['hidden-html'] . '</div>';

$pdf = new Pdf();
$pdf->load_html($html);
$pdf->render();
$pdf->stream($pdf_file, array("Attachment" => false));