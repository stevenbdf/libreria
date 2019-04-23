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
