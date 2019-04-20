<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/pedidos.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $pedido = new Pedidos;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if ( $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'readPedidos':
                if ($result['dataset'] = $pedido->readPedidos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay pedidos registrados';
                }
                break;
            case 'getPedido':
                if($pedido->setId($_POST['idPedido'])){
                    if ($result['dataset'] = $pedido->getPedido()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Pedido inexistente';
                    }
                }else{
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            case 'readDetallePedido':
                if($pedido->setId($_POST['idPedido'])){
                    if ($result['dataset'] = $pedido->readDetallePedido()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Detalle inexistente';
                    }
                }else{
                    $result['exception'] = 'Detalle incorrecto';
                }
                break;
            default:
            exit('Acción no disponible');
        }
    } else if ($_GET['site'] == 'commerce') {
       
    } else {
        exit('Acceso no disponible');
    }
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>
