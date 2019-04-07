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
    
    
    <link href="../../resources/css/material/material.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../../resources/css/authors.publishers/style.css">

</head>
<header class="navbar navbar-dark navbar-full bg-primary doc-navbar-default">
    <button aria-controls="navdrawerDefault" aria-expanded="false" aria-label="Toggle Navdrawer" class="navbar-toggler"
        data-target="#navdrawerDefault" data-toggle="navdrawer"><span class="navbar-toggler-icon"></span></button>
    <span class="navbar-brand mr-auto">Libreria Maquilishuat</span>
</header>


<body>
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
                <div class="table-responsive-xl" style="width:100%">
                    <h1 class="text-center text-uppercase mt-4 mb-4" style="font-family: 'Arimo', sans-serif; font-size:50px;">Editoriales</h1>
                    <div class="row d-flex justify-content-center">
                        <div class="col-6 col-md-4 text-center">
                            <button type="button" class="mr-lg-2 btn btn-success" data-toggle="modal"
                                data-target="#guardarEditorialModal">
                                <i class="material-icons mr-2">add</i>
                                Agregar
                            </button>
                            <button type="button" class="ml-lg-2 btn btn-info" id="reload">
                                <i class="material-icons mr-2">sync</i>
                                Recargar
                            </button>
                        </div>
                    </div>
                    <table id="editorial" class="table">
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
    </main>
    <!-- Ventana para guardar Autor -->
    <div class="modal fade" id="guardarEditorialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                                <div class="col-6">
                                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                                    <input type="text" name="nombreEditt" class="form-control form-control-alternative">
                                </div>
                                <div class="col-6">
                                    <label for="recipient-name" class="col-form-label">Pais:</label>
                                    <input type="text" name="pais" class="form-control form-control-alternative">
                                </div>
                                <div class="col-7">
                                    <label for="recipient-name" class="col-form-label">Direccion:</label>
                                    <input type="text" name="direccion" class="form-control form-control-alternative">
                                </div>
                                <div class="col-5">
                                    <label for="recipient-name" class="col-form-label">Telefono:</label>
                                    <input type="text" name="telefono" class="form-control form-control-alternative">
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
    <div class="modal fade" id="modificarEditorialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                            <input name="id-update" type="text" class="form-control form-control-alternative"
                                id="idEditorial" readonly>

                            <div class="row">
                                <div class="col-6">
                                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                                    <input name="nombres-update" type="text"
                                        class="form-control form-control-alternative" id="nombreEditorial">
                                </div>     
                            <div class="row">
                                <div class="col-6">
                                    <label for="recipient-name" class="col-form-label">Teléfono:</label>
                                    <input name="telefono-update" type="text"
                                        class="form-control form-control-alternative" id="telefonoEditorial">
                                </div>
                                <div class="col-5">
                                    <label for="recipient-name" class="col-form-label">Pais:</label>
                                    <input name="pais-update" type="text"
                                        class="form-control form-control-alternative" id="paisEditorial">
                                </div>
                                <div class="col-7">
                                    <label for="recipient-name" class="col-form-label">Direccion:</label>
                                    <input name="direccion-update" type="text"
                                        class="form-control form-control-alternative" id="direccionEditorial">
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

    <script src="../../core/controllers/dashboard/editorial.js"></script>
</body>

</html>