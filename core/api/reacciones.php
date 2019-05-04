<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/reaccion.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $reaccion = new Reacciones;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idCliente']) && $_GET['site'] == 'public') {
        switch ($_GET['action']) {
            case 'readReaccionesCliente':
                if ($reaccion->setIdCliente($_SESSION['idCliente'])) {
                    if ($reaccion->setIdProducto($_POST['idProducto'])) {
                        if ($result['dataset'] = $reaccion->readReaccionesEmpleado()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Sin reacciones a este libro';
                        }
                    } else {
                        $result['exception'] = 'Id Producto incorrecto';
                    }
                } else {
                    $result['exception'] = 'Id Cliente incorrecto';
                }
                break;
            case 'updateReaccion':
                if ($reaccion->setIdCliente($_SESSION['idCliente'])) {
                    if ($reaccion->setIdProducto($_POST['idProducto'])) {
                        if ($reaccion->setTipoReaccion($_POST['nuevaReaccion'])) {
                            if ($result['dataset'] = $reaccion->updateReaccion()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Sin reacciones a este libro';
                            }
                        } else {
                            $result['exception'] = 'Tipo reaccion incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Id Producto incorrecto';
                    }
                } else {
                    $result['exception'] = 'Id Cliente incorrecto';
                }
                break;
            case 'insert':
                if ($reaccion->setIdProducto($_POST['idProducto'])) {
                    if ($reaccion->setTipoReaccion($_POST['tipoReaccion'])) {
                        if (isset($_SESSION['idCliente'])) {
                            if ($reaccion->setIdCliente($_SESSION['idCliente'])) {
                                if ($reaccion->createReaccion()) {
                                    $result['status'] = 1;
                                } else {
                                    $result['exception'] = 'Operación incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Id Cliente incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Debes iniciar sesión para reaccionar a productos';
                        }
                    } else {
                        $result['exception'] = 'Tipo de reaccion incorrecto';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'delete':
                if ($reaccion->setIdCliente($_SESSION['idCliente'])) {
                    if ($reaccion->setIdProducto($_POST['idProducto'])) {
                        if ($reaccion->deleteReaccion()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Operación incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                } else {
                    $result['exception'] = 'Id Cliente incorrecto';
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
