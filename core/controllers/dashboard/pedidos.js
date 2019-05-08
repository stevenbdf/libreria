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

//Función para obtener el nombre y elemento de acuerdo al estado
function getTipoEstado(idEstado) {
    idEstado = parseInt(idEstado)
    switch(idEstado){
        case 0: return '<span class="badge p-2 badge-info d-flex justify-content-center">Pagado</span>';
        case 1: return '<span class="badge p-2 badge-success d-flex justify-content-center">Enviado</span>';
        case 2: return '<span class="badge p-2 badge-danger d-flex justify-content-center">Cancelado</span>';
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
                    <div class="media align-items-center">
                    <span class="mb-0 text-sm">${row.idPedido}</span>
                    </div>
                </th>
                <td>
                    ${row.nombreCliente} ${row.apellidoCliente}
                </td>
                <td>
                    ${row.correo}
                </td>
                <td style="width:12%">
                    ${row.fecha}
                </td>
                <td>
                    $${row.montoTotal}
                </td>
                <td >
                    ${getTipoEstado(row.estado)}
                </td>
                <td class="text-center" >
                    <button type="button" onclick="modalUpdate(${row.idPedido})" class="w-100 mr-2  btn btn-warning text-white">
                        <i class="material-icons mr-2">edit</i>Cambiar estado
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

//Función para llenar la tabla con el detalle de cada producto por pedido
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
    $('#total').val(total.toFixed(2));
}

/*---------------Funciones CRUD---------------*/

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
            $('#cliente').val(result.dataset.nombreCliente + ' ' + result.dataset.apellidoCliente);
            $('#fecha').val(result.dataset.fecha);
            $('#estado').val(parseInt(result.dataset.estado));
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
$('#form-pedidos').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiPedidos + 'updateEstado',
        type: 'post',
        data: {
            idPedido: parseInt($('#idPedido').val()),
            estado: parseInt($('#estado').val())
        },
        datatype: 'json'
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (result.status) {
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Autor modificado correctamente.',
                    'success'
                )
            }
            $('#modificarPedidoModal').modal('toggle');
            $('#pedidos').DataTable().destroy();
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