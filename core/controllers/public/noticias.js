
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
                        <textarea class="form-control" aria-label="With textarea" placeholder="Escribe tu comentario..."></textarea>
                    </div>
                </div>
                <div class="col-12 col-md-2 my-auto text-center">
                    <button type="button" class="btn btn-success btn-lg btn-block">Enviar</button>
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
                                    <div class="card-body">
                                    ${comentario.comentario}
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