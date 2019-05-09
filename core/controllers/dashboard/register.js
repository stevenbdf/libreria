$(document).ready(function () {
    checkUsuarios();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiEmpleados = '../../core/api/empleado.php?site=dashboard&action=';

//Función para verificar si existen usuarios en el sitio privado
const checkUsuarios = async () => {
    const response = await $.ajax({
        url: apiEmpleados + 'readEmpleados',
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
        //Se comprueba si hay usuarios registrados para enviarlo al login
        if (dataset.status == 1) {
            swal({
                title: 'Atención',
                text: 'Ya existen empleados registrados, solicita al administrador que te cree una cuenta.',
                type: 'warning',
                confirmButtonText: 'Aceptar',
                showCancelButton: false,
                cancelButtonText: 'Cancelar',
            }, (isConfirm) => {
                location.href = 'index.php';
            })
        }
    } else {
        console.log(response);
    }
}

//Función para crear un nuevo registro
$('#form-register-dashboard').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiEmpleados + 'create',
        type: 'post',
        data: {
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            correo: $('#correo').val(),
            dui: $('#dui').val(),
            contrasena: $('#contrasena').val()
        },
        datatype: 'json',
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (result.status) {
            $('#form-register-dashboard')[0].reset();
            if (result.status == 1) {
                swal(
                    {
                        title: 'Felicidades',
                        text: 'Te has registrado correctamente',
                        type: 'success',
                        confirmButtonText: 'Aceptar',
                        showCancelButton: true,
                        cancelButtonText: 'Cancelar',
                    }, (isConfirm) => {
                        location.href = 'index.php';
                    })
            }
        } else {
            swal(
                'Error',
                result.exception,
                'error'
            )
        }
    } else {
        console.log(response);
    }
})