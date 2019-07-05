<?php
require('plantilla.php');

require('../models/autores.php');

$autor = new Autores;


// Creación del objeto de la clase heredada
$pdf = new PDF('P', 'mm', 'letter');
$pdf->setTitulo(utf8_decode('Libros organizados por autor'));
$pdf->mostrarAutor();
$pdf->AliasNbPages();
$pdf->AddPage();
if (isset($_GET['idAutor'])) {
    $autor->setId((int) $_GET['idAutor']);
    $nombreAutor = $autor->getAuthorName();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 15, utf8_decode($nombreAutor['nombre'] . ' ' . $nombreAutor['apellido']), 0, 1, 'C');
    llenarTabla($pdf, $autor, (int) $_GET['idAutor']);
} else {
    $autores = $autor->readAuthorNames();
    foreach ($autores as $item) {
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 15, utf8_decode($item['nombre'] . ' ' . $item['apellido']), 0, 1, 'C');
        llenarTabla($pdf, $autor, (int) $item['idAutor']);
    }
}
$pdf->Output();

function llenarTabla($pdf, $autor, $idAutor)
{
    $autor->setId($idAutor);
    $datos = $autor->readBooksByAuthor();
    $pdf->SetFont('Arial', '', 14);
    if (!empty($datos)) {
        $pdf->SetFillColor(94, 114, 228);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(40, 10, utf8_decode('Código'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, utf8_decode('Libro'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, utf8_decode('Editorial'), 1, 0, 'C', true);
        $pdf->Cell(35, 10, utf8_decode('Precio'), 1, 1, 'C', true);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0);
        foreach ($datos as $fila) {
            $pdf->Cell(40, 10, utf8_decode($fila['idLibro']), 1, 0, 'C');
            $pdf->Cell(60, 10, utf8_decode($fila['NombreL']), 1, 0, 'L');
            $pdf->Cell(60, 10, utf8_decode($fila['editorial']), 1, 0, 'L');
            $pdf->Cell(35, 10, utf8_decode("$" . $fila['precioFinal']), 1, 1, 'R');
        }
    } else {
        $pdf->Cell(0, 15, 'SIN LIBROS DE ESTE AUTOR', 0, 1, 'C');
    }
    unset($datos);
}