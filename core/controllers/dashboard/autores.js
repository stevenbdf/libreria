$(document).ready(() => {
    showTable()
    graficoAutores()
    cargarSelectAutores()
    $('input#customSwitch').change(() => {
        if ($('input#customSwitch').is(':checked')) {
            $('select#autorSelect').prop('disabled', false)
        } else {
            $('select#autorSelect').prop('disabled', true)
        }
    })
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiAutores = '../../core/api/autores.php?site=dashboard&action='

//Cargar select de autores
const cargarSelectAutores = async () => {
    const autores = await ajaxRequest(apiAutores, 'readAutores')
    let autoresOpt = '<option value="-1"></option>'
    autores.map(item => {
        autoresOpt += `<option value="${item.idAutor}">${item.nombre} ${item.apellido}</option>)`
    })
    $('#autorSelect').html(autoresOpt)
}

//Función para obtener y mostrar los registros disponibles
const showTable = async () => {
    const response = await $.ajax({
        url: apiAutores + 'readAutores',
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
    $('#autores').DataTable().destroy();
    showTable();
})

//Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
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
                    <button type="button" onclick="modalUpdate(${row.idAutor})" class="mr-2 btn btn-warning text-white">
                        <i class="material-icons mr-2">edit</i>Editar
                    </button>
                    <button type="button" onclick="confirmDelete(${row.idAutor})" class="mr-2 btn btn-danger">
                        <i class="material-icons mr-2">delete</i>Eliminar
                    </button> 
                </td> 
            </tr>
        `;
    });
    $('#tbody-read-autores').html(content);
    $('#autores').DataTable({
        "language": {
            "url": "../../resources/js/material/espaniol.json"
        }
    });
}

/*---------------Funciones CRUD---------------*/

//Función para crear un nuevo registro
$('#form-create-autor').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiAutores + 'create',
        type: 'post',
        data: new FormData($('#form-create-autor')[0]),
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
            $('#form-create-autor')[0].reset();
            $('#guardarAutoresModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Autor guardado correctamente.',
                    'success'
                )
                $('#autores').DataTable().destroy();
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
        url: apiAutores + 'get',
        type: 'post',
        data: {
            idAutor: id
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
            $('#form-update-autor')[0].reset();
            $('#idAutor').val(result.dataset.idAutor);
            $('#nombreAutor').val(result.dataset.nombre);
            $('#apellidoAutor').val(result.dataset.apellido);
            $('#paisAutor').val(result.dataset.pais);
            $('#modificarAutoresModal').modal('toggle');
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
$('#form-update-autor').submit(async () => {
    event.preventDefault();
    const response = await $.ajax({
        url: apiAutores + 'update',
        type: 'post',
        data: new FormData($('#form-update-autor')[0]),
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
            $('#modificarAutoresModal').modal('toggle');
            if (result.status == 1) {
                swal(
                    'Operación Correcta',
                    'Autor modificado correctamente.',
                    'success'
                )
            }
            $('#autores').DataTable().destroy();
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
                    url: apiAutores + 'delete',
                    type: 'post',
                    data: {
                        idAutor: id
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
                            $('#autores').DataTable().destroy();
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

function graficoAutores() {
    $.ajax({
        url: apiAutores + 'getCountBooksByAuthor',
        type: 'post',
        data: null,
        datatype: 'json'
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio, sino se remueve la etiqueta canvas
                if (result.status) {

                    let colors = [];
                    var cantidad = [];
                    var name = [];

                    for (i in result.dataset) {
                        cantidad.push(result.dataset[i].Cantidad);
                        name.push(result.dataset[i].Nombre);
                        colors.push('#' + (Math.random().toString(16)).substring(2, 8));
                    }
                    const context = $('#chart');
                    const chart = new Chart(context, {
                        type: 'bar',
                        data: {
                            labels: name,
                            datasets: [{
                                label: 'Libros',
                                data: cantidad,
                                backgroundColor: colors,
                                borderColor: '#000000',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Libros por autor'
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 1
                                    }
                                }]
                            }
                        }
                    });
                    /* var charData ={
                         labels:name,
                         dataset : [
                             {
                                 backgroundColor: 'red',
                                 borderColor: 'black',
                                 pointBorderColor: 'black',
                                 hoverBackgroundColor: 'red',
                                 hoverBorderColor: 'rgba(200,200 , 200,1)',
                                 data: cantidad
                             },
                         ]
                     };
     
                     console.log(cantidad);
                     console.log(name);
                     
                     var ctx = $('#chart');
                     
                     var barGraph = new  Chart(ctx, {
                         type: 'line',
                         data: charData,
                         options: {
                             legend: {
                                 labels: {
                                     generateLabels: function (chart) {
                                         labels = Chart.defaults.global.defaultFontColor = 'black';
                                         return labels;
                                     } 
                                 },
                                 display: false,
                             },
                             scales:{
                                 yAxes: [{
                                     ticks:{
                                         fontColor: 'white',
                                         fontStyle: 'bold',
                                         beginAtZero: true,
                                         padding: 20,
                                         stepSize: 1
     
                                     },
                                     gridLines: {
                                         drawTicks: false,
                                         display: false
                                     }
                                 }],
                                 xAxes: [{
                                     gridLines: {
                                         zeroLineColor: 'transparent'
                                     },
                                     ticks: {
                                         padding: 10,
                                         fontColor: 'white',
                                         fontStyle: 'bold'
                                     }
                                 }]
                             },
                             gridLines: {
                                 display: true,
                                 color: 'white',
     
                             },
                             tooltips: {
                                 callbacks: {
                                     label: tooltipItem => '${tooltipItem.yLabel}: ${tooltipItem.xLabel}',
                                     title: () => null,
                                 }
                             },
                         },
                     })*/

                } else {
                    $('#chart').remove();
                }
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}

const enviarReporte = () => {
    if ($('input#customSwitch').is(':checked')) {
        let autor = $('select#autorSelect').val()
        location.href = `../../core/reports/librosAutores.php?idAutor=${autor}`;
    } else {
        location.href = `../../core/reports/librosAutores.php`;
    }
    $('input#customSwitch').prop('checked', false)
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