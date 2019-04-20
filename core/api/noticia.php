<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/noticias.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $noticia= new Noticias;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if ( $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'readNoticia':
                if ($result['dataset'] = $noticia->readNoticia()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay noticias registrados';
                }
                break;
            case 'create':
                $_POST = $noticia->validateForm($_POST);
                if ($noticia->setTitulo($_POST['titulo'])) {
                    if($noticia->setDescripcion($_POST['descripcion'])){
                        if($noticia->setImagen($_POST['imagen'])){
                            if ($noticia->createNoticia()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }else{
                            $result['exception'] = 'Imágen incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Descripción incorrecto';
                    }
                } else {
                    $result['exception'] = 'Titulo incorrecto';
                }
                break;
            case 'get':
                if ($noticia->setId($_POST['idNoticia'])) {
                    if ($result['dataset'] = $noticia->getNoticia()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Noticia inexistente';
                    }
                } else {
                    $result['exception'] = 'Noticia incorrecto';
                }
                break;
            case 'update':
                $_POST = $noticia->validateForm($_POST);
                if ($noticia->setId($_POST['id-update'])) {
                        if ($noticia->setTitulo($_POST['titulo-update'])) {
                            if ($noticia->setDescripcion($_POST['descripcion-update'])) {
                                if($noticia->setImagen($_POST['imagen-update'])){
                                    if ($autor->updateAutor()) {
                                        $result['status'] = 1;
                                    } else {
                                        $result['exception'] = 'Operación fallida';
                                    }
                                }else{
                                    $result['exception'] = 'Imágen incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Descripción incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Titulo incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Noticia incorrecta';
                    }
                break;
            case 'delete':
				if ($noticia->setId($_POST['idNoticia'])) {
					if ($noticia->getNoticia()) {
						if ($noticia->deleteNoticia()) {
							$result['status'] = 1;
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Noticia inexistente';
					}
				} else {
					$result['exception'] = 'Noticia incorrecta';
				}
            	break;
			default:
                exit('Acción no disponible');
        }
    } else if ($_GET['site'] == 'commerce') {
        switch ($_GET['action']) {
            case 'readNoticia':
                if ($result['dataset'] = $noticia->readNoticia()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Contenido no disponible';
                }
                break;
            default:
                exit('Acción no disponible');
    	}
    } else {
        exit('Acceso no disponible');
    }
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>
