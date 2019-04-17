<?php
require_once('../../core/helpers/database.php');
require_once('../../core/models/index.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $index = new Index;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if ($_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'countProductos':
                if ($result['dataset'] = $index->countProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Error al contar libros';
                }
                break;
            case 'countNoticias':
                if ($result['dataset'] = $index->countNoticias()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Error al contar noticias';
                }
                break;
            case 'countCategorias':
                if ($result['dataset'] = $index->countCategorias()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Error al contar categorias';
                }
                break;
            case 'countEmpleados':
                if ($result['dataset'] = $index->countEmpleados()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Error al contar empleados';
                }
                break;
            case 'countClientes':
                if ($result['dataset'] = $index->countClientes()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Error al contar clientes';
                }
                break;
            case 'countPedidos':
                if ($result['dataset'] = $index->countPedidos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Error al contar pedidos';
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
