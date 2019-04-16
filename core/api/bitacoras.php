<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/bitacora.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $bitacora = new Bitacora;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if ( $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'readBitacora':
                if ($result['dataset'] = $bitacora->readBitacora()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay resgistros';
                }
                break;
                
            default:
                exit('Acción no disponible');
        }
    } 
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
?>
