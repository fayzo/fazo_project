<?php

define('FPDF_FONTPATH','font/');
require('../inc/fpdf/html_table.php');

$query_from = $_POST['query_from'];
$query_to = $_POST['query_to'];

include_once("generate_incomes.php");

$pdf->Output('iyinjiye.pdf', 'I')

?>