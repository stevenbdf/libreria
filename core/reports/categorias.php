<?php
require('plantilla.php');

require('../models/productos.php');

$producto = new Productos;


// Creación del objeto de la clase heredada
$nombre = $producto->getNombre((int)$_GET['idCategoria']);
$pdf = new PDF('P', 'mm', 'letter');
$pdf->setTitulo(utf8_decode('Libros por categoría'));
$pdf->mostrarAutor();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Cell(0, 15, utf8_decode('Libros filtrados por categoría '.$nombre['nombreCat']), 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 15, 'LIBROS', 0, 1, 'C');
llenarTabla($pdf, $producto);
$pdf->Output();

function llenarTabla($pdf, $producto)
{
    $datos = $producto->readProductosByCategory( $_GET['idCategoria']);
    $pdf->SetFont('Arial', '', 14);
    if (!empty($datos)) {
        $pdf->SetFillColor(94, 114, 228);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(40, 10, utf8_decode('Código'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, utf8_decode('Libro'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, utf8_decode('Autor'), 1, 0, 'C', true);
        $pdf->Cell(35, 10, utf8_decode('Precio'), 1, 1, 'C', true);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0);
        foreach ($datos as $fila) {
            $pdf->Cell(40, 10, utf8_decode($fila['idLibro']), 1, 0, 'C');
            $pdf->Cell(60, 10, utf8_decode($fila['NombreL']), 1, 0, 'L');
            $pdf->Cell(60, 10, utf8_decode($fila['nombreAutor'].' '.$fila['apellidoAutor']), 1, 0, 'L');
            $pdf->Cell(35, 10, utf8_decode("$".$fila['precioFinal']), 1, 1, 'R');
        }
    } else {
        $pdf->Cell(0, 15, 'SIN LIBROS DE ESTA CATEGORIA', 0, 1, 'C');
    }
    unset($datos);
    $pdf->SetFont('Arial', 'B', 14);
}
