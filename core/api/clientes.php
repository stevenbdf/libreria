<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/clientes.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $clientes = new Clientes;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idEmpleado']) && $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'read':
                if ($result['dataset'] = $clientes->readClientes()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Operación incorrecta';
                }
                break;
            case 'delete':
                if ($clientes->setId($_POST['idCliente'])) {
                    if ($clientes->deleteCliente()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Cliente relacionado a pedidos, no se ha podido eliminar';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    } else if (isset($_SESSION['idCliente']) && $_GET['site'] == 'public') {
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../views/public/index.php');
                    $_SESSION['carrito'] = array();
                } else {
                    header('location: ../../views/public/index.php');
                }
                break;
            case 'get':
                if ($clientes->setId($_SESSION['idCliente'])) {
                    if ($result['dataset'] = $clientes->getCliente()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Operación incorrecta';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            case 'update':
                $_POST = $clientes->validateForm($_POST);
                if ($clientes->setNombres($_POST['nombres'])) {
                    if ($clientes->setApellidos($_POST['apellidos'])) {
                        if ($clientes->setCorreo($_POST['correo'])) {
                            if ($clientes->setDireccion($_POST['direccion'])) {
                                if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                    if ($clientes->setImagen($_FILES['imagen'], $_SESSION['imagenCliente']['img'])) {
                                        $archivo = true;
                                    } else {
                                        $result['exception'] = $clientes->getImageError();
                                        $archivo = false;
                                    }
                                } else {
                                    if ($clientes->setImagen(null, $_SESSION['imagenCliente']['img'])) {
                                        $result['exception'] = 'No se subió ningún archivo';
                                    } else {
                                        $result['exception'] = $clientes->getImageError();
                                    }
                                    $archivo = false;
                                }
                                if ($archivo) {
                                    if ($clientes->updateCliente()) {
                                        if ($clientes->saveFile($_FILES['imagen'], $clientes->getRuta(), $clientes->getImagen())) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['status'] = 2;
                                            $result['exception'] = 'No se guardó el archivo';
                                        }
                                    } else {
                                        $result['exception'] = 'Operación fallida';
                                    }
                                } else {
                                    if ($clientes->updateCliente()) {
                                        $result['status'] = 3;
                                    } else {
                                        $result['exception'] = 'Operación fallida';
                                    }
                                }
                            } else {
                                $result['exception'] = 'Direccion incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            case 'updateContrasena':
                if ($_POST['old-password'] == $_POST['old-password-2']) {
                    if ($_POST['new-password'] == $_POST['new-password-2']) {
                        if ($clientes->setId($_SESSION['idCliente'])) {
                            if ($clientes->setContrasena($_POST['old-password'])) {
                                if ($clientes->checkPassword()) {
                                    if ($clientes->setContrasena($_POST['new-password'])) {
                                        if ($clientes->updateContrasena()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Contraseña invalida, debe ser mayor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Contraseña incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Contraseña invalida, debe ser mayor a 6 caracteres';
                            }
                        } else {
                            $result['exception'] = 'Empleado incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Las contraseñas nuevas no coinciden';
                    }
                } else {
                    $result['exception'] = 'Las contraseñas antiguas no coinciden';
                }
                break;
        }
    } else if ($_GET['site'] == 'public') {
        switch ($_GET['action']) {
            case 'register':
                $_POST = $clientes->validateForm($_POST);
                if ($clientes->setNombres($_POST['nombres'])) {
                    if ($clientes->setApellidos($_POST['apellidos'])) {
                        if ($clientes->setCorreo($_POST['correo'])) {
                            if ($clientes->setDireccion($_POST['direccion'])) {
                                if ($_POST['clave1'] == $_POST['clave2']) {
                                    if ($clientes->setContrasena($_POST['clave1'])) {
                                        if ($clientes->setImagen($_FILES['imagen'], null)) {
                                            if ($clientes->createCliente()) {
                                                if ($clientes->saveFile($_FILES['imagen'], $clientes->getRuta(), $clientes->getImagen())) {
                                                    $result['status'] = 1;
                                                } else {
                                                    $result['status'] = 2;
                                                    $result['exception'] = 'No se guardó el archivo';
                                                }
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                        } else {
                                            $result['exception'] = $clientes->getImageError() . '. La dimension de la imagen debe ser 500x500';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                            } else {
                                $result['exception'] = 'Direccion incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            case 'login':
                $_POST = $clientes->validateForm($_POST);
                if ($clientes->setCorreo($_POST['correo'])) {
                    if ($clientes->checkCorreo()) {
                        if ($clientes->setContrasena($_POST['contrasena'])) {
                            if ($clientes->checkPassword()) {
                                $_SESSION['idCliente'] = $clientes->getId();
                                $_SESSION['correoCliente'] = $clientes->getCorreo();
                                $_SESSION['imagenCliente'] = $clientes->getImagenCliente();
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Clave inexistente';
                            }
                        } else {
                            $result['exception'] = 'Clave menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Correo inexistente';
                    }
                } else {
                    $result['exception'] = 'Correo incorrecto';
                }
                break;

            default:
                exit('accion no disponible');
        }
    } else if ($_GET['site'] == 'dashboard') {
        exit('Acceso restringido');
    }
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
