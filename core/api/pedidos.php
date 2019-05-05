<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/pedidos.php');

function validarExistente()
{
    foreach ($_SESSION['carrito'] as $key => $item) {
        if (array_key_exists((int)$_POST['idProducto'], $item)) {
            $_SESSION['carrito'][$key][(int)$_POST['idProducto']] = array(
                'precio' => $_POST['precioVenta'], 'cantidad' => $_POST['cantidad']
            );
            return true;
            break;
        } else {
            if ($key == count($_SESSION['carrito']) - 1) {
                return false;
                break;
            }
        }
    }
}

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $pedido = new Pedidos;
    $result = array('status' => 0, 'exception' => '');
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idEmpleado']) && $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'readPedidos':
                if ($result['dataset'] = $pedido->readPedidos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay pedidos registrados';
                }
                break;
            case 'getPedido':
                if ($pedido->setId($_POST['idPedido'])) {
                    if ($result['dataset'] = $pedido->getPedido()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Pedido inexistente';
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            case 'readDetallePedido':
                if ($pedido->setId($_POST['idPedido'])) {
                    if ($result['dataset'] = $pedido->readDetallePedido()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Detalle inexistente';
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    } else if (isset($_SESSION['idCliente']) && $_GET['site'] == 'public') {
        switch ($_GET['action']) {
            case 'addCart':
                if (count($_SESSION['carrito']) > 0) {
                    if (!validarExistente()) {
                        array_push($_SESSION['carrito'], array($_POST['idProducto'] => array(
                            'precio' => $_POST['precioVenta'], 'cantidad' => $_POST['cantidad']
                        )));
                    }
                } else {
                    array_push($_SESSION['carrito'], array($_POST['idProducto'] => array(
                        'precio' => $_POST['precioVenta'], 'cantidad' => $_POST['cantidad']
                    )));
                }
                $result['status'] = 1;
                $result['dataset'] = ($_SESSION['carrito']);
                break;
        }
    } else {
        exit('Acceso no disponible');
    }
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
