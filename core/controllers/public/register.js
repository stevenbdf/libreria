//Constante para establecer la ruta y parámetros de comunicación con la API
const apiRegister = '../../core/api/clientes.php?site=public&action=';

//Función para validar el usuario al momento de iniciar sesión
$('#formulario-registro').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiRegister + 'register',
        type: 'post',
        data: $('#formulario-registro').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
            if (dataset.status) {
                Swal.fire(
                    '¡Felicidades!',
                    '¡Registrado correctamente!',
                    'success'
                )
            } else {
                console.log(dataset.exception)
            }
        } else {
            console.log(response)
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
});



