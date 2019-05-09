<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Categorias');
?>
<main>
    <div class="container mt-5">
        <div id="alerts"></div>
        <div class="row shadow-sm p-3 mb-5 bg-white rounded">
            <div class="table-responsive-lg" style="width:100%">
                <h1 class="text-center text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">Categorías</h1>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 col-md-4 text-center">
                        <button type="button" class="mr-lg-2 btn btn-success" data-toggle="modal" data-target="#guardarCategoriaModal">
                            <i class="material-icons mr-2">add</i>
                            Agregar
                        </button>
                        <button type="button" class="ml-lg-2 btn btn-info" id="reload">
                            <i class="material-icons mr-2">sync</i>
                            Recargar
                        </button>
                    </div>
                </div>
                <table id="categoria" class="table ">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Descuento</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-read-categoria"></tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- Ventana para guardar Autor -->
<div class="modal fade" id="guardarCategoriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Agregar Categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-create-categoria">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="text" id="name" name="nombre" class="form-control form-control-alternative" required onfocusout="validateAlphabetic('name',1,30)">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Descuento:</label>
                                <input type="text"  name="descuento" class="form-control form-control-alternative">
                            </div>
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label">Descripción:</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" aria-label="With textarea"></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Imagen:</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="imagen" id="imagen" required>
                                        <label class="custom-file-label" for="inputGroupFile01">.gif, .png, .jpg</label>
                                    </div>
                                </div>
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
<div class="modal fade" id="modificarCategoriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Modificar Categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-update-categoria">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Codigo:</label>
                        <input name="id-update" type="text" class="form-control form-control-alternative" id="idCategoria" readonly>

                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input name="nombres-update" type="text" class="form-control form-control-alternative" id="nombreCategoria">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Descuento:</label>
                                <input name="descuento-update" type="text" class="form-control form-control-alternative" id="descuentoCategoria">
                            </div>
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label">Descripción:</label>
                                <textarea class="form-control" name="descripcion-update" id="descripcion-update" aria-label="With textarea"></textarea>
                            </div>
                            <div class="col-12 d-flex justify-content-center my-4">
                                <div id="imagen-update-container"></div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Imagen:</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="imagen-update" id="imagen-update">
                                        <input type="text" class="d-none" id="imagen-categoria" name="imagen-categoria">
                                        <label class="custom-file-label" for="inputGroupFile01">.gif, .png, .jpg</label>
                                    </div>
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
<script src="../../core/helpers/Public.js"></script>
<script src="../../core/controllers/dashboard/categorias.js"></script>
</body>

</html>