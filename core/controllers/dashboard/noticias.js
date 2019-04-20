$(document).ready(() => {
    showTable();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiNoticia= '../../core/api/noticia.php?site=dashboard&action=';

//Función para obtener y mostrar los registros disponibles
const showTable = async () => {
    const response = await $.ajax({
        url: apiNoticia  + 'readNoticia',
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
    $('#noticia').DataTable().destroy();
    showTable();
})

//Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content += `
            <tr id="${row.idNoticia}">
                <th scope="row">
                    <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">${row.idNoticia}</span>
                    </div>
                </th>
                <td>
                    ${row.nombreEmpleado}
                </td>
                <td>
                    ${row.fecha}
                </td>
                <td>
                    ${row.titulo}
                </td>
                <td>
                    ${row.descripcion}
                </td>
                <td>
                    ${row.img}
                </td>
                <td class="text-center">
                    <button type="button" onclick="modalUpdate(${row.idNoticia})" class="mr-2 btn btn-warning text-white">
                        <i class="material-icons mr-2">edit</i>Editar
                    </button>
                    <button type="button" onclick="confirmDelete(${row.idNoticia})" class="mr-2 btn btn-danger">
                        <i class="material-icons mr-2">delete</i>Eliminar
                    </button> 
                </td> 
            </tr>
        `;
    });
    $('#tbody-read-noticia').html(content);
    $('#noticia').DataTable({
        "language": {
            "url": "../../resources/js/material/espaniol.json"
        }
    });
}

/*---------------Funciones CRUD---------------*/

//Función para crear un nuevo registro
$('#form-create-noticia').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiNoticia + 'create',
        type: 'post',
        data: new FormData($('#form-create-noticia')[0]),
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
            $('#form-create-noticia')[0].reset();
            $('#guardarNoticiaModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Autor guardado correctamente.',
                    'success'
                )
                $('#noticia').DataTable().destroy();
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
        url: apiNoticia + 'get',
        type: 'post',
        data: {
            idNoticia: id
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
            $('#form-update-noticia')[0].reset();
            $('#idNoticia').val(result.dataset.idNoticia);
            $('#tituloNoticia').val(result.dataset.titulo);
            $('#descripcionNoticia').val(result.dataset.descripcion);
            $('#imagenNoticia').val(result.dataset.img);
            $('#modificarNoticiaModal').modal('toggle');
        } else {
            console.log(result.exception)
        }
    } else {
        console.log(response);
    }
}

//Función para modificar un registro seleccionado previamente
$('#form-update-noticia').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiNoticia + 'update',
        type: 'post',
        data: new FormData($('#form-update-noticia')[0]),
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
            $('#modificarNoticiaModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Autor modificado correctamente.',
                    'success'
                )
            }
            $('#noticia').DataTable().destroy();
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
                url: apiNoticia + 'delete',
                type: 'post',
                data: {
                    idNoticia: id
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
                        $('#noticia').DataTable().destroy();
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

