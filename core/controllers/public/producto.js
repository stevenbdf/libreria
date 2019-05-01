$(document).ready(() => {
    showProducts();
    showComments();
})
//Constante para establecer la ruta y parámetros de comunicación con la API
const apiProductos = '../../core/api/productos.php?site=public&action=';
const apiComentarios = '../../core/api/comentarioLibro.php?site=public&action=';


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
            $('div#likes').html(`<i class="fas fa-thumbs-up green" onclick="alert('diste like')"></i> Likes ${result.dataset.likes}`);
            $('div#dislikes').html(`<i class="fas fa-thumbs-down"></i> Dislikes ${result.dataset.dislikes}`);
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
            console.log(result.exception);
            $('div#comentarios-container').html(`<h1 class="text-center w-100">${result.exception}</h1>`);
        } else {
            console.log(result.dataset)
            fillContainer(result.dataset)
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
