<?php
require('plantilla.php');
require('../models/productos.php');
require('../models/comentariosLibros.php');

$producto = new Productos;
$comentarios = new Comentario;


// Creación del objeto de la clase heredada
$nombre = $producto->getNombreL((int) $_GET['idLibro']);
$comentarios->setIdLibro((int) $_GET['idLibro']);
$pdf = new PDF('P', 'mm', 'letter');
$pdf->setTitulo(utf8_decode('Reaciones por libro'));
$pdf->mostrarAutor();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Cell(0, 15, utf8_decode('Titulo: ') . $nombre['NombreL'], 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 14);
$reacciones = $producto->getReacciones((int) $_GET['idLibro']);
$pdf->Cell(65, 15, 'LIKES: ' . $reacciones['likes'], 0, 0, 'L');
$pdf->Cell(65, 15, 'DISLIKES: ' . $reacciones['dislikes'], 0, 0, 'L');
$pdf->Cell(65, 15, utf8_decode('Aprobación: ') . $reacciones['aprobacion'] . '%', 0, 1, 'L');
$pdf->Cell(0, 15, 'Comentarios', 0, 1, 'C');
llenarTabla($pdf, $comentarios, (int) $_GET['idLibro']);
$pdf->Output();


function llenarTabla($pdf, $comentarios, $idLibro)
{
    $comentarios->setId($idLibro);
    $datos = $comentarios->readComentariosLibro();
    $pdf->SetFont('Arial', '', 14);
    if (!empty($datos)) {
        $pdf->SetFillColor(94, 114, 228);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(25, 10, utf8_decode('Código'), 1, 0, 'C', true);
        $pdf->Cell(40, 10, utf8_decode('Cliente'), 1, 0, 'C', true);
        $pdf->Cell(30, 10, utf8_decode('Fecha'), 1, 0, 'C', true);
        $pdf->Cell(100, 10, utf8_decode('Comentario'), 1, 1, 'C', true);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0);
        foreach ($datos as $fila) {
            $pdf->Cell(25, 10, utf8_decode($fila['idComent']), 0, 0, 'C');
            $pdf->Cell(40, 10, utf8_decode($fila['nombreCliente']), 0, 0, 'L');
            $pdf->Cell(30, 10, utf8_decode($fila['fecha']), 0, 0, 'C');
            $pdf->SetFillColor(255, 255, 255);
            $pdf->MultiCell(100, 10, utf8_decode($fila['comentario']), 0, 1, 'L', false);
            $pdf->SetFillColor(0, 0, 0);
            $pdf->Cell(0, 0.5, '', 0, 1, 'C', true);
        }
    } else {
        $pdf->Cell(0, 15, 'SIN COMENTARIOS', 0, 1, 'C');
    }
    unset($datos);
}
