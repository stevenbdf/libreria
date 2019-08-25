<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Autores');
?>
<div class="container mt-5">
    <div id="alerts"></div>
    <div class="row shadow-sm p-3 mb-5 bg-white rounded">
        <div class="table-responsive-lg" style="width:100%">
            <h1 class="text-center text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">
                Autores</h1>
            <div class="row d-flex justify-content-center">
                <div class="col-6 col-md-4 text-center">
                    <button type="button" class="mr-lg-2 btn btn-success" data-toggle="modal"
                        data-target="#guardarAutoresModal">
                        <i class="material-icons mr-2">add</i>
                        Agregar
                    </button>
                    <button type="button" class="ml-lg-2 btn btn-info" id="reload">
                        <i class="material-icons mr-2">sync</i>
                        Recargar
                    </button>
                </div>
            </div>
            <table id="autores" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Pais</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-read-autores"></tbody>
            </table>
        </div>
    </div>
    <div class="row shadow-sm p-3 mb-5 bg-white rounded">
        <h1 class="text-center w-100 text-uppercase mt-4 mb-4"
            style="font-family: 'Arimo', sans-serif; font-size:50px;">Reportes</h1>
        <p class="text-center w-100">Genera un reporte en PDF de los libros por cada autor</p>
        <div class="col-6 offset-3">
            <div class="custom-control custom-switch">
                <input class="custom-control-input" id="customSwitch" type="checkbox">
                <span class="custom-control-track"></span>
                <label class="custom-control-label" for="customSwitch">Filtrar por autor</label>
            </div>
            <div class="form-group mt-3">
                <div class="floating-label">
                    <label for="autorSelect">Selecciona un autor</label>
                    <select class="form-control" name="autorSelect" id="autorSelect" disabled></select>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center my-4">
            <button type="button" onclick="enviarReporte()" class="btn btn-success py-3">Generar Reporte
                <i class="material-icons">insert_drive_file</i>
            </button>
        </div>
    </div>
</div>
<!-- Ventana para guardar Autor -->
<div class="modal fade" id="guardarAutoresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Agregar Autor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-create-autor">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="text" id="name" name="nombres"
                                    class="form-control form-control-alternative" required
                                    onfocusout="validateAlphabetic('name',1,50)" autocomplete="off">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Apellido:</label>
                                <input type="text" id="lastName" name="apellidos"
                                    class="form-control form-control-alternative" required
                                    onfocusout="validateAlphabetic('lastName',1,50)" autocomplete="off">
                            </div>
                        </div>
                        <label for="recipient-name" class="col-form-label">Pais:</label>
                        <input type="text" name="pais" id="country" class="form-control form-control-alternative"
                            required onfocusout="validateAlphabetic('country',1,50)" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Ventana para modificar Autor -->
<div class="modal fade" id="modificarAutoresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Modificar Autor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-update-autor">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Codigo:</label>
                        <input name="id-update" type="text" class="form-control form-control-alternative" id="idAutor"
                            readonly>

                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input name="nombres-update" type="text" class="form-control form-control-alternative"
                                    id="nombreAutor">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Apellido:</label>
                                <input name="apellidos-update" type="text" class="form-control form-control-alternative"
                                    id="apellidoAutor">
                            </div>
                        </div>

                        <label for="recipient-name" class="col-form-label">Pais:</label>
                        <input name="pais-update" type="text" class="form-control form-control-alternative"
                            id="paisAutor">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::footerTemplate('autores');
?>