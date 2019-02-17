<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Dashboard - Libreria Maquilishuat</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../resources/css/bootstrap.css">
  <!-- Fonts -->
  <link href="../../resources/fonts/GoogleArgo.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="../../resources/fonts/Googlefonts.css" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->


  <!-- Maquilishuat -->
  <link rel="icon" type="image/png" href="../../resources/img/fav-ico.PNG">

  <link type="text/css" href="./assets/css/argon.css" rel="stylesheet">
  <link rel="stylesheet" href="../../resources/css/style.css">
</head>

<body>
  <!-- Sidenav -->

  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.html">
        <img src="../../resources/img/logo.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="./assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./index.html">
              <i class="fas fa-chart-area mr-3 text-primary"></i>Seleccionar graficos...
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted"> <i class="fas fa-dollar-sign mr-2 text-primary"></i>Ventas </h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">

          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-palette"></i> Dia
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-ui-04"></i> Mes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-ui-04"></i> Año
            </a>
          </li>
        </ul>

        <h6 class="navbar-heading text-muted"><i class="far fa-eye mr-2 text-primary"></i>Visitas </h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">

          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-palette"></i> Dia
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-ui-04"></i> Mes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-ui-04"></i> Año
            </a>
          </li>
        </ul>

        <h6 class="navbar-heading text-muted"><i class="fas fa-users mr-2 text-primary"></i>Usuarios registrados </h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">

          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-palette"></i> Dia
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-ui-04"></i> Mes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-ui-04"></i> Año
            </a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Dashboard</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="./assets/img/theme/team-4-800x800.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Jessica Jones</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mi Perfil</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Configuración</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">

          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Gestionar</h6>
                  <h2 class="text-white mb-0">Productos</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <div class="row">
                <div class="col-12 col-md-6 col-lg-6 pt-auto">
                  <div class="input-group input-group-alternative mt-md-2 mt-lg-0">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                    </div>
                    <input class="form-control form-control-alternative" placeholder="Buscar ..." type="text">
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 offset-lg-2 mt-3 mt-md-0 d-flex justify-content-around">
                  <div class="icon icon-shape bg-success text-white rounded-circle shadow ml-md-2 ml-lg-0 mt-md-2 mt-lg-0" data-toggle="tooltip" data-placement="top" title="Agregar">
                    <a href="#" data-toggle="modal" data-target="#guardarProductoModal">
                      <i class="fas fa-plus"></i>
                    </a>
                  </div>
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip" data-placement="top" title="Modificar">
                    <a href="#" data-toggle="modal" data-target="#modificarProductoModal">
                      <i class="fas fa-pen"></i>
                    </a>
                  </div>
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="deleteAlert()">
                    <a>
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Idioma</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Categoria</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr onclick="alert('me tocaste')">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero para colorear y regalar</span>
                      </div>
                    </th>
                    <td>
                      Lisa Magano
                    </td>
                    <td>
                      Español
                    </td>
                    <td>
                      $15.95
                    </td>
                    <td>
                      Drama
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero para colorear y regalar</span>
                      </div>
                    </th>
                    <td>
                      Lisa Magano
                    </td>
                    <td>
                      Español
                    </td>
                    <td>
                      $15.95
                    </td>
                    <td>
                      Drama
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero para colorear y regalar</span>
                      </div>
                    </th>
                    <td>
                      Lisa Magano
                    </td>
                    <td>
                      Español
                    </td>
                    <td>
                      $15.95
                    </td>
                    <td>
                      Drama
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero para colorear y regalar</span>
                      </div>
                    </th>
                    <td>
                      Lisa Magano
                    </td>
                    <td>
                      Español
                    </td>
                    <td>
                      $15.95
                    </td>
                    <td>
                      Drama
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero para colorear y regalar</span>
                      </div>
                    </th>
                    <td>
                      Lisa Magano
                    </td>
                    <td>
                      Español
                    </td>
                    <td>
                      $15.95
                    </td>
                    <td>
                      Drama
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero para colorear y regalar</span>
                      </div>
                    </th>
                    <td>
                      Lisa Magano
                    </td>
                    <td>
                      Español
                    </td>
                    <td>
                      $15.95
                    </td>
                    <td>
                      Drama
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero para colorear y regalar</span>
                      </div>
                    </th>
                    <td>
                      Lisa Magano
                    </td>
                    <td>
                      Español
                    </td>
                    <td>
                      $15.95
                    </td>
                    <td>
                      Drama
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero para colorear y regalar</span>
                      </div>
                    </th>
                    <td>
                      Lisa Magano
                    </td>
                    <td>
                      Español
                    </td>
                    <td>
                      $15.95
                    </td>
                    <td>
                      Drama
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero para colorear y regalar</span>
                      </div>
                    </th>
                    <td>
                      Lisa Magano
                    </td>
                    <td>
                      Español
                    </td>
                    <td>
                      $15.95
                    </td>
                    <td>
                      Drama
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero para colorear y regalar</span>
                      </div>
                    </th>
                    <td>
                      Lisa Magano
                    </td>
                    <td>
                      Español
                    </td>
                    <td>
                      $15.95
                    </td>
                    <td>
                      Drama
                    </td>
                    <td>

                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
            <div class="card-footer py-4" style="background-color:#172b4d !important;">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>

      </div>

      <div class="modal fade" id="guardarProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Agregar Producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">ISBN:</label>
                  <input type="text" class="form-control form-control-alternative" id="ISBN">

                  <label for="message-text" class="col-form-label">Autor:</label>
                  <div class="input-group mb-3">
                    <select class="custom-select form-control-alternative" id="inputGroupAutor">
                      <option selected>Seleccionar...</option>
                      <option value="1">Eduardo Galeano</option>
                      <option value="2">Claudia Lars</option>
                      <option value="3">Jean Luke</option>
                    </select>
                  </div>

                  <label for="message-text" class="col-form-label">Editorial:</label>
                  <div class="input-group mb-3">
                    <select class="custom-select form-control-alternative" id="inputGroupEditorials">
                      <option selected>Seleccionar...</option>
                      <option value="1">Debolsillo</option>
                      <option value="2">Santillana El Salvador</option>
                      <option value="3">Editorial Planeta</option>
                    </select>
                  </div>

                  <label for="message-text" class="col-form-label">Titulo:</label>
                  <input type="text" class="form-control form-control-alternative" id="tituloLibro">

                  <div class="row">
                    <div class="col-3">
                      <label for="message-text" class="col-form-label">Idioma:</label>
                      <div class="input group dropdown d-block">
                        <a href="#" class="btn btn-default dropdown-toggle " data-toggle="dropdown" id="navbarDropdownMenuLink2">
                            <img src="../../resources/img/flags/SV.png" /> ...
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                            <li>
                                <a class="dropdown-item" href="#">
                                  <img src="../../resources/img/flags/DE.png" /> Deutsch
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                  <img src="../../resources/img/flags/GB.png" /> English(UK)
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                  <img src="../../resources/img/flags/FR.png" /> Français
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                  <img src="../../resources/img/flags/ES.png" /> Español
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                  <img src="../../resources/img/flags/PT.png" /> Portuges
                                </a>
                            </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-4">
                      <label for="message-text" class="col-form-label">No. de páginas:</label>
                      <input type="number" class="form-control form-control-alternative" id="noPags">
                    </div>
                    <div class="col-5">
                      <label for="message-text" class="col-form-label">Ecuadernación:</label>
                      <div class="input-group mb-3">
                        <select class="custom-select form-control-alternative" id="inputGroupEcuadernacion">
                          <option selected>Seleccionar...</option>
                          <option value="1">Tapa Dura</option>
                          <option value="2">Tapa Blanda</option>
                          <option value="3">Tapa Dura de Bolsillo</option>
                          <option value="3">Tapa Blanda de Bolsillo</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <label for="message-text" class="col-form-label">Reseña:</label>
                  <textarea id="resena" class="form-control form-control-alternative" rows="5" placeholder="Escriba una breve descripción ..."></textarea>

                  <div class="row">
                    <div class="col-6">
                      <label for="message-text" class="col-form-label">Precio:</label>
                      <input type="number" step=".01" min="0" class="form-control form-control-alternative" id="tituloLibro">
                    </div>
                    <div class="col-6">
                      <label for="message-text" class="col-form-label">Categoria:</label>
                      <div class="input-group mb-3">
                        <select class="custom-select form-control-alternative" id="inputGroupCategoria">
                          <option selected>Seleccionar...</option>
                          <option value="1">Comic</option>
                          <option value="2">Aventura</option>
                          <option value="3">Ciencia Ficción</option>
                          <option value="3">Romance</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <label for="message-text" class="col-form-label">Me gusta:</label>
                      <input type="number" class="form-control form-control-alternative" id="likes" disabled value="0">
                    </div>
                    <div class="col-6">
                      <label for="message-text" class="col-form-label">No me gusta:</label>
                      <input type="number" class="form-control form-control-alternative" id="dislikes" disabled value="0">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-success" data-dismiss="modal" onclick="savedAlert('Libro')">Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modificarProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Modificar Producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">ISBN:</label>
                  <input type="text" class="form-control form-control-alternative" id="ISBN">

                  <label for="message-text" class="col-form-label">Autor:</label>
                  <div class="input-group mb-3">
                    <select class="custom-select form-control-alternative" id="inputGroupAutor">
                      <option selected>Seleccionar...</option>
                      <option value="1">Eduardo Galeano</option>
                      <option value="2">Claudia Lars</option>
                      <option value="3">Jean Luke</option>
                    </select>
                  </div>

                  <label for="message-text" class="col-form-label">Editorial:</label>
                  <div class="input-group mb-3">
                    <select class="custom-select form-control-alternative" id="inputGroupEditorials">
                      <option selected>Seleccionar...</option>
                      <option value="1">Debolsillo</option>
                      <option value="2">Santillana El Salvador</option>
                      <option value="3">Editorial Planeta</option>
                    </select>
                  </div>

                  <label for="message-text" class="col-form-label">Titulo:</label>
                  <input type="text" class="form-control form-control-alternative" id="tituloLibro">

                  <div class="row">
                    <div class="col-3">
                      <label for="message-text" class="col-form-label">Idioma:</label>
                      <div class="input group dropdown d-block">
                        <a href="#" class="btn btn-default dropdown-toggle " data-toggle="dropdown" id="navbarDropdownMenuLink2">
                            <img src="../../resources/img/flags/SV.png" /> ...
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                            <li>
                                <a class="dropdown-item" href="#">
                                  <img src="../../resources/img/flags/DE.png" /> Deutsch
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                  <img src="../../resources/img/flags/GB.png" /> English(UK)
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                  <img src="../../resources/img/flags/FR.png" /> Français
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                  <img src="../../resources/img/flags/ES.png" /> Español
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                  <img src="../../resources/img/flags/PT.png" /> Portuges
                                </a>
                            </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-4">
                      <label for="message-text" class="col-form-label">No. de páginas:</label>
                      <input type="number" class="form-control form-control-alternative" id="noPags">
                    </div>
                    <div class="col-5">
                      <label for="message-text" class="col-form-label">Ecuadernación:</label>
                      <div class="input-group mb-3">
                        <select class="custom-select form-control-alternative" id="inputGroupEcuadernacion">
                          <option selected>Seleccionar...</option>
                          <option value="1">Tapa Dura</option>
                          <option value="2">Tapa Blanda</option>
                          <option value="3">Tapa Dura de Bolsillo</option>
                          <option value="3">Tapa Blanda de Bolsillo</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <label for="message-text" class="col-form-label">Reseña:</label>
                  <textarea id="resena" class="form-control form-control-alternative" rows="5" placeholder="Escriba una breve descripción ..."></textarea>

                  <div class="row">
                    <div class="col-6">
                      <label for="message-text" class="col-form-label">Precio:</label>
                      <input type="number" step=".01" min="0" class="form-control form-control-alternative" id="tituloLibro">
                    </div>
                    <div class="col-6">
                      <label for="message-text" class="col-form-label">Categoria:</label>
                      <div class="input-group mb-3">
                        <select class="custom-select form-control-alternative" id="inputGroupCategoria">
                          <option selected>Seleccionar...</option>
                          <option value="1">Comic</option>
                          <option value="2">Aventura</option>
                          <option value="3">Ciencia Ficción</option>
                          <option value="3">Romance</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <label for="message-text" class="col-form-label">Me gusta:</label>
                      <input type="number" class="form-control form-control-alternative" id="likes" disabled value="0">
                    </div>
                    <div class="col-6">
                      <label for="message-text" class="col-form-label">No me gusta:</label>
                      <input type="number" class="form-control form-control-alternative" id="dislikes" disabled value="0">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="savedAlert('Libro')">Modificar</button>
            </div>
          </div>
        </div>
      </div>





      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.0"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script src="../../resources/js/index.js"></script>
</body>

</html>
