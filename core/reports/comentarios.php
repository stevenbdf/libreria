<?php
require('plantilla.php');

require('../models/comentariosNoticias.php');

$noticia = new Comentario;


// Creación del objeto de la clase heredada
$nombre = $noticia->getNameNew((int)$_GET['idNoticia']);
$pdf = new PDF('P', 'mm', 'letter');
$pdf->setTitulo(utf8_decode('Comentarios por noticia'));
$pdf->mostrarAutor();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Cell(0, 15, utf8_decode('Comentarios por noticia').$nombre['idNoticia'], 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 15, 'COMENTARIOS', 0, 1, 'C');
llenarTabla($pdf, $noticia, (int)$_GET['idNoticia']);
$pdf->Output();

function llenarTabla($pdf, $noticia, $idNoticia)
{
    $datos = $noticia->getCommentByNew((int)$_GET['idNoticia']);
    $pdf->SetFont('Arial', '', 14);
    if (!empty($datos)) {
        $pdf->SetFillColor(94, 114, 228);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(40, 10, utf8_decode('Código'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, utf8_decode('Comentarios    '), 1, 0, 'C', true);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0);
        foreach ($datos as $fila) {
            $pdf->Cell(40, 10, utf8_decode($fila['idComentN']), 1, 0, 'C');
            $pdf->Cell(60, 10, utf8_decode($fila['comentario']), 1, 0, 'L');
    }
}
     else {
        $pdf->Cell(0, 15, 'SIN COMENTARIOS EN ESTA NOTICIA', 0, 1, 'C');
    }
    unset($datos);
    $pdf->SetFont('Arial', 'B', 14);
}
