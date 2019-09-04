<?php

define('FPDF_FONTPATH','font/');
require('../inc/fpdf/html_table.php');

$id = $_GET['id'];

include_once("generate_inguzanyo.php");

$pdf->Output('invoice.pdf', 'I')

?>