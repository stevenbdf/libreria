
$(document).ready(() => {
    showNews();
})
//Constante para establecer la ruta y parámetros de comunicación con la API
const apiNoticias = '../../core/api/noticia.php?site=public&action=';
const apiComentarios = '../../core/api/comentarioNoticia.php?site=public&action=';

//Función para obtener y mostrar los registros disponibles
const showNews = async () => {
    const response = await $.ajax({
        url: apiNoticias + 'readNoticia',
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
            console.log(result.exception);
        }
        fillContainer(result.dataset, result.imagenCliente);
    } else {
        console.log(response);
    }
}

//Función para llenar div con tarjetas de categorias
function fillContainer(rows, imagenCliente) {
    imagenCliente == undefined && (imagenCliente = {img: 'default-profile.gif'})
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content += `
            <!-- Empieza una noticia -->
            <div class="col-12 col-md-10 offset-0 offset-md-1">
                <h3>${row.titulo}</h3>
                <p>Por: ${row.nombreEmpleado} - ${row.fecha}</p>
            </div>
            <div class="col-12 col-md-10 offset-0 offset-md-1">
                <div class="col-12 col-md-6 float-left">
                <img src="../../resources/img/news/${row.img}" class="img-fluid" alt="${row.titulo}">
                </div>
                ${row.descripcion}
            </div>
        <!-- Termina una noticia -->
        <div class="col-10 offset-1">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-uppercase">Comentarios</h3>
                </div>
        
                <div class="col-1 col-md-2 offset-md-1 text-right pt-2 pb-2">
                    <img class="profile-img-main" src="../../resources/img/clients/${imagenCliente.img}" alt="foto de perfil">
                </div>
                <div class="col-8 offset-2 offset-md-0 col-md-6 my-auto">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="far fa-comment-dots"></i></span>
                        </div>
                        <textarea id="comentario-create-${row.idNoticia}" class="form-control" aria-label="With textarea" placeholder="Escribe tu comentario..."></textarea>
                    </div>
                </div>
                <div class="col-12 col-md-2 my-auto text-center">
                    <button type="button" onclick="addComment(${row.idNoticia})" class="btn btn-success btn-lg btn-block">Enviar</button>
                </div><!-- Fin Tu comentario -->
            </div>
            <div class="row mt-4 pb-4">
                <div class="col-12">
                    <h1 class="uppercase text-center">Otros comentarios</h1>
                </div>
            <!--Comentario  -->
                <div id="comentarios-container-${row.idNoticia}" class="row mt-2 ml-auto mr-auto mb-4 p-3" style="border: 1px solid #5e72e4; width:85%;">
                </div>
            </div>
        </div>
        `;
    });
    $('div#noticias-container').html(content);
    showComments(rows);
}

//Función para agregar un comentario
const addComment = async (idNoticia) => {
    if ($.trim($(`textarea#comentario-create-${idNoticia}`).val())){
        const response = await $.ajax({
            url: apiComentarios + 'createComentario',
            type: 'post',
            data: {
                idNoticia,
                comentario:  $(`textarea#comentario-create-${idNoticia}`).val()
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
                await showNews();
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
                'Debes iniciar sesión para poder comentar noticias',
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

//Función para obtener y mostrar los comentarios disponibles
const showComments = async (noticias) => {
    const response = await $.ajax({
        url: apiComentarios + 'readComentarios',
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
            console.log(result.exception);
        } else {
            noticias.forEach(function (noticia) {
                result.dataset.forEach(function (comentario) {
                    if (comentario.idNoticia == noticia.idNoticia) {
                        $(`div#comentarios-container-${noticia.idNoticia}`).append(`
                            <!-- Empieza un comentario -->
                            <div class="col-2 col-md-2 offset-md-1 text-right pt-4 pb-2">
                                <img class="profile-img" src="../../resources/img/clients/${comentario.img}" alt="foto de perfil">
                            </div>
                            <div class="col-8  offset-2 offset-md-1 offset-lg-0 my-auto mt-4">
                                <div class="card mt-2">
                                    <div class="card-body pb-0">
                                    <p id="${comentario.idComentN}-p" class="m-0 p-0">${comentario.comentario}</p>
                                    <textarea id="${comentario.idComentN}-textarea" class="form-control d-none" aria-label="With textarea" placeholder="Escribe tu comentario..."> ${comentario.comentario}</textarea>
                                    </div>
                                    <div class="small m-0 p-0 text-right mr-3 mb-2 mt-2">
                                        ${validateUpdateDelete(comentario, result.idCliente)}
                                        ${comentario.nombreCliente} - ${comentario.fecha}
                                    </div>
                                </div> 
                            </div>
                            <!-- Termina una comentario -->
                        `);
                    }
                })
            })
            noticias.forEach(function (noticia) {
                if ($(`div#comentarios-container-${noticia.idNoticia}`).children().length == 0) {
                    $(`div#comentarios-container-${noticia.idNoticia}`).html('<h1 class="text-center w-100">No hay comentarios registrados</h1>');
                }
            })
        }
    } else {
        console.log(response);
    }
}

//Función para habilitar botones de editar y eliminar si los comentarios del cliente le pertencen
function validateUpdateDelete(row, idCliente) {
    if (row.idClient == idCliente) {
        return `<div id="textarea-disabled-${row.idComentN}" class="p-0 m-0 d-inline">
                    <button type="button" onclick="showTextAreaEdit(${row.idComentN})" class="btn btn-sm btn-white mr-3">
                        Editar <i class="fas fa-pen"></i>
                    </button>
                    <button type="button" onclick="deleteComment(${row.idComentN})" class="btn btn-sm btn-white mr-3">
                        Eliminar <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div id="textarea-enabled-${row.idComentN}" class="p-0 m-0 d-none">
                    <button type="button" onclick="showTextAreaEdit(${row.idComentN})" class="btn btn-sm btn-white mr-3">
                        Cancelar <i class="fas fa-times"></i>
                    </button>
                    <button type="button" onclick="updateComment(${row.idComentN})" class="btn btn-sm btn-white mr-3">
                        Guardar <i class="fas fa-check"></i>
                    </button>
                </div>
                `;
    } else {
        return '';
    }
}

function showTextAreaEdit(idComent){
    if(!$(`div#textarea-disabled-${idComent}`).hasClass('d-none')){
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

//Función para editar un comentario
const updateComment = async (idComentario) => {
    if ($.trim($(`textarea#${idComentario}-textarea`).val())){
        const response = await $.ajax({
            url: apiComentarios + 'updateComentario',
            type: 'post',
            data: {
                idComentario,
                comentario:  $(`textarea#${idComentario}-textarea`).val()
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
                await showNews();
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
                        await showNews();
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