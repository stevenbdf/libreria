<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/productos.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $producto = new Productos;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idEmpleado']) && $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'readProductos':
                if ($result['dataset'] = $producto->readProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
            case 'create':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setTitulo($_POST['titulo'])) {
                    if ($producto->setIdAutor($_POST['autorSelect']) && $_POST['autorSelect'] != 0) {
                        if ($producto->setIdEditorial($_POST['editorialSelect']) && $_POST['editorialSelect'] != 0) {
                            if ($producto->setIdCategoria($_POST['categoriaSelect']) && $_POST['categoriaSelect'] != 0) {
                                if ($producto->setIdioma($_POST['idioma'])) {
                                    if ($producto->setNoPags($_POST['noPaginas'])) {
                                        if ($producto->setEncuadernacion($_POST['encuadernacion'])) {
                                            if ($producto->setResena($_POST['resena'])) {
                                                if ($producto->setPrecio($_POST['precio'])) {
                                                    if ($producto->setCantidad($_POST['cantidad'])) {
                                                        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                                            if ($producto->setImagen($_FILES['imagen'], null)) {
                                                                if ($producto->createProducto()) {
                                                                    if ($producto->saveFile($_FILES['imagen'], $producto->getRuta(), $producto->getImagen())) {
                                                                        $result['status'] = 1;
                                                                    } else {
                                                                        $result['status'] = 2;
                                                                        $result['exception'] = 'No se guardó el archivo';
                                                                    }
                                                                } else {
                                                                    $result['exception'] = 'Operacion fallida';
                                                                }
                                                            } else {
                                                                $result['exception'] = $producto->getImageError();
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Seleccione una imagen';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Cantidad incorrecta';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Precio incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Reseña incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'Encuadernacion incorrecta';
                                        }
                                    } else {
                                        $result['exception'] = 'Número de páginas incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Idioma incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Categoria incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Editorial incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Autor incorrecto';
                    }
                } else {
                    $result['exception'] = 'Titulo incorrecto';
                }
                break;
            case 'get':
                if ($producto->setIdLibro($_POST['idProducto'])) {
                    if ($result['dataset'] = $producto->getProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'update':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setIdLibro($_POST['idLibro'])) {
                    if ($producto->getProducto()) {
                        if ($producto->setTitulo($_POST['titulo-update'])) {
                            if ($producto->setIdAutor($_POST['autorSelect-update']) && $_POST['autorSelect-update'] != 0) {
                                if ($producto->setIdEditorial($_POST['editorialSelect-update']) && $_POST['editorialSelect-update'] != 0) {
                                    if ($producto->setIdCategoria($_POST['categoriaSelect-update']) && $_POST['categoriaSelect-update'] != 0) {
                                        if ($producto->setIdioma($_POST['idioma-update'])) {
                                            if ($producto->setNoPags($_POST['noPaginas-update'])) {
                                                if ($producto->setEncuadernacion($_POST['encuadernacion-update'])) {
                                                    if ($producto->setResena($_POST['resena-update'])) {
                                                        if ($producto->setPrecio($_POST['precio-update'])) {
                                                            if ($producto->setCantidad($_POST['cantidad-update'])) {

                                                                if (is_uploaded_file($_FILES['imagen-update']['tmp_name'])) {
                                                                    if ($producto->setImagen($_FILES['imagen-update'], $_POST['imagen-producto'])) {
                                                                        $archivo = true;
                                                                    } else {
                                                                        $result['exception'] = $producto->getImageError();
                                                                        $archivo = false;
                                                                    }
                                                                } else {
                                                                    if ($producto->setImagen(null, $_POST['imagen-producto'])) {
                                                                        $result['exception'] = 'No se subió ningún archivo';
                                                                    } else {
                                                                        $result['exception'] = $producto->getImageError();
                                                                    }
                                                                    $archivo = false;
                                                                }

                                                                if ($archivo) {
                                                                    if ($producto->updateProducto()) {
                                                                        if ($producto->saveFile($_FILES['imagen-update'], $producto->getRuta(), $producto->getImagen())) {
                                                                            $result['status'] = 1;
                                                                        } else {
                                                                            $result['status'] = 2;
                                                                            $result['exception'] = 'No se guardó el archivo';
                                                                        }
                                                                    } else {
                                                                        $result['exception'] = 'Operacion fallida';
                                                                    }
                                                                } else {
                                                                    if ($producto->updateProducto()) {
                                                                        $result['status'] = 3;
                                                                    } else {
                                                                        $result['exception'] = 'Operación fallida';
                                                                    }
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Cantidad incorrecta';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Precio incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Reseña incorrecta';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Encuadernacion incorrecta';
                                                }
                                            } else {
                                                $result['exception'] = 'Número de páginas incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Idioma incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Categoria incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Editorial incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Autor incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Titulo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    } else if ($_GET['site'] == 'public') {
        exit('API en mantenimiento');
    } else {
        exit('Acceso no disponible');
    }
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}