$(document).ready(()=>
{
   showTable();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiAutores = '../../core/api/autores.php?site=dashboard&action=';

//Función para llenar tabla con los datos de los registros
async function fillTable(rows)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    await rows.forEach(function(row){
        content += `
            <tr id="${row.idAutor}">
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
                <td class="text-center">
                    <button type="button" class="mr-2 btn btn-warning text-white">
                        <i class="material-icons mr-2">edit</i>Editar
                    </button>
                    <button type="button" class="mr-2 btn btn-danger">
                        <i class="material-icons mr-2">delete</i>Eliminar
                    </button> 
                </td> 
            </tr>
        `;
    });
    await $('#tbody-read-autores').html(content);
    $('#autores').DataTable({
        "language": {
            "url": "../../resources/js/material/espaniol.json"
        }
    });
}

//Función para obtener y mostrar los registros disponibles
const showTable = async() =>
{
    const response = await $.ajax({
        url: apiAutores + 'readAutores',
        type: 'post',
        data: null,
        datatype: 'json'
    })
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
                    $('#autores').DataTable().destroy();
                    showTable();
                    
                } else if (result.status == 2) {
                    console.log('Autor creado. ' + result.exception);
                }
                
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

$('#reload').click(async () =>{
    $('#autores').DataTable().destroy();
    showTable();
})