<?php
require('./database.php');
require('./validator.php');
require('../models/empleados.php');

function generateRandomString($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$empleado = new Empleados;
$data = json_decode(file_get_contents('php://input'), true);
$empleado->setCorreo($data['correo']);
if ($empleado->checkCorreo()) {
    $nuevaContrasena = generateRandomString(8);
    $empleado->setContrasena($nuevaContrasena);
    if ($empleado->updateContrasena()) {
        // Varios destinatarios
        $para  = 'stevenbdf@gmail.com';

        // título
        $título = 'Recuperación de Contraseña';

        // mensaje
        $mensaje = '
            <html lang="es">
            <head>
                <title>Recuperación de Contraseña</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
            </head>
            <body>
                <!-- Image and text -->
                <div class="d-flex justify-content-center">
                    <img src="http://35.196.28.103/resources/img/logo.png" width="300" height="70" alt="logo">
                </div>
                <h2 class="text-center w-100">Hola, solicitaste recuperar tu cuenta</h2>
                <div class="d-flex justify-content-center">
                    <img src="https://cdn.pixabay.com/photo/2017/03/19/03/47/material-icon-2155441_960_720.png" style="width: 35%; height: 35%;">
                </div>
                <p>Tu nueva contraseña es: ' . $nuevaContrasena . '</p>
            </body>
            </html>
            ';

        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Cabeceras adicionales
        $cabeceras .= 'To: Steven Diaz <stevenbdf@gmail.com>' . "\r\n";
        $cabeceras .= 'From: Libreria Maquilishuat <libreria.maquilishuat@gmail.com>' . "\r\n";
        $mail = mail($para, $título, $mensaje, $cabeceras);

        if ($mail) {
            http_response_code(200);
            $resp = array('message' => 'Se ha enviado tu nueva contraseña, revisa tu correo electronico');
            echo json_encode($resp);
        } else {
            http_response_code(500);
            $resp = array('message' => 'Error al enviar correo, solicita ayuda en libreria.maquilishuat@gmail.com');
            echo json_encode($resp);
        }
    }
} else {
    http_response_code(404);
    $resp = array('message' => 'Correo inexistente');
    echo json_encode($resp);
}
