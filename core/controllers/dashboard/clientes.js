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
                    ${validateButtons(row.idCliente, row.estado)}
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

function validateButtons(idCliente, estado) {
    if (parseInt(estado)) {
        return `
        <button type="button" onclick="deshabilitar(${idCliente})" class="mr-2 btn btn-danger w-100">
            <i class="material-icons mr-2">close</i>Deshabilitar
        </button>
        `;
    } else {
        return `
        <button type="button" onclick="habilitar(${idCliente})" class="mr-2 btn btn-success w-100">
            <i class="material-icons mr-2">check</i>Habilitar
        </button> 
        `;
    }
}

//Función para eliminar un registro seleccionado
function deshabilitar(idCliente) {
    swal({
        title: 'Advertencia',
        text: '¿Quiere deshabilitar al cliente?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borralo.',
        closeOnConfirm: false,
        closeOnCancel: true
    },
        async (isConfirm) => {
            if (isConfirm) {
                const response = await $.ajax({
                    url: apiClientes + 'deshabilitar',
                    type: 'post',
                    data: { idCliente },
                    datatype: 'json'
                })
                //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                if (isJSONString(response)) {
                    const result = JSON.parse(response);
                    //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                    if (result.status) {
                        if (result.status == 1) {
                            swal(
                                'Operación Correcta',
                                'Cliente deshabilitado correctamente.',
                                'success'
                            )
                        }
                        $('#clientes').DataTable().destroy();
                        showTable();
                    } else {
                        swal(
                            'Error',
                            result.exception,
                            'error'
                        )
                    }
                } else {
                    swal(
                        'Error',
                        response,
                        'error'
                    )
                }
            }
        });
}

//Función para eliminar un registro seleccionado
function habilitar(idCliente) {
    swal({
        title: 'Advertencia',
        text: '¿Quiere habilitar al cliente?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borralo.',
        closeOnConfirm: false,
        closeOnCancel: true
    },
        async (isConfirm) => {
            if (isConfirm) {
                const response = await $.ajax({
                    url: apiClientes + 'habilitar',
                    type: 'post',
                    data: { idCliente },
                    datatype: 'json'
                })
                //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                if (isJSONString(response)) {
                    const result = JSON.parse(response);
                    //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                    if (result.status) {
                        if (result.status == 1) {
                            swal(
                                'Operación Correcta',
                                'Cliente habilitado correctamente.',
                                'success'
                            )
                        }
                        $('#clientes').DataTable().destroy();
                        showTable();
                    } else {
                        swal(
                            'Error',
                            result.exception,
                            'error'
                        )
                    }
                } else {
                    swal(
                        'Error',
                        response,
                        'error'
                    )
                }
            }
        });
}