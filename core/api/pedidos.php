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
            case 'updateEstado':
                if ($pedido->setId($_POST['idPedido'])) {
                    if ($pedido->setEstado($_POST['estado'])) {
                        if ($pedido->updateEstadoPedido()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Operación fallida';
                        }
                    } else {
                        $result['exception'] = 'Estado incorrecto';
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    } else if (isset($_SESSION['idCliente']) && $_GET['site'] == 'public') {
        switch ($_GET['action']) {
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
            case 'readPedidos':
                if ($result['dataset'] = $pedido->readPedidosCliente()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay pedidos registrados';
                }
                break;
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
            case 'deleteCart':
                if (isset($_POST['idProducto'])) {
                    foreach ($_SESSION['carrito'] as $key => $item) {
                        if (array_key_exists((int)$_POST['idProducto'], $item)) {
                            $cantidad = $item[$_POST['idProducto']]['cantidad'];
                            $precioVenta = $item[$_POST['idProducto']]['precio'];
                            $_SESSION['carrito'][$key][(int)$_POST['idProducto']] = array(
                                'precio' => $precioVenta, 'cantidad' => (int)$cantidad - 1
                            );
                            $arrayEvaluando = $_SESSION['carrito'];
                            if ((int)$arrayEvaluando[$key][(int)$_POST['idProducto']]['cantidad'] < 1) {
                                unset($_SESSION['carrito'][$key]);
                            }
                            $result['status'] = 1;
                            break;
                        } else {
                            $result['exception'] = 'Producto inexistente en el carrito';
                        }
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'addItemCart':
                if (isset($_POST['idProducto'])) {
                    foreach ($_SESSION['carrito'] as $key => $item) {
                        if (array_key_exists((int)$_POST['idProducto'], $item)) {
                            $cantidad = $item[$_POST['idProducto']]['cantidad'];
                            $precioVenta = $item[$_POST['idProducto']]['precio'];
                            $_SESSION['carrito'][$key][(int)$_POST['idProducto']] = array(
                                'precio' => $precioVenta, 'cantidad' => (int)$cantidad + 1
                            );
                            $arrayEvaluando = $_SESSION['carrito'];
                            if ((int)$arrayEvaluando[$key][(int)$_POST['idProducto']]['cantidad'] < 1) {
                                unset($_SESSION['carrito'][$key]);
                            }
                            $result['status'] = 1;
                            break;
                        } else {
                            $result['exception'] = 'Producto inexistente en el carrito';
                        }
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'showCartTotal':
                $total = 0;
                if (isset($_SESSION['carrito'])) {
                    foreach ($_SESSION['carrito'] as $key => $value) {
                        foreach ($value as $key2 => $value2) {
                            $total =  $total + ((float)$value2['precio'] * (int)$value2['cantidad']);
                        }
                    }
                    $result['status'] = 1;
                    $result['dataset'] = $total;
                }
                break;
            case 'addPedido':
                if ($pedido->setIdCliente($_SESSION['idCliente'])) {
                    if ($pedido->createPedido()) {
                        if ($pedido->setId(Database::getLastRowId())) {
                            $pedidoId = Database::getLastRowId();
                            $itemsAgregados = 0;
                            foreach ($_SESSION['carrito'] as $key => $value) {
                                foreach ($value as $key2 => $value2) {
                                    if ($pedido->setIdProducto($key2)) {
                                        if ($pedido->createDetallePedido($value2['cantidad'], $value2['precio'])) {
                                            $itemsAgregados++;
                                        } else {
                                            $result['exception'] = 'Operación fallida, item no ingresado al detalle del pedido';
                                        }
                                    } else {
                                        $result['exception'] = 'Id producto incorrecto';
                                    }
                                }
                            }
                            if ($itemsAgregados == count($_SESSION['carrito'])) {
                                $result['status'] = 1;
                                $result['dataset'] = $pedidoId;
                                $_SESSION['carrito'] = array();
                            } else {
                                $result['exception'] = 'No se ingresaron todos los items al carrito. Item s  agregados: ' . $itemsAgregados;
                            }
                        } else {
                            $result['exception'] = 'Id del ultimo pedido no definido.';
                        }
                    } else {
                        $result['exception'] = 'Operación fallida, pedido no creado.';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
        }
    } else {
        exit('Acceso no disponible');
    }
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
