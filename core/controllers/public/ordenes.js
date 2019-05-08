$(document).ready(() => {
    showTable();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiPedidos = '../../core/api/pedidos.php?site=public&action=';

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

//Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content += `
            <tr id="${row.idPedido}" onclick="modalUpdate(${row.idPedido})" class="text-center">
                <th scope="row" class="py-4">
                    <div class="media align-items-center">
                    <span class="mb-0 text-sm">${row.idPedido}</span>
                    </div>
                </th>
                <td class="py-4">
                    ${row.fecha}
                </td>
                <td class="py-4">
                    ${getTipoEstado(row.estado)}
                </td>
                <td class="py-4">
                    $ ${row.montoTotal}
                </td>
            </tr>
        `;
    });
    $('#tbody-read-pedidos').html(content);
}

function getTipoEstado(idEstado) {
    idEstado = parseInt(idEstado)
    switch(idEstado){
        case 0: return 'Pagado';
        case 1: return 'Enviado';
        case 2: return 'Cancelado';
        default: return 'Error al obtener tipo estado';
    }
}

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

function fillTableDetalle(rows) {
    console.log(rows)
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