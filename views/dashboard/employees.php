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
              <h2 class="text-white mb-0">Empleados</h2>
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
                <a href="#" data-toggle="modal" data-target="#guardarEmpleadoModal">
                  <i class="fas fa-plus"></i>
                </a>
              </div>
              <div class="icon icon-shape bg-warning text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip" data-placement="top" title="Modificar">
                <a href="#" data-toggle="modal" data-target="#modificarEmpleadoModal">
                  <i class="fas fa-pen"></i>
                </a>
              </div>
              <div class="icon icon-shape bg-danger text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="deleteAlert('Empleado')">
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
                <th scope="col">DUI</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr id="1" onclick="selectedRow(1)">
                <th scope="row">
                  <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">Andre Fernando</span>
                  </div>
                </th>
                <td>
                  Candray Castillo
                </td>
                <td>
                  andre_candray@gmail.com
                </td>
                <td>
                  01805710-0
                </td>
                <td>

                </td>
              </tr>
              <tr id="2" onclick="selectedRow(2)">
                <th scope="row">
                  <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">Andre Fernando</span>
                  </div>
                </th>
                <td>
                  Candray Castillo
                </td>
                <td>
                  andre_candray@gmail.com
                </td>
                <td>
                  01805710-0
                </td>
                <td>

                </td>
              </tr>
              <tr id="3" onclick="selectedRow(3)">
                <th scope="row">
                  <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">Andre Fernando</span>
                  </div>
                </th>
                <td>
                  Candray Castillo
                </td>
                <td>
                  andre_candray@gmail.com
                </td>
                <td>
                  01805710-0
                </td>
                <td>

                </td>
              </tr>
              <tr id="4" onclick="selectedRow(4)">
                <th scope="row">
                  <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">Andre Fernando</span>
                  </div>
                </th>
                <td>
                  Candray Castillo
                </td>
                <td>
                  andre_candray@gmail.com
                </td>
                <td>
                  01805710-0
                </td>
                <td>

                </td>
              </tr>
              <tr id="5" onclick="selectedRow(5)">
                <th scope="row">
                  <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">Andre Fernando</span>
                  </div>
                </th>
                <td>
                  Candray Castillo
                </td>
                <td>
                  andre_candray@gmail.com
                </td>
                <td>
                  01805710-0
                </td>
                <td>

                </td>
              </tr>
              <tr id="6" onclick="selectedRow(6)">
                <th scope="row">
                  <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">Andre Fernando</span>
                  </div>
                </th>
                <td>
                  Candray Castillo
                </td>
                <td>
                  andre_candray@gmail.com
                </td>
                <td>
                  01805710-0
                </td>
                <td>

                </td>
              </tr>
              <tr id="7" onclick="selectedRow(7)">
                <th scope="row">
                  <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">Andre Fernando</span>
                  </div>
                </th>
                <td>
                  Candray Castillo
                </td>
                <td>
                  andre_candray@gmail.com
                </td>
                <td>
                  01805710-0
                </td>
                <td>

                </td>
              </tr>
              <tr id="8" onclick="selectedRow(8)">
                <th scope="row">
                  <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">Andre Fernando</span>
                  </div>
                </th>
                <td>
                  Candray Castillo
                </td>
                <td>
                  andre_candray@gmail.com
                </td>
                <td>
                  01805710-0
                </td>
                <td>

                </td>
              </tr>
              <tr id="9" onclick="selectedRow(9)">
                <th scope="row">
                  <div class="media align-items-center" style="">
                    <span class="mb-0 text-sm">Andre Fernando</span>
                  </div>
                </th>
                <td>
                  Candray Castillo
                </td>
                <td>
                  andre_candray@gmail.com
                </td>
                <td>
                  01805710-0
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

  <div class="modal fade" id="guardarEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Guardar Empleado</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Codigo:</label>
              <input type="text" class="form-control form-control-alternative" id="codigoEmpleado" disabled>

              <div class="row">
                <div class="col-6">
                  <label for="message-text" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control form-control-alternative" id="nombreEmpleado">
                </div>
                <div class="col-6">
                  <label for="message-text" class="col-form-label">Apellido:</label>
                  <input type="text" class="form-control form-control-alternative" id="apellidoEmpleado">
                </div>
              </div>

              <label for="message-text" class="col-form-label">Correo:</label>
              <input type="text" class="form-control form-control-alternative" id="correoEmpleado">

              <label for="message-text" class="col-form-label">Contraseña:</label>
              <input type="text" class="form-control form-control-alternative" id="contraseñasEmpleado">

              <label for="message-text" class="col-form-label">DUI:</label>
              <input type="text" class="form-control form-control-alternative" id="duiEmpleado">

            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" data-dismiss="modal" onclick="savedAlert('Empleado')">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modificarEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Agregar Empleado</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Codigo:</label>
              <input type="text" class="form-control form-control-alternative" id="codigoEmpleado" disabled value="001">

              <div class="row">
                <div class="col-6">
                  <label for="message-text" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control form-control-alternative" id="nombreEmpleado" value="Andre Candray">
                </div>
                <div class="col-6">
                  <label for="message-text" class="col-form-label">Apellido:</label>
                  <input type="text" class="form-control form-control-alternative" id="apellidoEmpleado" value="Fernando Castillo">
                </div>
              </div>

              <label for="message-text" class="col-form-label">Correo:</label>
              <input type="text" class="form-control form-control-alternative" id="correoEmpleado" value="andre_candray@gmail.com">

              <label for="message-text" class="col-form-label">Contraseña:</label>
              <input type="text" class="form-control form-control-alternative" id="contraseñasEmpleado" value="password123245">

              <label for="message-text" class="col-form-label">DUI:</label>
              <input type="text" class="form-control form-control-alternative" id="duiEmpleado" value="01805710-0">

            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="modifyAlert('Empleado')">Modificar</button>
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
