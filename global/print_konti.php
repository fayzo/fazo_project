<?php

define('FPDF_FONTPATH','font/');
require('../inc/fpdf/html_table.php');

$item_id = $_GET['item_id'];

include_once("generate_konti.php");

$pdf->Output('invoice.pdf', 'I')

?>