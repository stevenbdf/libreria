$(document).ready(() => {
    showTable();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiPedidos = '../../core/api/pedidos.php?site=dashboard&action=';

//Función para obtener y mostrar los registros disponibles
const showTable = async () => {
    const response = await $.ajax({
        url: apiPedidos + 'readPedidos',
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
    $('#pedidos').DataTable().destroy();
    showTable();
})

function getTipoEstado(idEstado) {
    idEstado = parseInt(idEstado)
    switch(idEstado){
        case 0: return 'Reservado';
        case 1: return 'Pagado';
        case 2: return 'Cancelado';
        case 3: return 'Anulado';
        default: return 'Error al obtener tipo estado';
    }
}

//Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content += `
            <tr id="${row.idPedido}">
                <th scope="row">
                    <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">${row.idPedido}</span>
                    </div>
                </th>
                <td>
                    ${row.nombreCliente}
                </td>
                <td>
                    ${row.fecha}
                </td>
                <td>
                    ${getTipoEstado(row.estado)}
                </td>
                <td class="text-center" style="width:35%">
                    <button type="button" onclick="modalUpdate(${row.idPedido})" class="mr-2  btn btn-warning text-white">
                        <i class="material-icons mr-2">edit</i>Ver
                    </button>
                </td> 
            </tr>
        `;
    });
    $('#tbody-read-pedidos').html(content);
    $('#pedidos').DataTable({
        "language": {
            "url": "../../resources/js/material/espaniol.json"
        }
    });
}

function fillTableDetalle(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    var i = 1;
    var valoresProductos = {
        cantidad: [],
        precioVenta: []
    };
    rows.forEach(function (row) {
        valoresProductos.cantidad.push(parseFloat(row.cantidad));
        valoresProductos.precioVenta.push(parseFloat(row.precioVenta));
        content += `
            <tr id="${row.idDetalle}">
                <th scope="row">
                    <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">${i}</span>
                    </div>
                </th>
                <td>
                    ${row.nombreL}
                </td>
                <td>
                    ${row.cantidad}
                </td>
                <td>
                    ${row.precioVenta}
                </td>
            </tr>
        `;
        i++;
    });
    $('#tbody-read-detalle-pedidos').html(content);
    var total = 0;
    rows.map( (item, index) => {
        total = total + (valoresProductos.cantidad[index] * valoresProductos.precioVenta[index]);
    })
    $('#total').val(total);
}

/*---------------Funciones CRUD---------------*/

//Función para crear un nuevo registro
$('#form-create-autor').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiPedidos + 'create',
        type: 'post',
        data: new FormData($('#form-create-autor')[0]),
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
            $('#form-create-autor')[0].reset();
            $('#guardarAutoresModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Autor guardado correctamente.',
                    'success'
                )
                $('#autores').DataTable().destroy();
                showTable();

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

//Función para mostrar formulario con registro a modificar
const modalUpdate = async id => {
    const response = await $.ajax({
        url: apiPedidos + 'getPedido',
        type: 'post',
        data: {
            idPedido: id
        },
        datatype: 'json'
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
        if (result.status) {
            $('#form-pedidos')[0].reset();
            $('#idPedido').val(result.dataset.idPedido);
            $('#idCliente').val(result.dataset.idCliente);
            $('#cliente').val(result.dataset.nombreCliente);
            $('#fecha').val(result.dataset.fecha);
            $('#estado').val(getTipoEstado(parseInt(result.dataset.estado)));
            const response = await $.ajax({
                url: apiPedidos + 'readDetallePedido',
                type: 'post',
                data: {
                    idPedido: id
                },
                datatype: 'json'
            }).fail(function (jqXHR) {
                //Se muestran en consola los posibles errores de la solicitud AJAX
                console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
            });

            if(isJSONString(response)) {
                const result = JSON.parse(response);
                if(result.status) {
                    fillTableDetalle(result.dataset)
                }else{
                    console.log('error:',result.exception)
                }
            }

            $('#modificarPedidoModal').modal('toggle');
        } else {
            console.log(result.exception)
        }
        //agregar logica para mostrar modal y c
    } else {
        console.log(response);
    }
}

//Función para modificar un registro seleccionado previamente
$('#form-update-autor').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiPedidos + 'update',
        type: 'post',
        data: new FormData($('#form-update-autor')[0]),
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
            $('#modificarAutoresModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Autor modificado correctamente.',
                    'success'
                )
            }
            $('#autores').DataTable().destroy();
            showTable();
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

//Función para eliminar un registro seleccionado
function confirmDelete(id) {
    swal({
        title: 'Advertencia',
        text: '¿Quiere eliminar el Autor?',
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
                url: apiPedidos + 'delete',
                type: 'post',
                data: {
                    idAutor: id
                },
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
                            'Autor eliminado correctamente.',
                            'success'
                        )
                        $('#autores').DataTable().destroy();
                        showTable();
                    }

                } else {
                    Swal.fire(
                        'Error',
                        result.exception,
                        'error'
                    )
                }
            } else {
                console.log(response);
            }
        }
    });
}

