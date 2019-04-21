$(document).ready(() => {
    showTable();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiEmpleados = '../../core/api/empleado.php?site=dashboard&action=';

//Función para obtener y mostrar los registros disponibles
const showTable = async () => {
    const response = await $.ajax({
        url: apiEmpleados + 'readEmpleados',
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
    $('#empleado').DataTable().destroy();
    showTable();
})

//Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content += `
            <tr id="${row.idEmpleado}">
                <th scope="row">
                    <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">${row.idEmpleado}</span>
                    </div>
                </th>
                <td>
                    ${row.nombreEmpleado}
                </td>
                <td>
                    ${row.apellidoEmpleado}
                </td>
                <td>
                    ${row.correo}
                </td>
                <td>
                    ${row.contrasena}
                </td>
                <td>
                    ${row.dui}
                </td>
                <td class="text-center">
                    <button type="button" onclick="modalUpdate(${row.idEmpleado})" class="mr-2 btn btn-warning text-white">
                        <i class="material-icons mr-2">edit</i>Editar
                    </button>
                    <button type="button" onclick="confirmDelete(${row.idEmpleado})" class="mr-2 btn btn-danger">
                        <i class="material-icons mr-2">delete</i>Eliminar
                    </button> 
                </td> 
            </tr>
        `;
    });
    $('#tbody-read-empleado').html(content);
    $('#empleado').DataTable({
        "language": {
            "url": "../../resources/js/material/espaniol.json"
        }
    });
}

/*---------------Funciones CRUD---------------*/

//Función para crear un nuevo registro
$('#form-create-empleado').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiEmpleados + 'create',
        type: 'post',
        data: new FormData($('#form-create-empleado')[0]),
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
            $('#form-create-empleado')[0].reset();
            $('#guardarEmpleadoModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Autor guardado correctamente.',
                    'success'
                )
                $('#empleado').DataTable().destroy();
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
        url: apiEmpleados + 'get',
        type: 'post',
        data: {
            idEmpleado: id
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
            $('#form-update-empleado')[0].reset();
            $('#idEmpleado').val(result.dataset.idEmpleado);
            $('#nombreEmpleado').val(result.dataset.nombreEmpleado);
            $('#apellidoEmpleado').val(result.dataset.apellidoEmpleado);
            $('#correoEmpleado').val(result.dataset.correo);
            $('#contrasenaEmpleado').val(result.dataset.contrasena);
            $('#duiEmpleado').val(result.dataset.dui);
            $('#modificarEmpleadoModal').modal('toggle');
        } else {
            console.log(result.exception)
        }
    } else {
        console.log(response);
    }
}

//Función para modificar un registro seleccionado previamente
$('#form-update-empleado').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiEmpleados + 'update',
        type: 'post',
        data: new FormData($('#form-update-empleado')[0]),
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
            $('#modificarEmpleadoModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Autor modificado correctamente.',
                    'success'
                )
            }
            $('#empleado').DataTable().destroy();
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
                url: apiEmpleados + 'delete',
                type: 'post',
                data: {
                    idEmpleado: id
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
                        $('#empleado').DataTable().destroy();
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

