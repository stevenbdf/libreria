$(document).ready(async () => {
    await showProducts();
    await showComments();
    await showReactions();
})
//Constante para establecer la ruta y parámetros de comunicación con la API
const apiProductos = '../../core/api/productos.php?site=public&action=';
const apiComentarios = '../../core/api/comentarioLibro.php?site=public&action=';
const apiReacciones = '../../core/api/reacciones.php?site=public&action=';

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
            fillContainer(result.dataset)
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
function fillContainer(rows) {
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
                    <div class="card-body">
                    ${row.comentario}
                    </div>
                </div>
            </div>
            <!-- Termina una comentario -->
        `;
    });
    $('div#comentarios-container').html(content);
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