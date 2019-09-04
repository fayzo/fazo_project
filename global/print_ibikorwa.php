<?php

define('FPDF_FONTPATH','font/');
require('../inc/fpdf/html_table.php');

$act_id = $_GET['act_id'];

include_once("generate_ibikorwa.php");

$pdf->Output('invoice.pdf', 'I')

?>