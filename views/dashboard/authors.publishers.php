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
                  <h2 class="text-white mb-0">Autores</h2>
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
                <div class="col-12 col-md-6 col-lg-2 offset-lg-4 mt-3 mt-md-0 float-right">
                  <div class="icon icon-shape bg-success text-white rounded-circle shadow ml-md-2 ml-lg-0 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="Agregar">
                    <a href="#" data-toggle="modal" data-target="#guardarAutoresModal">
                      <i class="fas fa-plus"></i>
                    </a>
                  </div>  
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush" id="productos">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Pais</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody id="tbody-read-autores">
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

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Gestionar</h6>
                  <h2 class="text-white mb-0">Editoriales</h2>
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
                  <div class="icon icon-shape bg-success text-white rounded-circle shadow ml-md-2 ml-lg-0 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="Agregar">
                    <a href="#" data-toggle="modal" data-target="#guardarEditorialesModal">
                      <i class="fas fa-plus"></i>
                    </a>
                  </div>
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="Modificar">
                    <a href="#" data-toggle="modal" data-target="#modificarEditorialesModal">
                      <i class="fas fa-pen"></i>
                    </a>
                  </div>
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="Eliminar" onclick="deleteAlert('Editorial')">
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
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Pais</th>
                    <th scope="col">Tel</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="1b" onclick="selectedRow('1b')">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">1</span>
                      </div>
                    </th>
                    <td>
                      Nube de tinta
                    </td>
                    <td>
                      Travessera de Gracia, 47-49 Barcelona   08021 Ba...
                    </td>
                    <td>
                      Chile
                    </td>
                    <td>
                      +93 3660300
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr id="2b" onclick="selectedRow('2b')">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">2</span>
                      </div>
                    </th>
                    <td>
                      Debolsillo
                    </td>
                    <td>
                      Blvd. Miguel de Cervantes Saavedra 301, piso 1 Co...
                    </td>
                    <td>
                      México
                    </td>
                    <td>
                      +55 3067 8441
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr id="3b" onclick="selectedRow('3b')">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">3</span>
                      </div>
                    </th>
                    <td>
                      Santillana ESA
                    </td>
                    <td>
                      87 avenida norte #311 Colonia Escalón, San Salvad...
                    </td>
                    <td>
                      El Salvador
                    </td>
                    <td>
                      +503 2505-8920
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr id="4b" onclick="selectedRow('4b')">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">4</span>
                      </div>
                    </th>
                    <td>
                      Editorial Planeta
                    </td>
                    <td>
                      Av. Diagonal, 662-664 08034 Barcelona
                    </td>
                    <td>
                      España
                    </td>
                    <td>
                      +662 664 08034
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


      <div class="modal fade" id="guardarAutoresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                  <label for="recipient-name" class="col-form-label">Codigo:</label>
                  <input type="text" name="codigo" class="form-control form-control-alternative" id="codigoAutor" readonly>

                  <div class="row">
                    <div class="col-6">
                      <label for="recipient-name" class="col-form-label">Nombre:</label>
                      <input type="text" name="nombres" class="form-control form-control-alternative" id="nombreAutor">
                    </div>
                    <div class="col-6">
                      <label for="recipient-name" class="col-form-label">Apellido:</label>
                      <input type="text" name="apellidos" class="form-control form-control-alternative" id="apellidoAutor">
                    </div>
                  </div>

                  <label for="recipient-name" class="col-form-label">Pais:</label>
                  <input type="text" name="pais" class="form-control form-control-alternative" id="paisAutor">

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

      <div class="modal fade" id="modificarAutoresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Modificar Autor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Codigo:</label>
                  <input type="text" class="form-control form-control-alternative" id="codigoAutor" readonly value="1">

                  <div class="row">
                    <div class="col-6">
                      <label for="recipient-name" class="col-form-label">Nombre:</label>
                      <input type="text" class="form-control form-control-alternative" id="nombreAutor" value="Jojo">
                    </div>
                    <div class="col-6">
                      <label for="recipient-name" class="col-form-label">Apellido:</label>
                      <input type="text" class="form-control form-control-alternative" id="apellidoAutor" value="Moyes">
                    </div>
                  </div>

                  <label for="recipient-name" class="col-form-label">Pais:</label>
                  <input type="text" class="form-control form-control-alternative" id="paisAutor" value="Estados Unidos">

                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="modifyAlert('Autor')">Modificar</button>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="guardarEditorialesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Agregar Editorial</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Codigo:</label>
                  <input type="text" class="form-control form-control-alternative" id="codigoEditorial" readonly>


                  <label for="recipient-name" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control form-control-alternative" id="nombreEditorial">

                  <label for="recipient-name" class="col-form-label">Dirección:</label>
                  <input type="text" class="form-control form-control-alternative" id=direccionEditorial>

                  <div class="row">
                    <div class="col-6">
                      <label for="recipient-name" class="col-form-label">Pais:</label>
                      <input type="text" class="form-control form-control-alternative" id="paisEditorial">
                    </div>
                    <div class="col-6">
                      <label for="recipient-name" class="col-form-label">Telefono:</label>
                      <input type="text" class="form-control form-control-alternative" id="telefonoEditorial">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-success" data-dismiss="modal" onclick="savedAlert('Editorial')">Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modificarEditorialesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Modificar Editorial</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Codigo:</label>
                  <input type="text" class="form-control form-control-alternative" id="codigoEditorial" readonly value="1">


                  <label for="recipient-name" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control form-control-alternative" id="nombreEditorial" value="Nube de tinta">

                  <label for="recipient-name" class="col-form-label">Dirección:</label>
                  <input type="text" class="form-control form-control-alternative" id=direccionEditorial value="Travessera de Gracia, 47-49
Barcelona 08021 Barcelona ">

                  <div class="row">
                    <div class="col-6">
                      <label for="recipient-name" class="col-form-label">Pais:</label>
                      <input type="text" class="form-control form-control-alternative" id="paisEditorial" value="Chile">
                    </div>
                    <div class="col-6">
                      <label for="recipient-name" class="col-form-label">Telefono:</label>
                      <input type="text" class="form-control form-control-alternative" id="telefonoEditorial" value="+93 3660300">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="modifyAlert('Editorial')">Modificar</button>
            </div>
          </div>
        </div>
      </div>




      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 Libreria Maquilishuat
            </div>
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
  <script src="../../resources/js/sweetalert2.min.js"></script>
  <script src="../../resources/js/index.js"></script>
  <script src="../../core/helpers/functions.js"></script>
  <script src="../../core/controllers/dashboard/autores.js"></script>
</body>

</html>
