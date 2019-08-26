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
const apiSessionCliente = '../../core/api/clientes.php?site=public&action=';

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

//Función para cerrar la sesión del usuario
function signOffCliente() {
    swal({
        title: 'Advertencia',
        text: '¿Quiere cerrar la sesión?',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Aceptar'
    },(function(isConfirm){
        isConfirm && (location.href = apiSessionCliente + 'logout');
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

//creo la funcion usuario inactivo para cerrar la sesion del usuario
function usuarioInactivo()
{
    //segundos cuando el usuario esta activo
    var segundosActivo = 0;
 
    //un minuto 60 x 1 = 60 segundos.
    var maxSegundos = (60 * 1);
 
    //metodo para ejecutar cada segundo(1000 milisegundos = 1 segundo)
    setInterval(function(){
        segundosActivo++;
        //si el usuario esta inactivo por maxSegundos
        if(segundosActivo > maxSegundos){
            swal('El usuario ha estado inactivo por mas de ' + maxSegundos + ' segundos');
            //Redirigir al logout
            signOffCliente();
        }
    }, 1000);
 
    //funcion para detectar que el usuario este activo
    function activity()
    {
        //restablecer la variable de los segundo y volver a 0
        segundosActivo = 0;
    }
    //Se define eventos DOM (detecta que el usario esta inactivo)
   var activityEvents = [
        'mousedown', 'mousemove', 'keydown',
        'scroll', 'touchstart'
   ];
 
    //registra la actividad del usuario
    activityEvents.forEach(function(eventName) {
        document.addEventListener(eventName, activity, true);
    });
 
}

usuarioInactivo();