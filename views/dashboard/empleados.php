<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Empleados');
?>
<main>
    <div class="container mt-5">
        <div id="alerts"></div>
        <div class="row shadow-sm p-3 mb-5 bg-white rounded">
            <div class="table-responsive-lg" style="width:100%">
                <h1 class="text-center text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">Empleados</h1>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 col-md-4 text-center">
                        <button type="button" class="mr-lg-2 btn btn-success" data-toggle="modal" data-target="#guardarEmpleadoModal">
                            <i class="material-icons mr-2">add</i>
                            Agregar
                        </button>
                        <button type="button" class="ml-lg-2 btn btn-info" id="reload">
                            <i class="material-icons mr-2">sync</i>
                            Recargar
                        </button>
                    </div>
                </div>
                <table id="empleado" class="table table-responsive">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">DUI</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-read-empleado"></tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- Ventana para guardar Autor -->
<div class="modal fade" id="guardarEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Agregar Autor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-create-empleado">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="text" name="nombre" class="form-control form-control-alternative">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Apellido:</label>
                                <input type="text" name="apellido" class="form-control form-control-alternative">
                            </div>
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label">Correo:</label>
                                <input type="text" name="correo" class="form-control form-control-alternative">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Contraseña:</label>
                                <input type="text" name="contrasena" class="form-control form-control-alternative">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">DUI:</label>
                                <input type="text" name="dui" class="form-control form-control-alternative">
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
<!-- Ventana para modificar Autor -->
<div class="modal fade" id="modificarEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Modificar Autor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-update-empleado">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Codigo:</label>
                        <input name="id-update" type="text" class="form-control form-control-alternative" id="idEmpleado" readonly>

                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input name="nombres-update" type="text" class="form-control form-control-alternative" id="nombreEmpleado">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Apellido:</label>
                                <input name="apellidos-update" type="text" class="form-control form-control-alternative" id="apellidoEmpleado">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Correo:</label>
                                <input name="correo-update" type="text" class="form-control form-control-alternative" id="correoEmpleado">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Contraseña</label>
                                <input name="contrasena-update" type="text" class="form-control form-control-alternative" id="contrasenaEmpleado">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">DUI:</label>
                                <input name="dui-update" type="text" class="form-control form-control-alternative" id="duiEmpleado">
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

<script src="../../core/controllers/dashboard/empleados.js"></script>
</body>

</html>