<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Editoriales');
?>
<div class="container mt-5">
    <div id="alerts"></div>
    <div class="row shadow-sm p-3 mb-5 bg-white rounded">
        <div class="table-responsive-lg" style="width:100%">
            <h1 class="text-center text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">Editoriales</h1>
            <div class="row d-flex justify-content-center">
                <div class="col-6 col-md-4 text-center">
                    <button type="button" class="mr-lg-2 btn btn-success" data-toggle="modal" data-target="#guardarEditorialModal">
                        <i class="material-icons mr-2">add</i>
                        Agregar
                    </button>
                    <button type="button" class="ml-lg-2 btn btn-info" id="reload">
                        <i class="material-icons mr-2">sync</i>
                        Recargar
                    </button>
                </div>
            </div>
            <table id="editorial" class="table table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Telefono</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-read-editorial"></tbody>
            </table>
        </div>
    </div>
</div>
<!-- Ventana para guardar Autor -->
<div class="modal fade" id="guardarEditorialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Agregar Editorial</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-create-editorial">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="text" name="nombre" id="name" class="form-control form-control-alternative" required onfocusout="validateAlphabetic('name', 1,50)">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Telefono:</label>
                                <input type="text" name="telefono" class="form-control form-control-alternative" required onfocusout="validatePhone('phone,1,10')">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Pais:</label>
                                <input type="text" name="pais" class="form-control form-control-alternative" required>
                            </div>
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label">Direccion:</label>
                                <input type="text" name="direccion" class="form-control form-control-alternative" required>
                            </div>
                        </div>
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
<!-- Ventana para modificar Editorial -->
<div class="modal fade" id="modificarEditorialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Modificar Editorial</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-update-editorial">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Codigo:</label>
                        <input name="id-update" type="text" class="form-control form-control-alternative" id="idEditorial" readonly>

                        <div class="row">
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input name="nombres-update" type="text" class="form-control form-control-alternative" id="nombreEditorial">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Teléfono:</label>
                                <input name="telefono-update" type="text" class="form-control form-control-alternative" id="telefonoEditorial">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Pais:</label>
                                <input name="pais-update" type="text" class="form-control form-control-alternative" id="paisEditorial">
                            </div>
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label">Direccion:</label>
                                <input name="direccion-update" type="text" class="form-control form-control-alternative" id="direccionEditorial">
                            </div>
                        </div>
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
Dashboard::footerTemplate('editoriales');
?>
