//Función para comprobar si una cadena tiene formato JSON
function isJSONString(string)
{
    try {
        if (string != "[]") {
            JSON.parse(string);
            return true;
        } else {
            return false;
        }
    } catch(error) {
        return false;
    }
}

const apiSession = '../../core/api/empleado.php?site=dashboard&action=';

//Función para cerrar la sesión del usuario
function signOff() {
    swal({
        title: 'Advertencia',
        text: '¿Quiere cerrar la sesión?',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Aceptar'
    },(function(isConfirm){
        isConfirm && (location.href = apiSession + 'logout');
    }))
}

//Función para cambiar contraseña
$('#form-update-contrasena').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiSession + 'update-contrasena',
        type: 'post',
        data: new FormData($('#form-update-contrasena')[0]),
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
            $('#cambiarContrasenaModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Contraseña modificada correctamente.',
                    'success'
                )
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

