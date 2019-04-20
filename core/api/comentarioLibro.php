<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/comentariosLibros.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $comentario = new Comentario;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if ( $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'readComentario':
                if ($result['dataset'] = $comentario->readComentario()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay comentarios registradas';
                }
                break;
            
            case 'get':
                if ($comentario->setId($_POST['idComent'])) {
                    if ($result['dataset'] = $comentario->getComentario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Comentario inexistente';
                    }
                } else {
                    $result['exception'] = 'Comentario incorrecto';
                }
                break;
            case 'delete':
				if ($comentario->setId($_POST['idComent'])) {
                    if ($comentario->deleteComentario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Operación fallida';
                    }
				} else {
					$result['exception'] = 'Comentario incorrecta';
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
