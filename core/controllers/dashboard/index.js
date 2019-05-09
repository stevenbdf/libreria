$(document).ready(() => {
    countTables();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiIndex = '../../core/api/index.php?site=dashboard&action=';

//Función para obtener y mostrar los registros disponibles
const countTables = () => {
    ajaxRequest('countProductos', 'productos');

    ajaxRequest('countNoticias', 'noticias');

    ajaxRequest('countCategorias', 'categorias');

    ajaxRequest('countEmpleados', 'empleados');

    ajaxRequest('countClientes', 'clientes');

    ajaxRequest('countPedidos', 'pedidos');

}

/*  Función reutilizable para contar tablas mediante API
    @param {string} functionName - nombre de la función para buscar en la API
    @param {string} DOM_ID - id del elemento <p> a agregar la respuesta de la API
*/
const ajaxRequest = async (functionName, DOM_ID) => {
    const response = await $.ajax({
        url: apiIndex + `${functionName}`
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (!result.status) {
            swal('Error',
                result.exception,
                'error'
            )
        }
        //Se agrega la respuesta a una etiqueta <p>, ubicada mediante id 
        $(`#count-${DOM_ID}`).html(result.dataset[0].count);
    } else {
        console.log(response);
    }
}