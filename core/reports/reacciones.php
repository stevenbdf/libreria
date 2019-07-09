<?php
require('plantilla.php');

require('../models/productos.php');

$producto = new Productos;


// Creación del objeto de la clase heredada
$nombre = $producto->getNombreL((int)$_GET['idLibro']);
$pdf = new PDF('P', 'mm', 'letter');
$pdf->setTitulo(utf8_decode('Reaciones por libro'));
$pdf->mostrarAutor();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Cell(0, 15, utf8_decode('Libros filtrados por libro ').$nombre['NombreL'], 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 15, 'LIKES', 0, 1, 'C');
llenarLikes($pdf, $producto);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 15, 'DISLIKES', 0, 1, 'C');
llenarDislikes($pdf, $producto);
$pdf->Output();

function llenarLikes($pdf, $producto)
{
    $datos = $producto->getProducto( (int)$_GET['idLibro']);
    var_dump($datos);
    $pdf->SetFont('Arial', '', 14);
    if (!empty($datos)) {
        $pdf->SetFillColor(94, 114, 228);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(40, 10, utf8_decode('Código'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, utf8_decode('Like'), 1, 0, 'C', true);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0);
        foreach ($datos as $fila) {
            $pdf->Cell(40, 10, utf8_decode($fila['idLibro']), 1, 0, 'C');
            $pdf->Cell(60, 10, utf8_decode($fila['likes']), 1, 0, 'L');
        }
    } else {
        $pdf->Cell(0, 15, 'SIN LIKES EN ESTE LIBRO', 0, 1, 'C');
    }
    unset($datos);
    $pdf->SetFont('Arial', 'B', 14);
}


function llenarDislikes($pdf, $producto)
{
    $datos = $producto->getProducto((int) $_GET['idLibro']);
    $pdf->SetFont('Arial', '', 14);
    if (!empty($datos)) {
        $pdf->SetFillColor(94, 114, 228);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(40, 10, utf8_decode('Código'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, utf8_decode('Dislike'), 1, 0, 'C', true);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0);
        foreach ($datos as $fila) {
            $pdf->Cell(40, 10, utf8_decode($fila['idLibro']), 1, 0, 'C');
            $pdf->Cell(60, 10, utf8_decode($fila['dislikes']), 1, 0, 'L');
        }
    } else {
        $pdf->Cell(0, 15, 'SIN DISLIKES EN ESTE LIBRO', 0, 1, 'C');
    }
    unset($datos);
    $pdf->SetFont('Arial', 'B', 14);
}
