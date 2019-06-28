<?php
require('plantilla.php');
require('../models/autores.php');

$autor = new Autores;
$datos = $autor->readAutores();
// Creación del objeto de la clase heredada
$pdf = new PDF('P', 'mm', 'letter');
$pdf->setTitulo('Lista de Autores');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 14);
$pdf->SetFillColor(94, 114, 228);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(65, 10, utf8_decode('Nombre'), 1, 0, 'C', true);
$pdf->Cell(65, 10, utf8_decode('Apellido'), 1, 0, 'C', true);
$pdf->Cell(65, 10, utf8_decode('País'), 1, 1, 'C', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);
foreach ($datos as $fila) {
    $pdf->Cell(65, 10, utf8_decode($fila['nombre']), 1, 0, 'C');
    $pdf->Cell(65, 10, utf8_decode($fila['apellido']), 1, 0, 'C');
    $pdf->Cell(65, 10, utf8_decode($fila['pais']), 1, 1, 'C');
}
$pdf->Output();
