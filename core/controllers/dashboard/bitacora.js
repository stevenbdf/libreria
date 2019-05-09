$(document).ready(() => {
    showTable();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiBitacora = '../../core/api/bitacoras.php?site=dashboard&action=';

//Función para obtener y mostrar los registros disponibles
const showTable = async () => {
    const response = await $.ajax({
        url: apiBitacora + 'readBitacora',
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
            swal('Error',
                result.exception,
                'error'
            )
        }
        fillTable(result.dataset)
    } else {
        console.log(response);
    }
}

//Función para recargar manualmente el datatable
$('#reload').click(async () => {
    $('#bitacora').DataTable().destroy();
    showTable();
})

//Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content += `
            <tr id="${row.idBitacora}">
                <th scope="row">
                    <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">${row.idBitacora}</span>
                    </div>
                </th>
                <td>
                    ${row.nombreEmpleado}
                </td>
                <td>
                    ${row.fecha}
                </td>
                <td>
                    ${row.accion}
                </td>
            </tr>
        `;
    });
    $('#tbody-read-bitacora').html(content);
    $('#bitacora').DataTable({
        "language": {
            "url": "../../resources/js/material/espaniol.json"
        }
    });
}




