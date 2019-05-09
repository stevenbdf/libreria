<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Comentarios');
?>
<div class="container mt-5">
    <div id="alerts"></div>
    <div class="row shadow-sm p-3 mb-5 bg-white rounded">
        <div class="table-responsive-lg" style="width:100%">
            <h1 class="text-center text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">Comentarios de noticias</h1>
            <div class="row d-flex justify-content-center">
                <div class="col-6 col-md-4 text-center">
                    <button type="button" class="ml-lg-2 btn btn-info" id="reload">
                        <i class="material-icons mr-2">sync</i>
                        Recargar
                    </button>
                </div>
            </div>
            <table id="comentario" class="table ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Comentario</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cliente</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-read-comentario"></tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::footerTemplate('comentariosNoticias');
?>