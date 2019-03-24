$(document).ready(function()
{
    showTable();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiAutores = '../../core/api/autores.php?site=dashboard&action=';

//Función para llenar tabla con los datos de los registros
function fillTable(rows)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        content += `
            <tr id="${row.idAutor}" onclick="selectedRow(${row.idAutor})">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">${row.idAutor}</span>
                      </div>
                    </th>
                    <td>
                        ${row.nombre}
                    </td>
                    <td>
                        ${row.apellido}
                    </td>
                    <td>
                        ${row.pais}
                    </td>
                    <td>
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow" data-toggle="tooltip"  data-placement="top" title="Modificar">
                            <a href="#" data-toggle="modal" data-target="#modificarAutoresModal">
                            <i class="fas fa-pen"></i>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow" data-toggle="tooltip"  data-placement="top" title="Eliminar" onclick="deleteAlert('Autor')">
                            <a>
                            <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </td>
                  </tr>
        `;
    });
    $('#tbody-read-autores').html(content);
}

//Función para obtener y mostrar los registros disponibles
function showTable()
{
    $.ajax({
        url: apiAutores + 'readAutores',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (!result.status) {
                console.log(result.exception)
            }
            fillTable(result.dataset);
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Función para crear un nuevo registro
$('#form-create-autor').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiAutores + 'create',
        type: 'post',
        data: new FormData($('#form-create-autor')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#form-create-autor')[0].reset();
                $('#guardarAutoresModal').modal('toggle');
                if (result.status == 1) {
                    Swal.fire(
                        'Operación Correcta',
                        'Autor guardado correctamente.',
                        'success'
                    )
                } else if (result.status == 2) {
                    console.log('Autor creado. ' + result.exception);
                }
                showTable();
            } else {
                console.log(result.exception)
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})