<?php
require('plantilla.php');

require('../models/pedidos.php');

$pedido = new Pedidos;
// Creación del objeto de la clase heredada
$pdf = new PDF('P', 'mm', 'letter');
$pdf->setTitulo('Pedidos en rango de fecha');
$pdf->mostrarAutor();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Cell(0, 15, 'Pedidos filtrados por rango de fecha desde '.$_GET['fecha1'].' hasta '.$_GET['fecha2'], 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 15, 'PAGADOS', 0, 1, 'C');
llenarTabla($pdf, $pedido, 0);
$pdf->Cell(0, 15, 'ENVIADOS', 0, 1, 'C');
llenarTabla($pdf, $pedido, 1);
$pdf->Cell(0, 15, 'CANCELADOS', 0, 1, 'C');
llenarTabla($pdf, $pedido, 2);
$pdf->Output();

function llenarTabla($pdf, $pedido, $estado)
{
    $datos = $pedido->readPedidosFecha("'" . $_GET['fecha1'] . "'", "'" . $_GET['fecha2'] . "'", $estado);
    $pdf->SetFont('Arial', '', 14);
    if (!empty($datos)) {
        $pdf->SetFillColor(94, 114, 228);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(20, 10, utf8_decode('Código'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, utf8_decode('Cliente'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, utf8_decode('Correo'), 1, 0, 'C', true);
        $pdf->Cell(25, 10, utf8_decode('Fecha'), 1, 0, 'C', true);
        $pdf->Cell(30, 10, utf8_decode('Monto'), 1, 1, 'C', true);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0);
        foreach ($datos as $fila) {
            $pdf->Cell(20, 10, utf8_decode($fila['idPedido']), 1, 0, 'C');
            $pdf->Cell(60, 10, utf8_decode($fila['nombreCliente'].$fila['apellidoCliente']), 1, 0, 'L');
            $pdf->Cell(60, 10, utf8_decode($fila['correo']), 1, 0, 'L');
            $pdf->Cell(25, 10, utf8_decode($fila['fecha']), 1, 0, 'C');
            $pdf->Cell(30, 10, utf8_decode("$".$fila['montoTotal']), 1, 1, 'R');
        }
    } else {
        $pdf->Cell(0, 15, 'SIN PEDIDOS DE ESTE TIPO', 0, 1, 'C');
    }
    unset($datos);
    $pdf->SetFont('Arial', 'B', 14);
}
