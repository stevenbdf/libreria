$(document).ready(() => {
    showProducts();
})
//Constante para establecer la ruta y parámetros de comunicación con la API
const apiProductos = '../../core/api/productos.php?site=public&action=';
const apiPedidos = '../../core/api/pedidos.php?site=public&action=';

var precioProductoActual = [];

function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function (item) {
            tmp = item.split("=");
            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}

//Función para obtener y mostrar los registros disponibles
const showProducts = async () => {
    const response = await $.ajax({
        url: apiProductos + 'readProductosByCategory',
        type: 'post',
        data: {
            idCategoria: (findGetParameter('categoria'))
        },
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
            $('h1#titulo').html(result.exception);
        }
        console.log(result.dataset)
        $('h1#titulo').html(result.dataset[0].nombreCat);
        fillContainer(result.dataset);
    } else {
        console.log(response);
    }
}

function limitText(descripcion) {
    var descripcionCorta = '';
    const limiteCaracteres = 120;
    for (let index = 0; index < limiteCaracteres; index++) {
        if (descripcion[index] !== undefined) {
            index !== limiteCaracteres - 1
                ? descripcionCorta = descripcionCorta + descripcion[index]
                : descripcionCorta = descripcionCorta + '...';
        } else {
            break;
        }
    }
    return descripcionCorta;
}

function printDescuento(row) {
    precioProductoActual[row.idLibro] = row.precioFinal;
    if (row.descuento != "0") {
        return (`<h5 class="d-inline" style="font-size: 16px !important; text-decoration:line-through; font-weight: 200;">$${row.precio}</h5><h5 class="d-inline ml-3" style="font-size: 20px !important;">$${row.precioFinal}</h5> `)
    } else {
        return (`<h5 style="font-size: 20px !important;">$${row.precioFinal}</h5>`);
    }
    
}


//Función para llenar div con tarjetas de categorias
function fillContainer(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        const aprob = row.aprobacion;
        const colorT = aprob >= 70 ? 'green' : aprob >= 50 && aprob <= 69 ? 'orange' : 'red';
        
        content += `
            <!-- Empieza un producto-->
            <div class="card pb-md-4 pb-lg-0 card-lift--hover shadow border-0">
                <img src="../../resources/img/books/${row.img}" class="card-img-top card-img-book" alt="...">
                <div class="card-body">
                    <h3 class="card-title" style="color: #5e72e4 !important;">${row.NombreL}</h3>
                    <div class="row">
                        <div class="col-12 mb-2 ">
                            <h5 class="d-inline" style="font-size: 16px !important;">Aprobación:</h5> <h5 class="d-inline m-3" style="font-size: 20px !important; color: ${colorT} !important; font-weight: 200;">${row.aprobacion}%</h5>
                        </div>
                        <div class="col-12">
                                <h4 style="font-size: 20px !important; font-weight: 400;">${row.nombreAutor} ${row.apellidoAutor}</h4>
                                
                        </div>     
                    </div>
                    ${printDescuento(row)}
                    <p class="card-text">${limitText(row.resena)}</p>
                    <a href="product.php?id=${row.idLibro}" class="btn btn-success float-left float-lg-none">Ver más</a> <button onclick="addCart('${row.idLibro}')"
                        class="btn btn-primary float-right float-lg-none"><i class="fas fa-shopping-cart"></i></button>
                </div>
            </div>
            <!-- Termina una productos -->
        `;
    });
    $('div#productos-all-container').html(content);
}

//Función para agregar un comentario
const addCart = async (idProducto) => {
    const response = await $.ajax({
        url: apiPedidos + 'addCart',
        type: 'post',
        data: {
            idProducto,
            cantidad: 1,
            precioVenta: precioProductoActual[idProducto]
        },
        datatype: 'json'
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (result.status == 1) {
            console.log(result.dataset)
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
}