<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Noticias');
?>
<div class="container mt-5">
    <div id="alerts"></div>
    <div class="row shadow-sm p-3 mb-5 bg-white rounded">
        <div class="table-responsive-lg" style="width:100%">
            <h1 class="text-center text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">
                Noticias</h1>
            <div class="row d-flex justify-content-center">
                <div class="col-6 col-md-4 text-center">
                    <button type="button" class="mr-lg-2 btn btn-success" data-toggle="modal"
                        data-target="#guardarNoticiaModal">
                        <i class="material-icons mr-2">add</i>
                        Agregar
                    </button>
                    <button type="button" class="ml-lg-2 btn btn-info" id="reload">
                        <i class="material-icons mr-2">sync</i>
                        Recargar
                    </button>
                </div>
            </div>
            <table id="noticia" class="table table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Título</th>
                        <th scope="col">Imágen</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-read-noticia"></tbody>
            </table>
        </div>
    </div>
</div>
<!-- Ventana para guardar Autor -->
<div class="modal fade" id="guardarNoticiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Agregar Noticia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-create-noticia">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label">Título</label>
                                <input type="text" id="titulo" name="titulo"
                                    class="form-control form-control-alternative">
                            </div>
                            <div class="col-12 mt-4">
                                <div class="textfield-box">
                                    <label for="recipient-name" class="col-form-label">Descripción</label>
                                    <div id="editor"></div>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Imagen</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imagen" name="imagen"
                                            style="width:100%;">
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
<!-- Ventana para modificar Autor -->
<div class="modal fade" id="modificarNoticiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Modificar Noticia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-update-noticia">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Codigo:</label>
                        <input name="id-update" type="text" class="form-control form-control-alternative" id="idNoticia"
                            readonly>

                        <div class="row">
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label">Título</label>
                                <input name="titulo-update" type="text" class="form-control form-control-alternative"
                                    id="tituloNoticia">
                            </div>
                            <div class="col-12">
                                <div class="textfield-box">
                                    <label for="recipient-name" class="col-form-label">Descripción</label>
                                    <div id="editor2"></div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center my-4">
                                <div id="imagen-update-container"></div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Imagen</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imagen-update"
                                            name="imagen-update">
                                        <label class="custom-file-label" for="inputGroupFile01">.gif, .png, .jpg</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="archivo" class="col-form-label">Archivo</label>
                        <input name="imagen-noticia" id="imagen-noticia" type="text"
                            class="form-control form-control-alternative" readonly>
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
</main>

<footer
    style="background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 66%, #ee609c 80%, #ee609c 100%);"
    class="text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <h5 class="text-white">Dashboard</h5>
                <a class="text-white" href="mailto:support@libreria-maquilishuat.com"><i
                        class="material-icons left">email</i>Ayuda</a>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <h5 class="text-white">Enlaces</h5>
                <a class="text-white" href="http://localhost/phpmyadmin/" target="_blank"><i
                        class="material-icons left">cloud</i> phpMyAdmin</a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="container">
                <span>© Libreria Maquilishuat, todos los derechos reservados.</span>
                <span class="text-white">Diseñado con <a class="	text-accent-1"
                        href="http://daemonite.github.io/material/" target="_blank"><b class="text-white">Bootstrap -
                            Daemonite`s Material UI</b></a></span>
            </div>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../../libraries/jquery-3.3.1.js"></script>
<script src="../../libraries/popper.js"></script>
<script src="../../libraries/bootstrap-dashboard.js"></script>

<!-- Then Material JavaScript on top of Bootstrap JavaScript -->

<!-- Froala text editor plugin -->

<script type="text/javascript" src="../../libraries/code-mirror.js"></script>
<script type="text/javascript" src="../../libraries/xml.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/froala_editor.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/align.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/code_beautifier.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/code_view.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/draggable.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/image.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/image_manager.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/link.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/lists.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/paragraph_format.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/paragraph_style.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/table.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/video.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/url.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/plugins/entities.min.js"></script>
<script type="text/javascript" src="../../resources/js/froala-text-editor/languages/es.js"></script>

<!-- <script src="../../resources/js/material/material.js"></script> -->
<script src="../../resources/js/material/material.js"></script>
<script src="../../resources/js/material/jquery.dataTables.min.js"></script>
<script src="../../resources/js/material/dataTables.material.min.js"></script>
<script src="../../core/helpers/functions.js"></script>
<script src="../../resources/js/sweetalert2.min.js"></script>

<script src="../../core/controllers/dashboard/noticias.js"></script>

</body>

</html>