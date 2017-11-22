<?php

if (!file_exists('fpdf.php')) {
    echo " Place fpdf.php file in this directory before using this page. ";
    exit;
}

if (!file_exists('font')) {
    echo " Place font directory in this directory before using this page. ";
    exit;
}

//require('../utils/fpdf/font/');
require('../../utils/fpdf/fpdf.php');
require('../../database/Connection.php');

$database = new Connection();
$db = $database->openConnection();

$count = "select * from student LIMIT 0,10"; // SQL to get 10 records

$pdf = new FPDF();
$pdf->AddPage();

$width_cell = array(20, 50, 40, 40, 40);
$pdf->SetFont('Arial', 'B', 16);

$pdf->SetFillColor(193, 229, 252); // Background color of header
// Header starts /// 
$pdf->Cell($width_cell[0], 10, 'ID', 1, 0, 'C', true); // First header column
$pdf->Cell($width_cell[1], 10, 'NAME', 1, 0, 'C', true); // Second header column
$pdf->Cell($width_cell[2], 10, 'CLASS', 1, 0, 'C', true); // Third header column
$pdf->Cell($width_cell[3], 10, 'MARK', 1, 0, 'C', true); // Fourth header column
$pdf->Cell($width_cell[4], 10, 'SEX', 1, 1, 'C', true); // Third header column

//// header ends ///////

$pdf->SetFont('Arial', '', 14);
$pdf->SetFillColor(235, 236, 236); // Background color of header
$fill = false; // to give alternate background fill color to rows

/// each record is one row  ///
foreach ($db->query($count) as $row) {
    $pdf->Cell($width_cell[0], 10, $row['id'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[1], 10, $row['name'], 1, 0, 'L', $fill);
    $pdf->Cell($width_cell[2], 10, $row['class'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[3], 10, $row['mark'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[4], 10, $row['sex'], 1, 1, 'C', $fill);
    $fill = !$fill; // to give alternate background fill  color to rows
}
/// end of records /// 

$pdf->Output();

?>
