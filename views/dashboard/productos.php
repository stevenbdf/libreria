<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Productos');
?>
<div class="container mt-5">
    <div id="alerts"></div>
    <div class="row shadow-sm p-3 mb-5 bg-white rounded">
        <div style="width:100%">
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
                <table id="productos" class="table table-responsive">
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
    <div class="row shadow-sm p-3 mb-5 bg-white rounded">
        <h1 class="text-center w-100 text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">Reportes</h1>
        <p class="text-center w-100">Genera un reporte en PDF de los libros por categoria existentes</p>
        <div class="col-12 col-md-12">
            <div class="input-group mb-3">
                <div class="form-group col-8 ml-5">
                    <div class="floating-label">
                        <label for="categoria-report">Categoria</label>
                        <select class="form-control" name="categoriaSelect-report" id="categoriaSelect-report"></select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center my-4">
            <button type="button" onclick="EnviarReporte()" class="btn btn-success py-3">Generar Reporte
                <i class="material-icons">insert_drive_file</i>
            </button>
        </div>
    </div>
</div>


<!-- Ventana para guardar Productos -->
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
                        <input type="text" name="titulo" class="form-control form-control-alternative" required>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="recipient-name" class="col-form-label">Idioma:</label>
                                <input type="text" name="idioma" class="form-control form-control-alternative" required>
                            </div>
                            <div class="col-3">
                                <label for="recipient-name" class="col-form-label">No.Págs:</label>
                                <input type="number" min="1" max="2000" name="noPaginas" class="form-control form-control-alternative" required>
                            </div>
                            <div class="col-5">
                                <div class="form-group mt-4">
                                    <div class="floating-label">
                                        <label for="encuadernacion">Encuadernacion</label>
                                        <select class="form-control" name="encuadernacion" id="encuadernacion" required>
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
                            <textarea class="form-control" name="resena" id="resena" rows="5"></textarea required>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="recipient-name" class="col-form-label">Precio:</label>
                                <input type="number" min="0.01" max="999.99" step="0.01" name="precio" class="form-control form-control-alternative" required>
                            </div>
                            <div class="col-3">
                                <label for="recipient-name" class="col-form-label">Cantidad:</label>
                                <input type="number" min="0" max="5000" step="1" name="cantidad" class="form-control form-control-alternative" required>
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
                                <input type="text" readonly class="form-control-plaintext" id="aprobacion-update">
                            </div>
                            <div class="col-4">
                                <label for="likes">Likes:</label>
                                <input type="text" readonly class="form-control-plaintext" id="likes-update">
                            </div>
                            <div class="col-4">
                                <label for="dislikes">Dislikes:</label>
                                <input type="text" readonly class="form-control-plaintext" id="dislikes-update">
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

<!-- Ventana para modificar Productos -->
<div class="modal fade" id="modificarProductosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Modificar Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-update-producto">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="idLibro">Código:</label>
                                    <input type="text" readonly class="form-control-plaintext" name="idLibro" id="idLibro">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="autorSelect">Autor</label>
                                <select class="form-control" name="autorSelect-update" id="autorSelect-update"></select>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="editorialSelect">Editorial</label>
                                    <select class="form-control" name="editorialSelect-update" id="editorialSelect-update"></select>
                                </div>
                            </div>
                        </div>
                        <label for="recipient-name" class="col-form-label">Titulo:</label>
                        <input type="text" name="titulo-update" id="titulo-update" class="form-control form-control-alternative">
                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="recipient-name" class="col-form-label">Idioma:</label>
                                <input type="text" name="idioma-update" id="idioma-update" class="form-control form-control-alternative">
                            </div>
                            <div class="col-3">
                                <label for="recipient-name" class="col-form-label">No.Págs:</label>
                                <input type="number" min="1" max="2000" name="noPaginas-update" id="noPaginas-update" class="form-control form-control-alternative">
                            </div>
                            <div class="col-5">
                                <div class="form-group mt-3">
                                    <label for="encuadernacion">Encuadernacion</label>
                                    <select class="form-control" name="encuadernacion-update" id="encuadernacion-update">
                                        <option value="0"></option>
                                        <option value="Tapa blanda">Tapa blanda</option>
                                        <option value="Tapa dura">Tapa dura</option>
                                        <option value="Tapa blanda de bolsillo">Tapa blanda de bolsillo</option>
                                        <option value="Tapa dura de bolsillo">Tapa dura de bolsillo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="resena">Reseña:</label>
                            <textarea class="form-control" name="resena-update" id="resena-update" rows="5"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="recipient-name" class="col-form-label">Precio:</label>
                                <input type="number" min="0.01" max="999.99" step="0.01" name="precio-update" id="precio-update" class="form-control form-control-alternative">
                            </div>
                            <div class="col-3">
                                <label for="recipient-name" class="col-form-label">Cantidad:</label>
                                <input type="number" min="0" max="5000" step="1" name="cantidad-update" id="cantidad-update" class="form-control form-control-alternative">
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="categoria">Categoria</label>
                                    <select class="form-control" name="categoriaSelect-update" id="categoriaSelect-update"></select>

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
                            <div class="col-12 d-flex justify-content-center my-4">
                                <div id="imagen-update-container"></div>
                            </div>
                            <div class="col-12">
                                <div class="custom-file mt-4">
                                    <input type="file" class="custom-file-input" name="imagen-update" id="imagen-update" lang="es">
                                    <label class="custom-file-label" for="imagen-update">Seleccionar imagen</label>
                                </div>
                            </div>
                        </div>
                        <label for="archivo" class="col-form-label">Archivo</label>
                        <input name="imagen-producto" id="imagen-producto" type="text" class="form-control form-control-alternative" readonly>
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
<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::footerTemplate('productos');
?>