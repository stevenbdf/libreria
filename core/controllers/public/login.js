//Constante para establecer la ruta y parámetros de comunicación con la API
const apiSesion = '../../core/api/clientes.php?site=public&action=';

//Función para validar el usuario al momento de iniciar sesión
$('#form-login-cliente').submit(async () => {
    event.preventDefault();
    console.log('tenra')
    const response = await $.ajax({
        url: apiSesion + 'login',
        type: 'post',
        data: $('#form-login-cliente').serialize(),
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
                location.href = 'index.php';
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