<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/empleados.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $empleado = new Empleados;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if ( $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'readEmpleados':
                if ($result['dataset'] = $empleado->readEmpleados()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay autores registrados';
                }
                break;
            case 'create':
                $_POST = $empleado->validateForm($_POST);
                if ($empleado->setNombres($_POST['nombre'])) {
                    if($empleado->setApellidos($_POST['apellido'])){
                        if($empleado->setCorreo($_POST['correo'])){
                            if($empleado->setContrasena($_POST['contrasena'])){
                                if($empleado->setDui($_POST['dui'])){
                            if ($empleado->createEmpleados()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }else{
                            $result['exception'] = 'DUI incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Contraseña incorrecto';
                    }
                } else {
                    $result['exception'] = 'Correo incorrecto';
                }
            } else {
                $result['exception'] = 'Apellido incorrecto';
            }
        } else {
            $result['exception'] = 'Nombre incorrecto';
        }
         break;
            case 'get':
                if ($empleado->setId($_POST['idEmpleado'])) {
                    if ($result['dataset'] = $empleado->getEmpleados()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Empleado inexistente';
                    }
                } else {
                    $result['exception'] = 'Empleado incorrecto';
                }
                break;
            case 'update':
                $_POST = $empleado->validateForm($_POST);
                if ($empleado->setId($_POST['id-update'])) {
                    if ($empleado->getEmpleados()) {
                        if ($empleado->setNombres($_POST['nombres-update'])) {
                            if ($empleado->setApellidos($_POST['apellidos-update'])) {
                                if ($empleado->setCorreo($_POST['correo-update'])) {
                                    if ($empleado->setContrasena($_POST['contrasena-update'])) {
                                        if($empleado->setDui($_POST['dui-update'])){
                                        if ($empleado->updateEmpleados()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    }else{
                                        $result['exception'] = 'DUI incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Contraseña incorrectos';
                                }
                            } else {
                                $result['exception'] = 'Correo incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Apellidos incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Nombres incorrecto';
                    }
                } else {
                    $result['exception'] = 'Empleado inexistente';
                }
            } else {
                $result['exception'] = 'Empleado incorrecto';
            }
            break;
            case 'delete':
				if ($empleado->setId($_POST['idEmpleado'])) {
					if ($empleado->getEmpleados()) {
						if ($empleado->deleteEmpleados()) {
							$result['status'] = 1;
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Empleado inexistente';
					}
				} else {
					$result['exception'] = 'Empleado incorrecta';
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
