$(document).ready(() => {
    graficoAutores()
    graficoTop5Aprobacion()
    librosEditorial()
    pedidosMes()
    categoriasSolicitadas()
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiAutores = '../../core/api/autores.php?site=dashboard&action='
const apiProductos = '../../core/api/productos.php?site=dashboard&action='
const apiPedidos = '../../core/api/pedidos.php?site=dashboard&action='
const apiCategoria = '../../core/api/categorias.php?site=dashboard&action='

function randomRgba() {
    let colores = ['000000', '120209', '240411', '36061a', '470823', '590a2b', '6b0b34', '7d0d3c', '8e0f45',
        'a0114d', 'b21356', 'c3155f', 'd51767', 'e61970', 'e82b7b', 'ea3d86', 'ec4e91', 'ee609c', 'f072a7',
        'f283b2', 'f495bd', 'f6a7c8', 'f7b9d3', 'f9cade', 'fbdce9', 'fdeef4', 'b260ee']
    // var o = Math.round, r = Math.random, s = 255;
    // return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + 0.4 + ')';
    let ranInt = Math.floor(Math.random() * colores.length) + 1
    return colores[ranInt]
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
                        colors.push('#' + randomRgba());
                    }
                    const context = $('#chart-autores');
                    const chart = new Chart(context, {
                        type: 'polarArea',
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
                    })
                } else {
                    $('#chart-autores').remove();
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

function graficoTop5Aprobacion() {
    $.ajax({
        url: apiProductos + 'getTop5Aprobacion',
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
                        cantidad.push(result.dataset[i].aprobacion);
                        name.push(result.dataset[i].nombreL);
                        colors.push('#' + randomRgba());
                    }
                    const context = $('#chart-top5-aprobacion');
                    const chart = new Chart(context, {
                        type: 'bar',
                        data: {
                            labels: name,
                            datasets: [{
                                label: '% de aprobación',
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
                                text: 'Top 5 libros con mejor aprobación'
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 10
                                    }
                                }]
                            }
                        }
                    })
                } else {
                    $('#chart-top5-aprobacion').remove();
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

function librosEditorial() {
    $.ajax({
        url: apiProductos + 'getLibrosEditorial',
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
                        cantidad.push(result.dataset[i].cantidad);
                        name.push(result.dataset[i].nombreEdit);
                        colors.push('#' + randomRgba());
                    }
                    const context = $('#chart-libros-editorial');
                    const chart = new Chart(context, {
                        type: 'doughnut',
                        data: {
                            labels: name,
                            datasets: [{
                                label: 'Libros',
                                data: cantidad,
                                backgroundColor: colors,
                                borderColor: '#FFFFFF',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Cantidad de libros por editorial'
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 10
                                    }
                                }]
                            }
                        }
                    })
                } else {
                    $('#chart-libros-editorial').remove();
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

function pedidosMes() {
    $.ajax({
        url: apiPedidos + 'readPedidosByMonth',
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
                    console.log(result.dataset)
                    for (i in result.dataset) {
                        cantidad.push(result.dataset[i].cantidad);
                        name.push(result.dataset[i].mes);
                        colors.push('#' + randomRgba());
                    }
                    const context = $('#chart-pedidos-mes');
                    const chart = new Chart(context, {
                        type: 'line',
                        data: {
                            labels: name,
                            datasets: [{
                                label: '# de Pedidos',
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
                                text: 'Cantidad de pedidos por mes'
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 10
                                    }
                                }]
                            },
                            elements: {
                                line: {
                                    fill: false
                                }
                            }
                        }
                    })
                } else {
                    $('#chart-pedidos-mes').remove();
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

function categoriasSolicitadas() {
    $.ajax({
        url: apiCategoria + 'getLibroPedidoCategoria',
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
                    console.log(result.dataset)
                    for (i in result.dataset) {
                        cantidad.push(result.dataset[i].cantidad);
                        name.push(result.dataset[i].nombreCategoria);
                        colors.push('#' + randomRgba());
                    }
                    const context = $('#chart-categorias-vendidas');
                    const chart = new Chart(context, {
                        type: 'bar',
                        data: {
                            labels: name,
                            datasets: [{
                                label: '# de presencia en pedidos',
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
                                text: 'Categorias más vendidas'
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 10
                                    }
                                }]
                            },
                            elements: {
                                line: {
                                    fill: false
                                }
                            }
                        }
                    })
                } else {
                    $('#chart-categorias-vendidas').remove();
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