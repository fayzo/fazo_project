<?php

define('FPDF_FONTPATH','font/');
require('../inc/fpdf/html_table.php');

$akazi_id = $_GET['akazi_id'];

include_once("generate_akazi.php");

$pdf->Output('akazi.pdf', 'I')

?>