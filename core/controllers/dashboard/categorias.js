$(document).ready(() => {
    showTable();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiCategoria = '../../core/api/categorias.php?site=dashboard&action=';

//Función para obtener y mostrar los registros disponibles
const showTable = async () => {
    const response = await $.ajax({
        url: apiCategoria + 'readCategoria',
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
    $('#categoria').DataTable().destroy();
    showTable();
})

//Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content += `
            <tr id="${row.idCategoria}">
                <th scope="row">
                    <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">${row.idCategoria}</span>
                    </div>
                </th>
                <td>
                    ${row.nombreCat}
                </td>
                <td>
                    ${limitText(row.descripcion)}
                </td>
                <td>
                    <img src="../../resources/img/categories/${row.img}" width="160" height="120">
                </td>
                <td>
                    ${row.descuento}
                </td>
                <td class="text-center" style="width:35%">
                    <button type="button" data-toggle="modal" data-target="#modificarCategoriaModal" onclick="modalUpdate(${row.idCategoria})" class="mr-2 btn btn-warning text-white">
                        <i class="material-icons mr-2">edit</i>Editar
                    </button>
                    <button type="button" onclick="confirmDelete(${row.idCategoria},'${row.img}')" class="mr-2 btn btn-danger">
                        <i class="material-icons mr-2">delete</i>Eliminar
                    </button> 
                </td> 
            </tr>
        `;
    });
    $('#tbody-read-categoria').html(content);
    $('#categoria').DataTable({
        "language": {
            "url": "../../resources/js/material/espaniol.json"
        }
    });
}

function limitText(descripcion) {
    var descripcionCorta = '';
    const limiteCaracteres = 60;
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

/*---------------Funciones CRUD---------------*/

//Función para crear un nuevo registro
$('#form-create-categoria').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiCategoria + 'create',
        type: 'post',
        data: new FormData($('#form-create-categoria')[0]),
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
            $('#form-create-categoria')[0].reset();
            $('#guardarCategoriaModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Categoria guardado correctamente.',
                    'success'
                )
                $('#categoria').DataTable().destroy();
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
        console.log(response)
    }
})

//Función para mostrar formulario con registro a modificar
const modalUpdate = async id => {

    const response = await $.ajax({
        url: apiCategoria + 'get',
        type: 'post',
        data: {
            idCategoria: id
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
            $('#form-update-categoria')[0].reset();
            $('#idCategoria').val(result.dataset.idCategoria);
            $('#nombreCategoria').val(result.dataset.nombreCat);
            $('#descripcion-update').val(result.dataset.descripcion);
            var content = `<img src="../../resources/img/categories/${result.dataset.img}" width="320" height="240">`;
            $('#imagen-update-container').html(content);
            $('#imagen-categoria').val(result.dataset.img);
            $('#descuentoCategoria').val(result.dataset.descuento);
        } else {
            console.log(result.exception)
        }
    } else {
        console.log(response);
    }
}

//Función para modificar un registro seleccionado previamente
$('#form-update-categoria').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiCategoria + 'update',
        type: 'post',
        data: new FormData($('#form-update-categoria')[0]),
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
            $('#modificarCategoriaModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Categoria modificada correctamente.',
                    'success'
                )
            } else if (result.status == 2) {
                swal(
                    '¡Atención!',
                    'Categoria modificada.' + result.exception,
                    'success'
                )
            } else if (result.status == 3) {
                swal(
                    '¡Atención!',
                    'Categoria modificada.' + result.exception,
                    'warning'
                )
            }
            $('#categoria').DataTable().destroy();
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
function confirmDelete(id, file) {
    swal({
        title: 'Advertencia',
        text: '¿Quiere eliminar la Categoria?',
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
                    url: apiCategoria + 'delete',
                    type: 'post',
                    data: {
                        idCategoria: id,
                        imagenCategoria: file
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
                                'Categoria eliminada correctamente.',
                                'success'
                            )
                        } else if (result.status == 2) {
                            swal(
                                'Operación parcialmente correcta',
                                'Categoria eliminada.' + result.exception,
                                'warning'
                            )
                        }
                        $('#categoria').DataTable().destroy();
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



