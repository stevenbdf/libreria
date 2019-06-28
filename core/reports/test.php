<?php
require('plantilla.php');
require('../models/autores.php');

$autor = new Autores;
session_start();
$datos = $autor->readAutores();
ini_set('date.timezone', 'America/El_Salvador');
// Creaci�n del objeto de la clase heredada
$pdf = new PDF('P','mm','letter');
$pdf->setTitulo('Lista de Autores');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',17);
$pdf->Cell(80,30,$_SESSION['correoUsuario'],0,0,'C');
$pdf->Cell(100,30,date('d-m-Y g:i:s'),0,1,'R');
$pdf->SetFont('Arial','',17);
$pdf->SetFillColor(108,180,15);
$pdf->Cell(60,10,utf8_decode('Nombre'),1,0,'C',true);
$pdf->Cell(60,10,utf8_decode('Apellido'),1,0,'C',true);
$pdf->SetFillColor(108,180,15);
$pdf->Cell(60,10,utf8_decode('País'),1,1,'C',true);
$pdf->SetFont('Arial','',12);
foreach($datos as $fila) {
    $pdf->Cell(60,10,utf8_decode($fila['nombre']),1,0,'C');
    $pdf->Cell(60,10,utf8_decode($fila['apellido']),1,0,'C');
    $pdf->Cell(60,10,utf8_decode($fila['pais']),1,1,'C');
}
$pdf->Output();
?>