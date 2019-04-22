<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
    <!-- CSS -->
    <!-- Add Material font (Roboto) and Material icon as needed -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Add Material CSS, replace Bootstrap CSS -->
    <link href="../../resources/css/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../resources/css/material/material.min.css">
    <link rel="stylesheet" href="../../resources/css/material/dataTables.material.min.css">

    <!-- Froala text editor -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../resources/css/froala-text-editor/froala_editor.css">
  <link rel="stylesheet" href="../../resources/css/froala-text-editor/froala_style.css">
  <link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/code_view.css">
  <link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/image_manager.css">
  <link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/image.css">
  <link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/table.css">
  <link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/video.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

    <link href="../../resources/css/material/material.css" rel="stylesheet">

    <link rel="stylesheet" href="../../resources/css/authors.publishers/style.css">

</head>



<body>
    <header class="navbar navbar-dark navbar-full bg-primary doc-navbar-default sticky-top">
        <button aria-controls="navdrawerDefault" aria-expanded="false" aria-label="Toggle Navdrawer"
            class="navbar-toggler" data-target="#navdrawerDefault" data-toggle="navdrawer"><span
                class="navbar-toggler-icon"></span></button>
        <span class="navbar-brand mr-auto">Libreria Maquilishuat</span>
    </header>
    <div aria-hidden="true" class="navdrawer" id="navdrawerDefault" tabindex="-1">
        <div class="navdrawer-content">
            <div class="navdrawer-header">
                <a class="navbar-brand px-0" href="#">Navdrawer header</a>
            </div>
            <nav class="navdrawer-nav">
                <a class="nav-item nav-link active" href="#">Active</a>
                <a class="nav-item nav-link disabled" href="#">Disabled</a>
                <a class="nav-item nav-link" href="#">Link</a>
            </nav>
            <div class="navdrawer-divider"></div>
            <p class="navdrawer-subheader">Navdrawer subheader</p>
            <ul class="navdrawer-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="material-icons mr-3">alarm_on</i> Active with icon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#"><i class="material-icons mr-3">alarm_off</i> Disabled with
                        icon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="material-icons mr-3">link</i> Link with icon</a>
                </li>
            </ul>
        </div>
    </div>
    <main>
        <div class="container mt-5">
            <div id="alerts"></div>
            <div class="row shadow-sm p-3 mb-5 bg-white rounded">
                <div class="table-responsive-lg" style="width:100%">
                    <h1 class="text-center text-uppercase mt-4 mb-4"
                        style="font-family: 'Arimo', sans-serif; font-size:50px;">Noticias</h1>
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
                                <th scope="col">Descripción</th>
                                <th scope="col">Imágen</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-read-noticia"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- Ventana para guardar Autor -->
    <div class="modal fade" id="guardarNoticiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form method="POST" id="form-create-noticia">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="recipient-name" class="col-form-label">Título</label>
                                    <input type="text" id="titulo" name="titulo" class="form-control form-control-alternative">
                                </div>
                                <div class="col-12">
                                    <div class="textfield-box">
                                        <label for="recipient-name" class="col-form-label">Descripción</label>
                                        <div id="editor"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="recipient-name" class="col-form-label">Imágen</label>
                                    <input id="imagen" name="imagen" type="text" class="form-control form-control-alternative" name="imagen">
                                    <button class="btn btn-primary my-1" type="button">Buscar imagen</button>
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
                            <input name="id-update" type="text" class="form-control form-control-alternative"
                                id="idAutor" readonly>

                            <div class="row">
                                <div class="col-12">
                                    <label for="recipient-name" class="col-form-label">Título</label>
                                    <input name="titulo-update" type="text"
                                        class="form-control form-control-alternative" id="tituloNoticia">
                                </div>
                                <div class="col-12">
                                    <div class="textfield-box">
                                        <label for="recipient-name" class="col-form-label">Descripción</label>
                                        <input aria-describedby="exampleTextfieldBox1Help" name="descripcion-update" type="text" class="form-control" id="descripcionNoticia" placeholder="Edite aquí su noticia...">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="recipient-name" class="col-form-label">Imágen</label>
                                    <input type="text" name="imagen-update"
                                        class="form-control form-control-alternative" id="imagenNoticia">
                                    <button class="btn btn-primary my-1" type="button">Buscar imagen</button>
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

    <!-- Froala text editor plugin -->

    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
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