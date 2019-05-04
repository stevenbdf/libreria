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
            default:
                exit('Acción no disponible');
        }
    } else if (isset($_SESSION['idCliente']) && $_GET['site'] == 'public') {
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../views/public/index.php');
                } else {
                    header('location: ../../views/public/index.php');
                }
                break;
        }
    }  else if ($_GET['site'] == 'public') {
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
                                            $result['exception'] = $clientes->getImageError();
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
