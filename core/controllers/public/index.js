
$(document).ready(() => {
    showCategories();
})
//Constante para establecer la ruta y parámetros de comunicación con la API
const apiCategorias = '../../core/api/categorias.php?site=public&action=';

//Función para obtener y mostrar los registros disponibles
const showCategories = async () => {
    const response = await $.ajax({
        url: apiCategorias + 'readCategoria',
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
        fillContainer(result.dataset);
    } else {
        console.log(response);
    }
}

//Función para llenar div con tarjetas de categorias
function fillContainer(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content += `
            <!-- Empieza una categoria -->
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card bg-dark text-white">
                <img src="../../resources/img/categories/${row.img}" class="card-img categorias-inicio" alt="comic">
                <div class="card-img-overlay">
                    <h5 class="card-title">${row.nombreCat}</h5>
                    <p class="card-text">${row.descripcion}</p>
                    <a href="all.products.php?categoria=${row.idCategoria}" class="btn btn-success">Ver más</a>
                </div>
                </div>
            </div>
            <!-- Termina una categoria -->
        `;
    });
    $('div#categoria-container').html(content);
}