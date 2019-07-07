<?php
require('plantilla.php');

require('../models/pedidos.php');
require('../models/clientes.php');

$pedido = new Pedidos;
$cliente = new Clientes;

// Creación del objeto de la clase heredada
$pdf = new PDF('P', 'mm', 'letter');
$pdf->setTitulo(utf8_decode('Comprobante de pedido'));
$pdf->AliasNbPages();
$pdf->AddPage();
$pedido->setId((int)$_GET['idPedido']);
$datosPedido = $pedido->getPedido();
$detallePedido = $pedido->readDetallePedido();
$pdf->Cell(112, 15, 'Codigo de cliente: ' . $datosPedido['idCliente'], 0, 0, 'L');
$pdf->Cell(112, 15, 'Codigo de pedido: ' . $datosPedido['idPedido'], 0, 1, 'L');
$pdf->Cell(112, 15, 'Nombre: ' . $datosPedido['nombreCliente'] . ' ' . $datosPedido['apellidoCliente'], 0, 0, 'L');
$pdf->Cell(112, 15, 'Fecha del pedido: ' . $datosPedido['fecha'], 0, 1, 'L');
$pdf->Cell(112, 15, utf8_encode('Direccion: ' . $datosPedido['direccion']), 0, 0, 'L');
$estado = 'Indefinido';
if ((int)$datosPedido['estado'] == 0) {
    $estado = 'Pagado';
} else if ((int)$datosPedido['estado'] == 1) {
    $estado = 'Enviado';
} else if ((int)$datosPedido['estado'] == 2) {
    $estado = 'Cancelado';
}
$pdf->Cell(112, 15, utf8_encode('Estado: ' . $estado), 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 15, utf8_encode('Detalle de productos'), 0, 1, 'C');
llenarTabla($pdf, $detallePedido);
$pdf->Output();

function llenarTabla($pdf, $datos)
{
    $pdf->SetFont('Arial', '', 14);
    if (!empty($datos)) {
        $pdf->SetFillColor(94, 114, 228);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(35, 10, utf8_decode('#'), 1, 0, 'C', true);
        $pdf->Cell(80, 10, utf8_decode('Libro'), 1, 0, 'C', true);
        $pdf->Cell(40, 10, utf8_decode('Cantidad'), 1, 0, 'C', true);
        $pdf->Cell(40, 10, utf8_decode('Precio Unit.'), 1, 1, 'C', true);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0);
        $indice = 1;
        $total = 0;
        foreach ($datos as $fila) {
            $pdf->Cell(35, 10, $indice, 1, 0, 'C');
            $pdf->Cell(80, 10, utf8_decode($fila['nombreL']), 1, 0, 'L');
            $pdf->Cell(40, 10, utf8_decode($fila['cantidad']), 1, 0, 'C');
            $pdf->Cell(40, 10, utf8_decode("$" . $fila['precioVenta']), 1, 1, 'R');
            $indice++;
            $total = $total + (float)$fila['precioVenta'] * (int)$fila['cantidad'];
        }
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 30, 'Total $' . $total, 0, 1, 'R');
    } else {
        $pdf->Cell(0, 15, 'ERROR AL OBTENER EL DETALLE DEL PEDIDO', 0, 1, 'C');
    }
    unset($datos);
}
