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
    if (isset($_SESSION['idEmpleado']) && $_GET['site'] == 'dashboard') {
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
                    if ($categoria->setDescripcion($_POST['descripcion'])) {
                        if ($categoria->setDescuento($_POST['descuento'])) {
                            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                if ($categoria->setImagen($_FILES['imagen'], null)) {
                                    if ($categoria->createCategoria()) {
                                        if ($categoria->saveFile($_FILES['imagen'], $categoria->getRuta(), $categoria->getImagen())) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['status'] = 2;
                                            $result['exception'] = 'No se guardó el archivo';
                                        }
                                    } else {
                                        $result['exception'] = 'Operación fallida';
                                    }
                                } else {
                                    $result['exception'] = $categoria->getImageError();
                                }
                            } else {
                                $result['exception'] = 'Seleccione una imagen';
                            }
                        } else {
                            $result['exception'] = 'Descuento incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Descripcion incorrecta';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
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
                                if ($categoria->setDescripcion($_POST['descripcion-update'])) {
                                    if (is_uploaded_file($_FILES['imagen-update']['tmp_name'])) {
                                        if ($categoria->setImagen($_FILES['imagen-update'], $_POST['imagen-categoria'])) {
                                            $archivo = true;
                                        } else {
                                            $result['exception'] = $categoria->getImageError();
                                            $archivo = false;
                                        }
                                    } else {
                                        if ($categoria->setImagen(null, $_POST['imagen-categoria'])) {
                                            $result['exception'] = 'No se subió ningún archivo';
                                        } else {
                                            $result['exception'] = $categoria->getImageError();
                                        }
                                        $archivo = false;
                                    }
                                    if ($archivo) {
                                        if ($categoria->updateCategoria()) {
                                            if ($categoria->saveFile($_FILES['imagen-update'], $categoria->getRuta(), $categoria->getImagen())) {
                                                $result['status'] = 1;
                                            } else {
                                                $result['status'] = 2;
                                                $result['exception'] = 'No se guardó el archivo';
                                            }
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        if($categoria->updateCategoria()) {
                                            $result['status'] = 3;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    }
                                } else {
                                    $result['exception'] = 'Descripción incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Descuento incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Categorias inexistente';
                    }
                } else {
                    $result['exception'] = 'Categorias incorrecto';
                }
                break;
            case 'delete':
                if ($categoria->setId($_POST['idCategoria'])) {
                    if ($categoria->getCategoria()) {
                        if ($categoria->deleteCategoria()) {
                            if ($categoria->deleteFile($categoria->getRuta(), $_POST['imagenCategoria'])) {
                                $result['status'] = 1;
                            } else {
                                $result['status'] = 2;
                                $result['exception'] = 'No se borró el archivo';
                            }
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
            case 'getLibroPedidoCategoria':
                if($result['dataset'] = $categoria->getLibroPedidoCategoria()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Error al obtener categorias más vendidas';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    } else if ($_GET['site'] == 'dashboard') {
        exit('Acceso restringido');   
    } else if ($_GET['site'] == 'public') {
        switch ($_GET['action']) {
            case 'readCategoria':
                if ($result['dataset'] = $categoria->readCategoria()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay categorias registradas';
                }
                break;
        }
    }
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
