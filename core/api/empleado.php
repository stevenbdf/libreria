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
    if (isset($_SESSION['idEmpleado']) && ($_GET['site'] == 'dashboard')) {
        switch ($_GET['action']) {
            case 'readEmpleados':
                if ($result['dataset'] = $empleado->readEmpleados()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay empleados registrados';
                }
                break;
            case 'create':
                $_POST = $empleado->validateForm($_POST);
                if ($empleado->setNombres($_POST['nombre'])) {
                    if ($empleado->setApellidos($_POST['apellido'])) {
                        if ($empleado->setCorreo($_POST['correo'])) {
                            if ($empleado->setContrasena($_POST['contrasena'])) {
                                if ($empleado->setDui($_POST['dui'])) {
                                    if ($empleado->createEmpleados()) {
                                        $result['status'] = 1;
                                    } else {
                                        $result['exception'] = 'Operación fallida';
                                    }
                                } else {
                                    $result['exception'] = 'DUI incorrecto';
                                }
                            } else {
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
                                    if ($empleado->setDui($_POST['dui-update'])) {
                                        if ($empleado->updateEmpleados()) {
                                            if ($_SESSION['idEmpleado'] = $empleado->getId()) {
                                                $_SESSION['correoUsuario'] = $empleado->getCorreo();
                                            }
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'DUI incorrecto';
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
                if ((int) $_SESSION['idEmpleado'] != (int) $_POST['idEmpleado']) {
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
                        $result['exception'] = 'Empleado incorrecto';
                    }
                } else {
                    $result['exception'] = 'No puedes eliminarte a ti mismo';
                }
                break;
            case 'logout':
                unset($_SESSION['idEmpleado']);
                unset($_SESSION['correoUsuario']);
                header('location: ../../views/dashboard/');
                break;
            case 'update-contrasena':
                if ($_POST['old-password'] == $_POST['old-password-2']) {
                    if ($_POST['new-password'] == $_POST['new-password-2']) {
                        if ($empleado->setId($_SESSION['idEmpleado'])) {
                            if ($empleado->setContrasena($_POST['old-password'])) {
                                if ($empleado->checkPassword()) {
                                    if ($empleado->setContrasena($_POST['new-password'])) {
                                        if ($empleado->updateContrasena()) {
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
            case 'leerAutenticacion':
                if (isset($_POST['idEmpleado'])) {
                    if ($empleado->setId($_POST['idEmpleado'])) {
                        if ($result['dataset'] = $empleado->leerAutenticacion(false)) {
                            http_response_code(200);
                            $result['status'] = 1;
                        } else {
                            http_response_code(500);
                            $result['exception'] = 'Error al obtener información';
                        }
                    } else {
                        http_response_code(400);
                        $result['exception'] = 'IdEmpleado incorrecto';
                    }
                } else {
                    http_response_code(400);
                    $result['exception'] = 'Parametro idEmpleado indefinido';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    } else if ($_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'readEmpleados':
                if ($result['dataset'] = $empleado->readEmpleados()) {
                    $result['status'] = 1;
                    $result['exception'] = 'Existe al menos 1 empleado registrado';
                } else {
                    $result['status'] = 2;
                    $result['exception'] = 'No hay empleados registrados';
                }
                break;
            case 'login':
                $_POST = $empleado->validateForm($_POST);
                if ($empleado->setCorreo($_POST['correo'])) {
                    if ($empleado->checkCorreo()) {
                        if ($empleado->setContrasena($_POST['contrasena'])) {
                            $informacion = $empleado->leerAutenticacion(true);
                            if ($informacion['estado']) {
                                if ($empleado->checkPassword()) {
                                    $informacion['estado'] = 1;
                                    $informacion['intentos'] = 0;
                                    $informacion['fechaBloqueo'] = null;
                                    if (modificarAutenticacion($informacion, $empleado)) {
                                        $_SESSION['idEmpleado'] = $empleado->getId();
                                        $_SESSION['correoUsuario'] = $empleado->getCorreo();
                                        $result['status'] = 1;
                                    } else {
                                        $result['exception'] = 'Error al modificar autenticacion';
                                    }
                                } else {
                                    //Aumenta el numero de intentos
                                    $informacion['intentos']++;
                                    if ($informacion['intentos'] >= 3) {
                                        //Bloquea usuario y envia mensaje
                                        //Modifica el objeto autenticacion con bloqueo y fecha de bloqueo
                                        $informacion['estado'] = 0;
                                        $informacion['fechaBloqueo'] = date("Y-m-d H:i:s");
                                        //Actualiza en base de datos
                                        if (modificarAutenticacion($informacion, $empleado)) {
                                            $result['exception'] = 'Clave incorrecta, tu usuario ha sido bloqueado por 24 horas, espera para volver a intentarlo.';
                                        } else {
                                            $result['exception'] = 'Error al modificar autenticacion';
                                        }
                                    } else {
                                        //Envia mensaje con intentos restantes
                                        if (modificarAutenticacion($informacion, $empleado)) {
                                            $result['exception'] = 'Clave incorrecta tienes ' . (3 - $informacion['intentos']) . ' intentos restantes';
                                        } else {
                                            $result['exception'] = 'Error al modificar autenticacion';
                                        }
                                    }
                                }
                            } else {
                                $fechaActual = date_create(date("Y-m-d H:i:s"));
                                $diferencia = date_diff(date_create($informacion['fechaBloqueo']), $fechaActual);
                                if ((int) $diferencia->format("%R%a")) {
                                    $informacion['estado'] = 1;
                                    $informacion['intentos'] = 0;
                                    $informacion['fechaBloqueo'] = null;
                                    if (modificarAutenticacion($informacion, $empleado)) {
                                        if ($empleado->checkPassword()) {
                                            $informacion['estado'] = 1;
                                            $informacion['intentos'] = 0;
                                            $informacion['fechaBloqueo'] = null;
                                            if (modificarAutenticacion($informacion, $empleado)) {
                                                $_SESSION['idEmpleado'] = $empleado->getId();
                                                $_SESSION['correoUsuario'] = $empleado->getCorreo();
                                                $result['status'] = 1;
                                            } else {
                                                $result['exception'] = 'Error al modificar autenticacion';
                                            }
                                        } else {
                                            //Aumenta el numero de intentos
                                            $informacion['intentos']++;
                                            if ($informacion['intentos'] >= 3) {
                                                //Bloquea usuario y envia mensaje
                                                //Modifica el objeto autenticacion con bloqueo y fecha de bloqueo
                                                $informacion['estado'] = 0;
                                                $informacion['fechaBloqueo'] = date("Y-m-d H:i:s");
                                                //Actualiza en base de datos
                                                if (modificarAutenticacion($informacion, $empleado)) {
                                                    $result['exception'] = 'Clave incorrecta, tu usuario ha sido bloqueado por 24 horas, espera para volver a intentarlo.';
                                                } else {
                                                    $result['exception'] = 'Error al modificar autenticacion';
                                                }
                                            } else {
                                                //Envia mensaje con intentos restantes
                                                if (modificarAutenticacion($informacion, $empleado)) {
                                                    $result['exception'] = 'Clave incorrecta tienes ' . (3 - $informacion['intentos']) . ' intentos restantes';
                                                } else {
                                                    $result['exception'] = 'Error al modificar autenticacion';
                                                }
                                            }
                                        }
                                    } else {
                                        $result['exception'] = 'Error al modificar autenticacion';
                                    }
                                } else {
                                    $result['exception'] = 'Tu usuario ha sido bloqueado por 24 horas, espera para volver a intentarlo.';
                                }
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
            case 'create':
                //Agregar validacion si existen empleados
                if ($empleado->setNombres($_POST['nombre'])) {
                    if ($empleado->setApellidos($_POST['apellido'])) {
                        if ($empleado->setCorreo($_POST['correo'])) {
                            if ($empleado->setContrasena($_POST['contrasena'])) {
                                if ($empleado->setDui($_POST['dui'])) {
                                    if ($empleado->createEmpleados()) {
                                        $result['status'] = 1;
                                    } else {
                                        $result['exception'] = 'Operación fallida';
                                    }
                                } else {
                                    $result['exception'] = 'DUI incorrecto';
                                }
                            } else {
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

function modificarAutenticacion($nuevoJSON, $empleado)
{
    //Establece el nuevo objeto autenticacion
    $empleado->setAutenticacion(json_encode($nuevoJSON));

    //Actualiza en base de datos
    return $empleado->updateAutenticacion();
}
