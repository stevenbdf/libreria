<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/editorial.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $editorial = new Editorial;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if ( $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'readEditorial':
                if ($result['dataset'] = $editorial->readEditorial()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay editoriales registradas';
                }
                break;
            case 'create':
                $_POST = $editorial->validateForm($_POST);
                if ($editorial->setNombre($_POST['nombre'])) {
                    if($editorial->setDireccion($_POST['direccion'])){
                        if($editorial->setPais($_POST['pais'])){
                            if($editorial->setTelefono($_POST['telefono'])){
                            if ($editorial->createEditorial()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }else{
                            $result['exception'] = 'Telefono incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Pais incorrecta';
                    }
                } else {
                    $result['exception'] = 'Direccion incorrecto';
                }
            }
            else {
                $result['exception'] = 'Nombre incorrecto';
            }
                
                break;
            case 'get':
                if ($editorial->setId($_POST['idEditorial'])) {
                    if ($result['dataset'] = $editorial->getEditorial()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Editorial inexistente';
                    }
                } else {
                    $result['exception'] = 'Editorial incorrecto';
                }
                break;
            case 'update':
                $_POST = $editorial->validateForm($_POST);
                if ($editorial->setId($_POST['id-update'])) {
                    if ($editorial->getEditorial()) {
                        if ($editorial->setNombre($_POST['nombres-update'])) {
                            if ($editorial->setDireccion($_POST['direccion-update'])) {
                                if($editorial->setPais($_POST['pais-update'])){
                                    if($editorial->setTelefono($_POST['telefono-update'])){
                                        if ($editorial->updateEditorial()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    }else{
                                        $result['exception'] = 'Telefono incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Pais incorrectos';
                                }
                            } else {
                                $result['exception'] = 'Direccion incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Editorial inexistente';
                    }
                }else {
                    $result['exception'] = 'Editorial incorrecto';
                }
                break;
            case 'delete':
				if ($editorial->setId($_POST['idEditorial'])) {
					if ($editorial->getEditorial()) {
						if ($editorial->deleteEditorial()) {
							$result['status'] = 1;
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Editorial inexistente';
					}
				} else {
					$result['exception'] = 'Editorial incorrecta';
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
