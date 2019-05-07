$(document).ready(async () => {
    await showProducts();
    await showComments();
    await showReactions();
})
//Constante para establecer la ruta y parámetros de comunicación con la API
const apiProductos = '../../core/api/productos.php?site=public&action=';
const apiComentarios = '../../core/api/comentarioLibro.php?site=public&action=';
const apiReacciones = '../../core/api/reacciones.php?site=public&action=';
const apiPedidos = '../../core/api/pedidos.php?site=public&action=';

var precioProductoActual;
var cantidadProductoActual;

function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function (item) {
            tmp = item.split("=");
            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}

//Función para obtener y mostrar los registros disponibles
const showProducts = async () => {
    const response = await $.ajax({
        url: apiProductos + 'get',
        type: 'post',
        data: {
            idProducto: (findGetParameter('id'))
        },
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
            $('h1#titulo').html(result.exception);
        } else {
            precioProductoActual = result.dataset.precioFinal;
            cantidadProductoActual = result.dataset.cantidad;
            if (cantidadProductoActual < 1) {
                $('button#add-carrito').attr('disabled', true);
            }
            $('div#libro').html(`<img src="../../resources/img/books/${result.dataset.img}" alt="${result.dataset.NombreL}">`);
            $('h1#titulo-libro').html(result.dataset.NombreL);
            $('div#likes').html(`<i id="like-icon" class="fas fa-thumbs-up green" style="font-size:25px;" onclick="addLike(${result.dataset.idLibro})"></i> Likes ${result.dataset.likes}`);
            $('div#dislikes').html(`<i id="dislike-icon" class="fas fa-thumbs-down" style="font-size:25px;" onclick="addDislike(${result.dataset.idLibro})"></i> Dislikes ${result.dataset.dislikes}`);
            $('div#barra-aprobacion').html(`<div class="progress-bar bg-success" role="progressbar" style="width: ${result.dataset.aprobacion}%" aria-valuenow="${result.dataset.aprobacion}" aria-valuemin="0" aria-valuemax="100"></div>`);
            $('div#precio').html(`<h4>Precio: <span class="libreria-numero">$${result.dataset.precioFinal}</span></h4>`);
            $('div#cantidad').html(`<h4>Disponibles: <span class="libreria-numero">${result.dataset.cantidad}</span> </h4>`);
            $('div#resena').html(`<p>${result.dataset.resena}</p>`);
            $('div#noPaginas').html(`<span class="font-weight-bold text-uppercase">No. de Paginas:  </span> ${result.dataset.NoPag}`);
            $('div#editorial').html(`<span class="font-weight-bold text-uppercase">Editorial:  </span> ${result.dataset.editorial}`);
            $('div#idioma').html(`<span class="font-weight-bold text-uppercase">Idioma:  </span> ${result.dataset.Idioma}`);
            $('div#autor').html(`<span class="font-weight-bold text-uppercase">Autor:  </span> ${result.dataset.nombreAutor} ${result.dataset.apellidoAutor}`);
            $('div#encuadernacion').html(`<span class="font-weight-bold text-uppercase">Encuadernación:  </span> ${result.dataset.encuadernacion}`);
            $('div#pais').html(`<span class="font-weight-bold text-uppercase">País:  </span> ${result.dataset.pais}`);
        }
    } else {
        console.log(response);
    }
}

//Función para obtener y mostrar los comentarios disponibles
const showComments = async () => {
    const response = await $.ajax({
        url: apiComentarios + 'readComentariosLibro',
        type: 'post',
        data: {
            idProducto: (findGetParameter('id'))
        },
        datatype: 'json'
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (!result.status) {
            $('div#comentarios-container').html(`<h1 class="text-center w-100">${result.exception}</h1>`);
        } else {
            fillContainer(result.dataset, result.idCliente)
        }
    } else {
        console.log(response);
    }
}

//Función para obtener y mostrar si ha realizado alguna reaccion al libro
const showReactions = async () => {
    const response = await $.ajax({
        url: apiReacciones + 'readReaccionesCliente',
        type: 'post',
        data: {
            idProducto: (findGetParameter('id'))
        },
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
        } else {
            if (result.dataset.length === 1) {
                result.dataset[0].tipo == 1 ?
                    $('#like-icon').addClass('text-green')
                    :
                    $('#dislike-icon').addClass('text-green')
            } else {
                console.log('Error el cliente ha reaccionado más de una vez');
            }
        }
    } else {
        console.log(response);
    }
}

//Función para llenar div con comentarios
function fillContainer(rows, idCliente) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content += `
            <!-- Empieza un comentario -->
            <div class="col-2 col-md-2 offset-md-1 text-right pt-4 pb-2">
                <img class="profile-img" src="../../resources/img/clients/${row.img}" alt="foto de perfil">
            </div>
            <div class="col-8  offset-2 offset-md-1 offset-lg-0 my-auto mt-4">
                <div class="card mt-2">
                    <div class="card-body pb-0">
                    <p id="${row.idComent}-p" class="m-0 p-0">${row.comentario}</p>
                    <textarea id="${row.idComent}-textarea" class="form-control d-none" aria-label="With textarea" placeholder="Escribe tu comentario..."> ${row.comentario}</textarea>
                    </div>
                    <div class="small m-0 p-0 text-right mr-3 mb-2 mt-2">
                    ${validateUpdateDelete(row, idCliente)}
                        ${row.nombreCliente} - ${row.fecha}
                    </div>
                </div> 
            </div>
            <!-- Termina una comentario -->
        `;
    });
    $('div#comentarios-container').html(content);
}

//Función para habilitar botones de editar y eliminar si los comentarios del cliente le pertencen
function validateUpdateDelete(row, idCliente) {
    if (row.idClient == idCliente) {
        return `<div id="textarea-disabled-${row.idComent}" class="p-0 m-0 d-inline">
                    <button type="button" onclick="showTextAreaEdit(${row.idComent})" class="btn btn-sm btn-white mr-3">
                        Editar <i class="fas fa-pen"></i>
                    </button>
                    <button type="button" onclick="deleteComment(${row.idComent})" class="btn btn-sm btn-white mr-3">
                        Eliminar <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div id="textarea-enabled-${row.idComent}" class="p-0 m-0 d-none">
                    <button type="button" onclick="showTextAreaEdit(${row.idComent})" class="btn btn-sm btn-white mr-3">
                        Cancelar <i class="fas fa-times"></i>
                    </button>
                    <button type="button" onclick="updateComment(${row.idComent})" class="btn btn-sm btn-white mr-3">
                        Guardar <i class="fas fa-check"></i>
                    </button>
                </div>
                `;
    } else {
        return '';
    }
}

function showTextAreaEdit(idComent) {
    if (!$(`div#textarea-disabled-${idComent}`).hasClass('d-none')) {
        $(`p#${idComent}-p`).addClass('d-none');
        $(`textarea#${idComent}-textarea`).removeClass('d-none');
        $(`div#textarea-disabled-${idComent}`).removeClass('d-inline');
        $(`div#textarea-disabled-${idComent}`).addClass('d-none');
        $(`div#textarea-enabled-${idComent}`).removeClass('d-none');
        $(`div#textarea-enabled-${idComent}`).addClass('d-inline');
    } else {
        $(`p#${idComent}-p`).removeClass('d-none');
        $(`textarea#${idComent}-textarea`).addClass('d-none');
        $(`div#textarea-disabled-${idComent}`).addClass('d-inline');
        $(`div#textarea-disabled-${idComent}`).removeClass('d-none');
        $(`div#textarea-enabled-${idComent}`).addClass('d-none');
        $(`div#textarea-enabled-${idComent}`).removeClass('d-inline');
    }
}
//Funcion para limitar texto
function limitText(descripcion) {
    var descripcionCorta = '';
    const limiteCaracteres = 120;
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

//Funcion que evalua condiciones para agregar like
const addLike = async (idProducto) => {
    if (!$('#like-icon').hasClass('text-green') && !$('#dislike-icon').hasClass('text-green')) {
        const response = await $.ajax({
            url: apiReacciones + 'insert',
            type: 'post',
            data: {
                idProducto,
                tipoReaccion: 1
            },
            datatype: 'json'
        }).fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status == 1) {
                await showProducts();
                await showComments();
                await $('#like-icon').addClass('text-green');
            } else {
                swal(
                    'Error',
                    result.exception,
                    'error'
                )
            }
        } else {
            console.log(response);
            swal(
                'Error',
                'Debes iniciar sesión para poder reaccionar a los libros',
                'error'
            )
        }
    } else if (!$('#like-icon').hasClass('text-green') && $('#dislike-icon').hasClass('text-green')) {
        updateReaction(1, idProducto);
    } else if ($('#like-icon').hasClass('text-green') && !$('#dislike-icon').hasClass('text-green')) {
        deleteReaction(idProducto);
    }
}

//Funcion que evalua condiciones para agregar dislike
const addDislike = async (idProducto) => {
    if (!$('#like-icon').hasClass('text-green') && !$('#dislike-icon').hasClass('text-green')) {
        const response = await $.ajax({
            url: apiReacciones + 'insert',
            type: 'post',
            data: {
                idProducto,
                tipoReaccion: 0
            },
            datatype: 'json'
        }).fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status == 1) {
                await showProducts();
                await showComments();
                await $('#dislike-icon').addClass('text-green');
            } else {
                swal(
                    'Error',
                    result.exception,
                    'error'
                )
            }
        } else {
            console.log(response);
            swal(
                'Error',
                'Debes iniciar sesión para poder reaccionar a los libros',
                'error'
            )
        }
    } else if ($('#like-icon').hasClass('text-green') && !$('#dislike-icon').hasClass('text-green')) {
        updateReaction(0, idProducto);
    } else if (!$('#like-icon').hasClass('text-green') && $('#dislike-icon').hasClass('text-green')) {
        deleteReaction(idProducto);
    }
}

//Funcion que evalua condiciones para modificar like o dislike
const updateReaction = async (nuevaReaccion, idProducto) => {
    const response = await $.ajax({
        url: apiReacciones + 'updateReaccion',
        type: 'post',
        data: {
            idProducto,
            nuevaReaccion
        },
        datatype: 'json'
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (result.status == 1) {
            await showProducts();
            await showComments();

            nuevaReaccion == 1 ?
                await $('#like-icon').addClass('text-green')
                :
                await $('#dislike-icon').addClass('text-green');
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
}

//Funcion que evalua condiciones para eliminar like o dislike
const deleteReaction = async (idProducto) => {
    const response = await $.ajax({
        url: apiReacciones + 'delete',
        type: 'post',
        data: {
            idProducto
        },
        datatype: 'json'
    }).fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (result.status == 1) {
            await showProducts();
            await showComments();
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
}

//Función para agregar un comentario
const addComment = async (idProducto) => {
    if ($.trim($('textarea#comentario-create').val())) {
        const response = await $.ajax({
            url: apiComentarios + 'createComentario',
            type: 'post',
            data: {
                idProducto,
                comentario: $('textarea#comentario-create').val()
            },
            datatype: 'json'
        }).fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status == 1) {
                await showProducts();
                await showComments();
                await showReactions();
            } else {
                swal(
                    'Error',
                    result.exception,
                    'error'
                )
            }
        } else {
            console.log(response);
            swal(
                'Error',
                'Debes iniciar sesión para poder comentar libros',
                'error'
            )
        }
    } else {
        swal(
            'Error',
            'Escribe algo en la caja de comentarios',
            'error'
        )
    }
}

//Función para editar un comentario
const updateComment = async (idComentario) => {
    if ($.trim($(`textarea#${idComentario}-textarea`).val())) {
        const response = await $.ajax({
            url: apiComentarios + 'updateComentario',
            type: 'post',
            data: {
                idComentario,
                comentario: $(`textarea#${idComentario}-textarea`).val()
            },
            datatype: 'json'
        }).fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status == 1) {
                await showProducts();
                await showComments();
                await showReactions();
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
    } else {
        swal(
            'Error',
            'Escribe algo en la caja de comentarios',
            'error'
        )
    }
}

//Función para eliminar un comentario
function deleteComment(idComentario) {
    swal({
        title: 'Advertencia',
        text: '¿Quiere eliminar el comentario?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borralo.',
        closeOnConfirm: true,
        closeOnCancel: true
    },
        async (isConfirm) => {
            if (isConfirm) {
                const response = await $.ajax({
                    url: apiComentarios + 'delete',
                    type: 'post',
                    data: {
                        idComentario
                    },
                    datatype: 'json'
                })
                //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                if (isJSONString(response)) {
                    const result = JSON.parse(response);
                    //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                    if (result.status) {
                        if (result.status == 1) {
                            await showProducts();
                            await showComments();
                            await showReactions();
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

//Función para agregar un comentario
const addCart = async (idProducto) => {
    var cantidadSeleccionada = parseInt($('input#cantidad-input').val());
    console.log(cantidadSeleccionada);
    console.log(NaN);
    if (isNaN(cantidadSeleccionada)) {
        swal(
            'Error',
            'Ingresa una cantidad mayor o igual a 1 unidad',
            'error'
        )
    } else if (cantidadSeleccionada >= 1 && cantidadSeleccionada <= cantidadProductoActual) {
        const response = await $.ajax({
            url: apiPedidos + 'addCart',
            type: 'post',
            data: {
                idProducto,
                cantidad: $('input#cantidad-input').val(),
                precioVenta: precioProductoActual
            },
            datatype: 'json'
        }).fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status == 1) {
                swal(
                    'Correcto',
                    'Producto agregado al carrito',
                    'success'
                )
                showCartTotal();
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
    } else {
        swal(
            'Error',
            'Lamentamos informarle que actualmente no hay stock de este producto',
            'error'
        )
    }
}

//Función para agregar un comentario
const showCartTotal = async () => {
    const response = await $.ajax({
        url: apiPedidos + 'showCartTotal',
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
        if (result.status == 1) {
            $('a#cart-label-info').html(`<i class="fas fa-shopping-cart"></i> $${result.dataset}`);
        } else {
            console.log(result.exception)
        }
    } else {
        console.log(response);
    }
}