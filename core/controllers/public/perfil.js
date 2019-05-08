$(document).ready(async () => {
    await showData(); 
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiClientes = '../../core/api/clientes.php?site=public&action=';

//Función para obtener y mostrar los registros disponibles
const showData = async () => {
    const response = await $.ajax({
        url: apiClientes + 'get',
        type: 'post',
        data: null,
        datatype: 'json'
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (!result.status) {
            console.log(result.exception);
        } else {
           $('input#correo').val(result.dataset.correo);
           $('input#direccion').val(result.dataset.direccion);
           $('input#nombres').val(result.dataset.nombreCliente);
           $('input#apellidos').val(result.dataset.apellidoCliente);
        }
    } else {
        console.log(response);
    }
}

//Función para modificar un registro seleccionado previamente
$('#form-update-cliente').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiClientes + 'update',
        type: 'post',
        data: new FormData($('#form-update-cliente')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (result.status) {
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Tus datos han sido modificados correctamente.',
                    'success'
                )
                location.reload();
            } else if (result.status == 2) {
                swal(
                    '¡Atención!',
                    'Datos modificados. ' + result.exception,
                    'success'
                )
            } else if (result.status == 3){
                swal(
                    '¡Atención!',
                    'Datos modificados. ' + result.exception,
                    'warning'
                )
            }
            showData();
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

//Función para modificar un registro seleccionado previamente
$('#form-update-contrasena-cliente').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiClientes + 'updateContrasena',
        type: 'post',
        data: new FormData($('#form-update-contrasena-cliente')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (result.status) {
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Contraseña modificada correctamente.',
                    'success'
                )
                $('#form-update-contrasena-cliente')[0].reset();
            }
        } else {
            swal(
                'Error',
                result.exception,
                'error'
            )
            console.log(response)
        }
    } else {
        console.log(response);
    }
})