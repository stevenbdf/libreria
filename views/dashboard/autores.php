<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Autores');
?>
<main>
    <div class="container mt-5">
        <div id="alerts"></div>
        <div class="row shadow-sm p-3 mb-5 bg-white rounded">
            <div class="table-responsive-lg" style="width:100%">
                <h1 class="text-center text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">Autores</h1>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 col-md-4 text-center">
                        <button type="button" class="mr-lg-2 btn btn-success" data-toggle="modal" data-target="#guardarAutoresModal">
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
    </div>
</main>
<!-- Ventana para guardar Autor -->
<div class="modal fade" id="guardarAutoresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text" name="nombres" class="form-control form-control-alternative" required>
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Apellido:</label>
                                <input type="text" name="apellidos" class="form-control form-control-alternative" required>
                            </div>
                        </div>
                        <label for="recipient-name" class="col-form-label">Pais:</label>
                        <input type="text" name="pais" class="form-control form-control-alternative" required>
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
<div class="modal fade" id="modificarAutoresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input name="id-update" type="text" class="form-control form-control-alternative" id="idAutor" readonly>

                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input name="nombres-update" type="text" class="form-control form-control-alternative" id="nombreAutor">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Apellido:</label>
                                <input name="apellidos-update" type="text" class="form-control form-control-alternative" id="apellidoAutor">
                            </div>
                        </div>

                        <label for="recipient-name" class="col-form-label">Pais:</label>
                        <input name="pais-update" type="text" class="form-control form-control-alternative" id="paisAutor">

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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<!-- Then Material JavaScript on top of Bootstrap JavaScript -->

<!-- <script src="../../resources/js/material/material.js"></script> -->
<script src="../../resources/js/material/material.js"></script>
<script src="../../resources/js/material/jquery.dataTables.min.js"></script>
<script src="../../resources/js/material/dataTables.material.min.js"></script>
<script src="../../core/helpers/functions.js"></script>
<script src="../../resources/js/sweetalert2.min.js"></script>

<script src="../../core/controllers/dashboard/autores.js"></script>
</body>

</html>