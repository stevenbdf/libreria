$(document).ready(function () {
    checkUsuarios();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiSesion = '../../core/api/empleado.php?site=dashboard&action=';

//Función para verificar si existen usuarios en el sitio privado
const checkUsuarios = async () => {
    const response = await $.ajax({
        url: apiSesion + 'readEmpleados',
        type: 'post',
        data: null,
        datatype: 'json'
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });

    //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
    if (isJSONString(response)) {
        const dataset = JSON.parse(response);
        //Se comprueba que no hay usuarios registrados para redireccionar al registro del primer usuario
        if (dataset.status == 2) {
            swal({
                title: 'Atención',
                text: 'No hay empleados registrados, continua para crear la primer cuenta.',
                type: 'warning',
                confirmButtonText: 'Aceptar',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
            }, (isConfirm) => {
                location.href = 'register.php';
            })
        }
    } else {
        console.log(response);
    }
}

//Función para validar el usuario al momento de iniciar sesión
$('#form-session').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiSesion + 'login',
        type: 'post',
        data: $('#form-session').serialize(),
        datatype: 'json'
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
    if (isJSONString(response)) {
        const dataset = JSON.parse(response);
        //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
        if (dataset.status) {
            swal({
                title: '¡Bienvenid@!',
                text: 'Autenticación correcta.',
                type: 'success',
                confirmButtonText: 'Aceptar',
            }, (isConfirm) => {
                location.href = 'main.php';
            })
        } else {
            swal(
                'Error',
                dataset.exception,
                'error'
            )
        }
    } else {
        console.log(response);
    }
})