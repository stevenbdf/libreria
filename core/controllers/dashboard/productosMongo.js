$(document).ready(() => {
    showTable();
    showOptions();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiProductos = '../../core/helpers/mongoDB/databaseMongo.php?action=';

const showOptions = async () => {
    const autores = await ajaxRequest(apiProductos, 'readAutores');

    const editoriales = await ajaxRequest(apiProductos, 'readEditorial');

    const categorias = await ajaxRequest(apiProductos, 'readCategoria');

    let autoresOpt = '<option value="0"> </option>';
    autores.map(item => {
        autoresOpt += `<option value="${item.idAutor}">${item.nombre} ${item.apellido}</option>)`;
    })

    let editorialesOpt = '<option value="0"> </option>';
    editoriales.map(item => {
        editorialesOpt += `<option value="${item.idEditorial}">${item.nombreEdit}</option>)`;
    })

    let categoriasOpt = '<option value="0"> </option>';
    categorias.map(item => {
        categoriasOpt += `<option value="${item.idCategoria}">${item.nombreCat} Desc. ${item.descuento}%</option>)`;
    })

    $('#autorSelect').html(autoresOpt);
    $('#autorSelect-update').html(autoresOpt);

    $('#editorialSelect').html(editorialesOpt);
    $('#editorialSelect-update').html(editorialesOpt);

    $('#categoriaSelect').html(categoriasOpt);
    $('#categoriaSelect-update').html(categoriasOpt);
}

/*  Función reutilizable para obtener registros
    @param {string} API - ruta de API
    @param {string} functionName - nombre de la función para buscar en la API
    @returns {array}
*/
const ajaxRequest = async (API, functionName) => {
    const response = await $.ajax({
        url: API + `${functionName}`
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
        return result.dataset;
    } else {
        console.log(response);
    }
}


//Función para obtener y mostrar los registros disponibles
const showTable = async () => {
    const response = await $.ajax({
        url: apiProductos + 'readProductos',
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

//Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content += `
            <tr id="${row.idLibro}">
                <th scope="row">
                    <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">${row.idLibro}</span>
                    </div>
                </th>
                <td>
                    ${limitText(row.NombreL)}
                </td>
                <td>
                    <img src="../../resources/img/books/${row.img}" width="120" height="160">
                </td>
                <td>
                    ${row.categoria}
                </td>
                <td>
                    ${row.nombreAutor} ${row.apellidoAutor}
                </td>
                <td>
                    ${row.editorial}
                </td>
                <td>
                    ${row.cant}
                </td>
                <td>
                    <strong>$${row.precio}</strong>
                </td>
                <td>
                    <strong>${row.descuento}%</strong>
                </td>
                <td>
                    <strong>$${( row.precio * (100 - row.descuento)/100).toFixed(2)}</strong>
                </td>
                <td  style="width: 35%">
                    <button type="button" onclick="modalUpdate(${row.idLibro})" class="mr-2 mt-lg-2 btn btn-warning text-white w-100">
                        <i class="material-icons mr-2">edit</i>Editar
                    </button>
                    <button type="button" onclick="confirmDelete(${row.idLibro},'${row.img}')" class="mr-2 mt-lg-2 btn btn-danger w-100">
                        <i class="material-icons mr-2">delete</i>Eliminar
                    </button> 
                </td> 
            </tr>
        `;
    });
    $('#tbody-read-productos').html(content);
    $('#productos').DataTable({
        "language": {
            "url": "../../resources/js/material/espaniol.json"
        }
    });
}

function limitText(descripcion) {
    var descripcionCorta = '';
    const limiteCaracteres = 35;
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

//Función para mostrar formulario con registro a modificar
const modalUpdate = async id => {
    const response = await $.ajax({
        url: apiProductos + 'getProducto',
        type: 'post',
        data: {
            idProducto: id
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
        console.log(result)
        if (result.status) {
            console.log(result.dataset)
            const dataset = result.dataset[0];
            $('#form-update-producto')[0].reset();
            $('#idLibro').val(dataset.idLibro);
            $('#autorSelect-update').val(dataset.idAutor);
            $('#editorialSelect-update').val(dataset.idEditorial);
            $('#categoriaSelect-update').val(dataset.idCat);
            $('#titulo-update').val(dataset.NombreL);
            $('#idioma-update').val(dataset.Idioma);
            $('#noPaginas-update').val(dataset.NoPag);
            $('#encuadernacion-update').val(dataset.encuadernacion);
            $('#resena-update').val(dataset.resena);
            $('#precio-update').val(dataset.precio);
            $('#cantidad-update').val(dataset.cant);
            var content = `<img src="../../resources/img/books/${dataset.img}" width="240" height="320">`;
            $('#imagen-update-container').html(content);
            $('#imagen-producto').val(dataset.img);
            $('#modificarProductosModal').modal('toggle');
        } else {
            swal('Error',
                result.exception,
                'error'
            )
        }
    } else {
        console.log(response);
    }
}