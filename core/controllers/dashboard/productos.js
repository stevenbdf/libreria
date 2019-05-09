$(document).ready(() => {
    showTable();
    showOptions();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiProductos = '../../core/api/productos.php?site=dashboard&action=';

const apiAutores = '../../core/api/autores.php?site=dashboard&action=';

const apiEditoriales = '../../core/api/editorial.php?site=dashboard&action=';

const apiCategorias = '../../core/api/categorias.php?site=dashboard&action=';

const showOptions = async () => {
    const autores = await ajaxRequest(apiAutores, 'readAutores');

    const editoriales = await ajaxRequest(apiEditoriales, 'readEditorial');

    const categorias = await ajaxRequest(apiCategorias, 'readCategoria');

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

//Función para recargar manualmente el datatable
$('#reload').click(async () => {
    $('#productos').DataTable().destroy();
    showTable();
})

//Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        const aprob = row.aprobacion;
        const colorTd = aprob >= 70 ? 'green' : aprob >= 50 && aprob <= 69 ? 'orange' : 'red';
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
                    ${row.nombreCat}
                </td>
                <td style="color: ${colorTd}">
                   <p style="font-weight: bold">${row.aprobacion}%</p>
                </td>
                <td>
                    ${row.nombreAutor} ${row.apellidoAutor}
                </td>
                <td>
                    ${row.editorial}
                </td>
                <td>
                    ${row.cantidad}
                </td>
                <td>
                    <strong>$${row.precio}</strong>
                </td>
                <td>
                    <strong>${row.descuento}%</strong>
                </td>
                <td>
                    <strong>$${row.precioFinal}</strong>
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

/*---------------Funciones CRUD---------------*/

//Función para crear un nuevo registro
$('#form-create-producto').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiProductos + 'create',
        type: 'post',
        data: new FormData($('#form-create-producto')[0]),
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
            $('#form-create-producto')[0].reset();
            $('#guardarProductosModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Producto guardado correctamente.',
                    'success'
                )
                $('#productos').DataTable().destroy();
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
        swal(
            'Error',
            response,
            'error'
        )
    }
})

//Función para mostrar formulario con registro a modificar
const modalUpdate = async id => {
    const response = await $.ajax({
        url: apiProductos + 'get',
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
        if (result.status) {
            $('#form-update-producto')[0].reset();
            $('#idLibro').val(result.dataset.idLibro);
            $('#autorSelect-update').val(result.dataset.idAutor);
            $('#editorialSelect-update').val(result.dataset.idEditorial);
            $('#categoriaSelect-update').val(result.dataset.idCat);
            $('#titulo-update').val(result.dataset.NombreL);
            $('#idioma-update').val(result.dataset.Idioma);
            $('#noPaginas-update').val(result.dataset.NoPag);
            $('#encuadernacion-update').val(result.dataset.encuadernacion);
            $('#resena-update').val(result.dataset.resena);
            $('#precio-update').val(result.dataset.precio);
            $('#cantidad-update').val(result.dataset.cantidad);
            $('#aprobacion').val(result.dataset.aprobacion + '%');
            $('#likes').val(result.dataset.likes);
            $('#dislikes').val(result.dataset.dislikes);
            var content = `<img src="../../resources/img/books/${result.dataset.img}" width="240" height="320">`;
            $('#imagen-update-container').html(content);
            $('#imagen-producto').val(result.dataset.img);
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

//Función para modificar un registro seleccionado previamente
$('#form-update-producto').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiProductos + 'update',
        type: 'post',
        data: new FormData($('#form-update-producto')[0]),
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
            $('#modificarProductosModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Producto modificado correctamente.',
                    'success'
                )
            } else if (result.status == 2) {
                swal(
                    '¡Atención!',
                    'Producto modificado ' + result.exception,
                    'success'
                )
            } else if (result.status == 3){
                swal(
                    '¡Atención!',
                    'Producto modificado ' + result.exception,
                    'warning'
                )
            }
            $('#productos').DataTable().destroy();
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
})

//Función para eliminar un registro seleccionado
function confirmDelete(id, file) {
    swal({
        title: 'Advertencia',
        text: '¿Quiere eliminar el producto?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrala.',
        closeOnConfirm: false,
        closeOnCancel: true
    },
        async (isConfirm) => {
            if (isConfirm) {
                const response = await $.ajax({
                    url: apiProductos + 'delete',
                    type: 'post',
                    data: {
                        idLibro: id,
                        imagenProducto: file
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
                                'Producto eliminado correctamente.',
                                'success'
                            )

                        } else if (result.status == 2) {
                            swal(
                                'Operación parcialmente correcta',
                                'Producto eliminado.' + result.exception,
                                'warning'
                            )
                        }
                        $('#productos').DataTable().destroy();
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