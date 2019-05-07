
$(document).ready(() => {
    showCartItems();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiProductos = '../../core/api/productos.php?site=public&action=';
const apiPedidos = '../../core/api/pedidos.php?site=public&action=';

//Función para obtener y mostrar los registros disponibles
const showCartItems = async () => {
    const response = await $.ajax({
        url: apiProductos + 'readCartItems',
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
            console.log(result.exception);
        }
        fillContainer(result.dataset, result.carrito)
    } else {
        console.log(response);
    }
}

//Función para llenar div con tarjetas de categorias
function fillContainer(rows, carrito) {
    let content = '';
    var total = 0;
    var vecesRecorrido = 0;
    var index = 0;
    while (vecesRecorrido < rows.length) {
        if (carrito[index] != undefined) {
            rows.forEach(row => {
                if (carrito[index][row.idLibro] != undefined) {
                    total = total + parseFloat(row.precioFinal * carrito[index][row.idLibro].cantidad);
                    content += `
                        <!-- Empieza un producto-->
                        <div class="col-md-3 d-flex justify-content-around">
                            <img src="../../resources/img/books/${row.img}" width="120" height="150" alt="..." />
                        </div>
                        <div class="col-md-3 d-flex justify-content-around">
                            <h4 class="my-auto">${row.NombreL}</h4>
                        </div>
                        <div class="col-md-2 d-flex justify-content-left">
                            <h4 class="my-auto text-center w-100">$${(parseFloat(row.precioFinal)).toFixed(2)}</h4>
                        </div>
                        <div class="col-md-2 d-flex flex-md-column align-items-center justify-content-center flex-lg-row">
                            <button onclick="addCartItems(${row.idLibro})" class="btn btn-info btn-sm my-auto mr-md-0 mr-lg-1"><i class="fas fa-plus" style="max-height: 18px"></i></button>
                            <input readonly type="number" class="form-control text-center my-auto" style="max-width: 40%" value="${carrito[index][row.idLibro].cantidad}">
                            <button onclick="deleteCartItems(${row.idLibro})" class="btn btn-danger btn-sm my-auto ml-2 ml-md-0 ml-lg-2"><i class="fas fa-minus" style="max-height: 18px"></i></button>
                        </div>
                        <div class="col-md-2 d-flex justify-content-left">
                            <h4 class="my-auto text-center w-100">$${(parseFloat(row.precioFinal * carrito[index][row.idLibro].cantidad)).toFixed(2)}</h4>
                        </div>
                        <div class="col-12 mt-2 mb-2" style="background-color: #5e72e4; height: 2px;"></div>
                        <!-- Termina una productos -->
                    `;
                }

            });
            vecesRecorrido++;
        }
        index++;
    }
    if (total > 0) {
        $('p#total-carrito').html(`<strong>Total: $${(total).toFixed(2)}</strong>`);
        $('button#pagar-button').removeClass('d-none');
    } else {
        $('button#pagar-button').addClass('d-none');
    }
    $('div#productos-container').html(content);
}

//Función para borrar elementos del carrito
const deleteCartItems = async (idProducto) => {
    const response = await $.ajax({
        url: apiPedidos + 'deleteCart',
        type: 'post',
        data: { idProducto },
        datatype: 'json'
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (!result.status) {
            console.log(result.exception);
        } else {
            location.reload();
        }
    } else {
        console.log(response);
    }
}

//Función para borrar elementos del carrito
const addCartItems = async (idProducto) => {
    const response = await $.ajax({
        url: apiPedidos + 'addItemCart',
        type: 'post',
        data: { idProducto },
        datatype: 'json'
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (!result.status) {
            console.log(result.exception);
        } else {
            location.reload();
        }
    } else {
        console.log(response);
    }
}

//Función para pagar pedido
const pagarPedido = async () => {
    const response = await $.ajax({
        url: apiPedidos + 'addPedido',
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
            console.log(result.exception);
        } else {
            swal(
                'Felicidades',
                'Compra realizada con exito',
                'success'
            );
            setTimeout(() => {
                location.reload();
            }, 3000);
        }
    } else {
        console.log(response);
    }
}