<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Productos');
?>
<main>
    <div class="container mt-5">
        <div id="alerts"></div>
        <div class="row shadow-sm p-3 mb-5 bg-white rounded">
            <div class="table-responsive-lg" style="width:100%">
                <h1 class="text-center text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">Productos</h1>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 col-md-4 text-center">
                        <button type="button" class="mr-lg-2 btn btn-success" data-toggle="modal" data-target="#guardarProductosModal">
                            <i class="material-icons mr-2">add</i>
                            Agregar
                        </button>
                        <button type="button" class="ml-lg-2 btn btn-info" id="reload">
                            <i class="material-icons mr-2">sync</i>
                            Recargar
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="productos" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Aprobación</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Editorial</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio Base</th>
                                <th scope="col">Descuento</th>
                                <th scope="col">Precio Final</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-read-productos"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Ventana para guardar Autor -->
<div class="modal fade" id="guardarProductosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Agregar Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-create-producto">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="floating-label">
                                        <label for="autorSelect">Autor</label>
                                        <select class="form-control" name="autorSelect" id="autorSelect"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="floating-label">
                                        <label for="editorialSelect">Editorial</label>
                                        <select class="form-control" name="editorialSelect" id="editorialSelect"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="recipient-name" class="col-form-label">Titulo:</label>
                        <input type="text" name="titulo" class="form-control form-control-alternative">
                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="recipient-name" class="col-form-label">Idioma:</label>
                                <input type="text" name="idioma" class="form-control form-control-alternative">
                            </div>
                            <div class="col-3">
                                <label for="recipient-name" class="col-form-label">No.Págs:</label>
                                <input type="number" name="noPaginas" class="form-control form-control-alternative">
                            </div>
                            <div class="col-5">
                                <div class="form-group mt-4">
                                    <div class="floating-label">
                                        <label for="encuadernacion">Encuadernacion</label>
                                        <select class="form-control" name="encuadernacion" id="encuadernacion">
                                            <option value="0"></option>
                                            <option value="Tapa blanda">Tapa blanda</option>
                                            <option value="Tapa dura">Tapa dura</option>
                                            <option value="Tapa blanda de bolsillo">Tapa blanda de bolsillo</option>
                                            <option value="Tapa dura de bolsillo">Tapa dura de bolsillo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="resena">Reseña:</label>
                            <textarea class="form-control" name="resena" id="resena" rows="5"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="recipient-name" class="col-form-label">Precio:</label>
                                <input type="number" min="0.01" max="999.99" step="0.01" name="precio" class="form-control form-control-alternative">
                            </div>
                            <div class="col-3">
                                <label for="recipient-name" class="col-form-label">Cantidad:</label>
                                <input type="number" min="0" max="5000" step="1" name="cantidad" class="form-control form-control-alternative">
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <div class="floating-label">
                                        <label for="categoria">Categoria</label>
                                        <select class="form-control" name="categoriaSelect" id="categoriaSelect"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="aprobacion">Aprobación:</label>
                                <input type="text" readonly class="form-control-plaintext" id="aprobacion">
                            </div>
                            <div class="col-4">
                                <label for="likes">Likes:</label>
                                <input type="text" readonly class="form-control-plaintext" id="likes">
                            </div>
                            <div class="col-4">
                                <label for="dislikes">Dislikes:</label>
                                <input type="text" readonly class="form-control-plaintext" id="dislikes">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="custom-file mt-4">
                                    <input type="file" class="custom-file-input" name="imagen" id="imagen" lang="es">
                                    <label class="custom-file-label" for="imagen">Seleccionar imagen</label>
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

<script src="../../core/controllers/dashboard/productos.js"></script>
</body>

</html>