<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/categoria.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $categoria = new Categoria;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if ( $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'readCategoria':
                if ($result['dataset'] = $categoria->readCategoria()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay categorias registradas';
                }
                break;
            case 'create':
                $_POST = $categoria->validateForm($_POST);
                if ($categoria->setNombre($_POST['nombre'])) {
                    if($categoria->setDescuento($_POST['descuento'])){
                            if ($categoria->createCategoria()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }else{
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Descuento incorrecto';
                    }
                
                break;
            case 'get':
                if ($categoria->setId($_POST['idCategoria'])) {
                    if ($result['dataset'] = $categoria->getCategoria()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Categoria inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoria incorrecto';
                }
                break;
            case 'update':
                $_POST = $categoria->validateForm($_POST);
                if ($categoria->setId($_POST['id-update'])) {
                    if ($categoria->getCategoria()) {
                        if ($categoria->setNombre($_POST['nombres-update'])) {
                            if ($categoria->setDescuento($_POST['descuento-update'])) {
                                        if ($categoria->updateCategoria()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else{
                                        $result['exception'] = 'Descuento incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Nombre incorrectos';
                                }
                          } else {
                             $result['exception'] = 'Categorias inexistente';
                         }
                     }else {
                         $result['exception'] = 'Categorias incorrecto';
                  }
                break;
            case 'delete':
				if ($categoria->setId($_POST['idCategoria'])) {
					if ($categoria->getCategoria()) {
						if ($categoria->deleteCategoria()) {
							$result['status'] = 1;
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Categoria inexistente';
					}
				} else {
					$result['exception'] = 'Categoria incorrecta';
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
