<?php
  require_once '../../core/helpers/model_page.php';
  echo model_page::headerDashboardManagement();
 ?>

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
                  <h2 class="text-white mb-0">Clientes</h2>
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
                  <div class="icon icon-shape bg-success text-white rounded-circle shadow ml-md-2 ml-lg-0 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="No disponible" style="background-color:#306950 !important;">
                    <a href="#" data-toggle="modal" data-target="#">
                      <i class="fas fa-plus"></i>
                    </a>
                  </div>
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="No disponible" style="background-color:#773f31 !important;">
                    <a href="#" data-toggle="modal" data-target="#">
                      <i class="fas fa-pen"></i>
                    </a>
                  </div>
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="Desactivar" onclick="deleteAlert('Empleado')">
                    <a>
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush" id="productos">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Direccion</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="1" onclick="selectedRow(1)">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">Fabiola Nicole</span>
                      </div>
                    </th>
                    <td>
                      Matinez Ramirez
                    </td>
                    <td>
                      fabiolamartinez190201@gmail.com
                    </td>
                    <td>
                      San Salvador, El Salvador CP20100
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                  </tr>

                  <tr id="2" onclick="selectedRow(2)">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">Fabiola Nicole</span>
                      </div>
                    </th>
                    <td>
                      Matinez Ramirez
                    </td>
                    <td>
                      fabiolamartinez190201@gmail.com
                    </td>
                    <td>
                      San Salvador, El Salvador CP20100
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                  </tr>

                  <tr id="3" onclick="selectedRow(3)">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">Fabiola Nicole</span>
                      </div>
                    </th>
                    <td>
                      Matinez Ramirez
                    </td>
                    <td>
                      fabiolamartinez190201@gmail.com
                    </td>
                    <td>
                      San Salvador, El Salvador CP20100
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                  </tr>

                  <tr id="4" onclick="selectedRow(4)">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">Fabiola Nicole</span>
                      </div>
                    </th>
                    <td>
                      Matinez Ramirez
                    </td>
                    <td>
                      fabiolamartinez190201@gmail.com
                    </td>
                    <td>
                      San Salvador, El Salvador CP20100
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                  </tr>

                  <tr id="5" onclick="selectedRow(5)">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">Fabiola Nicole</span>
                      </div>
                    </th>
                    <td>
                      Matinez Ramirez
                    </td>
                    <td>
                      fabiolamartinez190201@gmail.com
                    </td>
                    <td>
                      San Salvador, El Salvador CP20100
                    </td>
                    <td>

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
                    <div class="col-3">
                      <label for="message-text" class="col-form-label">Precio:</label>
                      <input type="number" step=".01" min="0" class="form-control form-control-alternative" id="tituloLibro">
                    </div>
                    <div class="col-3">
                      <label for="message-text" class="col-form-label">Cantidad:</label>
                      <input type="number" step="any" min="0" class="form-control form-control-alternative" id="cantidadLibro">
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

                  <div class="row mt-3 ">
                    <div class="input-group mt-3 container">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Imagen</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFoto1" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFoto1">Subir archivo</label>
                      </div>
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
                  <input type="text" class="form-control form-control-alternative" id="ISBN" value="9788441436008">

                  <label for="message-text" class="col-form-label">Autor:</label>
                  <div class="input-group mb-3">
                    <select class="custom-select form-control-alternative" id="inputGroupAutor">
                      <option>Seleccionar...</option>
                      <option selected value="1">Eduardo Galeano</option>
                      <option value="2">Claudia Lars</option>
                      <option value="3">Jean Luke</option>
                    </select>
                  </div>

                  <label for="message-text" class="col-form-label">Editorial:</label>
                  <div class="input-group mb-3">
                    <select class="custom-select form-control-alternative" id="inputGroupEditorials">
                      <option>Seleccionar...</option>
                      <option selected value="1">Debolsillo</option>
                      <option value="2">Santillana El Salvador</option>
                      <option value="3">Editorial Planeta</option>
                    </select>
                  </div>

                  <label for="message-text" class="col-form-label">Titulo:</label>
                  <input type="text" class="form-control form-control-alternative" id="tituloLibro" value="101 mensajes para decir te quiero para colorear y regalar">

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
                      <input type="number" class="form-control form-control-alternative" id="noPags" value="112">
                    </div>
                    <div class="col-5">
                      <label for="message-text" class="col-form-label">Ecuadernación:</label>
                      <div class="input-group mb-3">
                        <select class="custom-select form-control-alternative" id="inputGroupEcuadernacion">
                          <option>Seleccionar...</option>
                          <option value="1">Tapa Dura</option>
                          <option selected value="2">Tapa Blanda</option>
                          <option value="3">Tapa Dura de Bolsillo</option>
                          <option value="3">Tapa Blanda de Bolsillo</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <label for="message-text" class="col-form-label">Reseña:</label>
                  <textarea id="resena" class="form-control form-control-alternative" rows="5" placeholder="Escriba una breve descripción ...">¡Prepara los lápices de colores! Di «Te quiero» de la forma más creativa y original. Medita sobre pensamientos positivos para crecer... ¡libera al artista que llevas dentro! Los libros para colorear son la última tendencia antiestrés para adultos y base para talleres terapéuticos. La arteterapia y el coloreado ayudan a relajarse, disminuir el estrés y a aumentar la concentración gracias a los lápices de colores.
                  </textarea>

                  <div class="row">
                    <div class="col-3">
                      <label for="message-text" class="col-form-label">Precio:</label>
                      <input type="number" step=".01" min="0" class="form-control form-control-alternative" id="tituloLibro" value="15.95">
                    </div>
                    <div class="col-3">
                      <label for="message-text" class="col-form-label">Cantidad:</label>
                      <input type="number" step="any" min="0" class="form-control form-control-alternative" id="cantidadLibro" value="150">
                    </div>
                    <div class="col-6">
                      <label for="message-text" class="col-form-label">Categoria:</label>
                      <div class="input-group mb-3">
                        <select class="custom-select form-control-alternative" id="inputGroupCategoria">
                          <option>Seleccionar...</option>
                          <option value="1">Comic</option>
                          <option value="2">Aventura</option>
                          <option value="3">Ciencia Ficción</option>
                          <option selected value="3">Romance</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <label for="message-text" class="col-form-label">Me gusta:</label>
                      <input type="number" class="form-control form-control-alternative" id="likes" disabled value="5000">
                    </div>
                    <div class="col-6">
                      <label for="message-text" class="col-form-label">No me gusta:</label>
                      <input type="number" class="form-control form-control-alternative" id="dislikes" disabled value="755">
                    </div>
                  </div>

                  <div class="row mt-3 ">
                    <div class="input-group mt-3 container">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Imagen</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFoto1" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFoto1">Subir archivo</label>
                      </div>
                    </div>
                  </div>

                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="modifyAlert('Libro')">Modificar</button>
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
