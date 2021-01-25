function createPDF()
{
	document.getElementById('hidden-html').value = document.getElementById('report-header').innerHTML;
	document.getElementById('hidden-html').value += document.getElementById('report-content').innerHTML;
	document.create_pdf_form.action = 'pdf-creator.php';
	document.create_pdf_form.submit();
}