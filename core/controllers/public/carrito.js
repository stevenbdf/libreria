
$(document).ready(() => {
    showCartItems();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiProductos = '../../core/api/productos.php?site=public&action=';

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
        console.log(result.dataset)
        fillContainer(result.dataset, result.carrito)
    } else {
        console.log(response);
    }
}

//Función para llenar div con tarjetas de categorias
function fillContainer(rows, carrito) {
    let content = '';
    console.table(rows);
    console.log(carrito)
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row, index) {
        content += `
            <!-- Empieza un producto-->
            <div class="col-6 d-flex justify-content-around">
                <img src="../../resources/img/books/${row.img}" width="120" height="150" alt="..." />
                <h4 class="my-auto">${row.NombreL}</h4>
            </div>
            <div class="col-2 d-flex justify-content-left">
                <h4 class="my-auto">$${row.precioFinal}</h4>
            </div>
            <div class="col-2 d-flex justify-content-center">
                <button class="btn btn-info btn-sm my-auto"><i class="fas fa-plus" style="max-height: 18px"></i></button>
                <input readonly type="number" class="form-control text-center my-auto" style="max-width: 40%" value="${carrito[index][row.idLibro].cantidad}">
                <button class="btn btn-danger btn-sm my-auto ml-2"><i class="fas fa-minus" style="max-height: 18px"></i></button>
            </div>
            <div class="col-2 d-flex justify-content-left">
                <h4 class="my-auto">$${row.precioFinal * carrito[index][row.idLibro].cantidad}</h4>
            </div>
            <div class="col-12 mt-2 mb-2" style="background-color: #5e72e4; height: 2px;"></div>
            <!-- Termina una productos -->
        `;
    });
    $('div#productos-container').html(content);
}