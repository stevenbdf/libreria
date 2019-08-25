//Constante para establecer la ruta y parámetros de comunicación con la API
const apiRegister = '../../core/api/clientes.php?site=public&action=';

//Función para crear un nuevo registro
$('#formulario-registro').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiRegister + 'register',
        type: 'post',
        data: new FormData($('#formulario-registro')[0]),
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
        console.log(result);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (result.status) {
            $('#formulario-registro')[0].reset();
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    '¡Te has registrado correctamente!',
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




