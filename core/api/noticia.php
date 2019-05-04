<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/noticias.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $noticia = new Noticias;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idEmpleado']) &&  $_GET['site'] == 'dashboard') {
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
                    if ($noticia->setDescripcion($_POST['descripcion'])) {
                        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                            if ($noticia->setImagen($_FILES['imagen'], null)) {
                                if ($noticia->setEmpleadoId($_SESSION['idEmpleado'])) {
                                    if ($noticia->setFecha($_POST['fecha'])) {
                                        if ($noticia->createNoticia()) {
                                            if ($noticia->saveFile($_FILES['imagen'], $noticia->getRuta(), $noticia->getImagen())) {
                                                $result['status'] = 1;
                                            } else {
                                                $result['status'] = 2;
                                                $result['exception'] = 'No se guardó el archivo';
                                            }
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Fecha incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Id empleado incorrecto';
                                }
                            } else {
                                $result['exception'] = $noticia->getImageError();
                            }
                        } else {
                            $result['exception'] = 'Seleccione una imagen';
                        }
                    } else {
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
                    if ($noticia->getNoticia()) {
                        if ($noticia->setTitulo($_POST['titulo-update'])) {
                            if ($noticia->setDescripcion($_POST['descripcion'])) {
                                if (is_uploaded_file($_FILES['imagen-update']['tmp_name'])) {
                                    if ($noticia->setImagen($_FILES['imagen-update'], $_POST['imagen-noticia'])) {
                                        $archivo = true;
                                    } else {
                                        $result['exception'] = $noticia->getImageError();
                                        $archivo = false;
                                    }
                                } else {
                                    if ($noticia->setImagen(null, $_POST['imagen-noticia'])) {
                                        $result['exception'] = 'No se subió ningún archivo';
                                    } else {
                                        $result['exception'] = $noticia->getImageError();
                                    }
                                    $archivo = false;
                                }
                                if ($archivo) {
                                    if ($noticia->updateNoticia()) {
                                        if ($noticia->saveFile($_FILES['imagen-update'], $noticia->getRuta(), $noticia->getImagen())) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['status'] = 2;
                                            $result['exception'] = 'No se guardó el archivo';
                                        }
                                    } else {
                                        $result['exception'] = 'Operación fallida';
                                    }
                                } else {
                                    if ($noticia->updateNoticia()) {
                                        $result['status'] = 3;
                                    } else {
                                        $result['exception'] = 'Operación fallida';
                                    }
                                }
                            } else {
                                $result['exception'] = 'Descripción incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Titulo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Noticia inexistente';
                    }
                } else {
                    $result['exception'] = 'Noticia incorrecta';
                }
                break;
            case 'delete':
                if ($noticia->setId($_POST['idNoticia'])) {
                    if ($noticia->getNoticia()) {
                        if ($noticia->deleteNoticia()) {
                            if ($noticia->deleteFile($noticia->getRuta(), $_POST['imagenNoticia'])) {
                                $result['status'] = 1;
                            } else {
                                $result['status'] = 2;
                                $result['exception'] = 'No se borró el archivo';
                            }
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
    } else if ($_GET['site'] == 'public') {
        switch ($_GET['action']) {
            case 'readNoticia':
                if ($result['dataset'] = $noticia->readNoticia()) {
                    if (isset($_SESSION['imagenCliente'])) {
                        $result['imagenCliente'] = $_SESSION['imagenCliente'];
                    }
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay noticias registradas';
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
