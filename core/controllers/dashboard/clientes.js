$(document).ready(() => {
    showTable();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiClientes = '../../core/api/clientes.php?site=dashboard&action=';

//Función para obtener y mostrar los registros disponibles
const showTable = async () => {
    const response = await $.ajax({
        url: apiClientes + 'read',
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
            console.log(result.exception)
        }
        fillTable(result.dataset)
    } else {
        console.log(response);
    }
}

//Función para recargar manualmente el datatable
$('#reload').click(async () => {
    $('#clientes').DataTable().destroy();
    showTable();
})

//Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content += `
            <tr id="${row.idCliente}">
                <th scope="row">
                    <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">${row.idCliente}</span>
                    </div>
                </th>
                <td>
                    ${row.nombreCliente}
                </td>
                <td>
                    ${row.apellidoCliente}
                </td>
                <td>
                    ${row.correo}
                </td>
                <td>
                    ${row.direccion}
                </td>
                <td>
                    <img src="../../resources/img/clients/${row.img}" width="150" height="150">
                </td>
                <td class="text-center">
                    <button type="button" onclick="confirmDelete(${row.idCliente})" class="mr-2 btn btn-danger w-100">
                        <i class="material-icons mr-2">delete</i>Eliminar
                    </button> 
                </td> 
            </tr>
        `;
    });
    $('#tbody-read-clientes').html(content);
    $('#clientes').DataTable({
        "language": {
            "url": "../../resources/js/material/espaniol.json"
        }
    });
}
 

