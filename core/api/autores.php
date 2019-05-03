<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/autores.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $autor = new Autores;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if ( $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'readAutores':
                if ($result['dataset'] = $autor->readAutores()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay autores registradas';
                }
                break;
            case 'create':
                $_POST = $autor->validateForm($_POST);
                if ($autor->setNombres($_POST['nombres'])) {
                    if($autor->setApellidos($_POST['apellidos'])){
                        if($autor->setPais($_POST['pais'])){
                            if ($autor->createAutor()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }else{
                            $result['exception'] = 'Pais incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Apellido incorrecto';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            case 'get':
                if ($autor->setId($_POST['idAutor'])) {
                    if ($result['dataset'] = $autor->getAutor()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Autor inexistente';
                    }
                } else {
                    $result['exception'] = 'Autor incorrecto';
                }
                break;
            case 'update':
                $_POST = $autor->validateForm($_POST);
                if ($autor->setId($_POST['id-update'])) {
                    if ($autor->getAutor()) {
                        if ($autor->setNombres($_POST['nombres-update'])) {
                            if ($autor->setApellidos($_POST['apellidos-update'])) {
                                if($autor->setPais($_POST['pais-update'])){
                                    if ($autor->updateAutor()) {
                                        $result['status'] = 1;
                                    } else {
                                        $result['exception'] = 'Operación fallida';
                                    }
                                }else{
                                    $result['exception'] = 'Pais incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Autor inexistente';
                    }
                } else {
                    $result['exception'] = 'Autor incorrecto';
                }
                break;
            case 'delete':
				if ($autor->setId($_POST['idAutor'])) {
					if ($autor->getAutor()) {
						if ($autor->deleteAutor()) {
							$result['status'] = 1;
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Autor inexistente';
					}
				} else {
					$result['exception'] = 'Autor incorrecta';
				}
            	break;
			default:
                exit('Acción no disponible');
        }
    } else if ($_GET['site'] == 'commerce') {
        switch ($_GET['action']) {
            case 'readCategorias':
                if ($result['dataset'] = $autor->readCategorias()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Contenido no disponible';
                }
                break;
            case 'readProductos':
                if ($autor->setCategoria($_POST['id_categoria'])) {
                    if ($result['dataset'] = $autor->readProductosCategoria()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
            case 'detailProducto':
                if ($autor->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $autor->getProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
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
