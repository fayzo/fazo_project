<?php

session_start();

ob_start();

include_once("../templates/ideni.php");

$invoice_data = ob_get_contents();

ob_end_clean();

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->SetAuthor($show_company['company_name']);
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$logo = '../images/company_logo.jpg';
$pdf->Image ($logo, 11, 11, 150, 0, 'jpeg');
$pdf->WriteHTML("$invoice_data");

?>