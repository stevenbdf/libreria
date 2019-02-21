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
                  <h2 class="text-white mb-0">Comentarios de Libros</h2>
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
                    <a href="#" data-toggle="modal" data-target="#guardarProductoModal">
                      <i class="fas fa-plus"></i>
                    </a>
                  </div>
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="No disponible" style="background-color:#773f31 !important;">
                    <a href="#" data-toggle="modal" data-target="#modificarProductoModal">
                      <i class="fas fa-pen"></i>
                    </a>
                  </div>
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="Eliminar" onclick="deleteAlert('Comentario')">
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
                    <th scope="col">Libro</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cliente</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="1" onclick="$('#verComentarioLibros').modal('show'); selectedRow(1)">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero...</span>
                      </div>
                    </th>
                    <td>
                      Es un libro que te atrapa...
                    </td>
                    <td>
                      10:15
                    </td>
                    <td>
                      01/01/19
                    </td>
                    <td>
                      Carla Guzman
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr id="2" onclick="$('#verComentarioLibros').modal('show'); selectedRow(2)">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero...</span>
                      </div>
                    </th>
                    <td>
                      Es un libro que te atrapa...
                    </td>
                    <td>
                      10:15
                    </td>
                    <td>
                      01/01/19
                    </td>
                    <td>
                      Carla Guzman
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr id="3" onclick="$('#verComentarioLibros').modal('show'); selectedRow(3)">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero...</span>
                      </div>
                    </th>
                    <td>
                      Es un libro que te atrapa...
                    </td>
                    <td>
                      10:15
                    </td>
                    <td>
                      01/01/19
                    </td>
                    <td>
                      Carla Guzman
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr id="4" onclick="$('#verComentarioLibros').modal('show'); selectedRow(4)">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero...</span>
                      </div>
                    </th>
                    <td>
                      Es un libro que te atrapa...
                    </td>
                    <td>
                      10:15
                    </td>
                    <td>
                      01/01/19
                    </td>
                    <td>
                      Carla Guzman
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr id="5" onclick="$('#verComentarioLibros').modal('show'); selectedRow(5)">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">101 mensajes para decir te quiero...</span>
                      </div>
                    </th>
                    <td>
                      Es un libro que te atrapa...
                    </td>
                    <td>
                      10:15
                    </td>
                    <td>
                      01/01/19
                    </td>
                    <td>
                      Carla Guzman
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

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Gestionar</h6>
                  <h2 class="text-white mb-0">Comentarios de Noticias</h2>
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
                    <a href="#" data-toggle="modal" data-target="#guardarProductoModal">
                      <i class="fas fa-plus"></i>
                    </a>
                  </div>
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="No disponible" style="background-color:#773f31 !important;">
                    <a href="#" data-toggle="modal" data-target="#modificarProductoModal">
                      <i class="fas fa-pen"></i>
                    </a>
                  </div>
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="Eliminar" onclick="deleteAlert('Comentario')">
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
                    <th scope="col">Noticia</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cliente</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="1b" onclick="$('#verComentarioNoticias').modal('show'); selectedRow('1b');">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">Bruna Husky: La detective replicante...</span>
                      </div>
                    </th>
                    <td>
                      Una noticia verdaderamente...
                    </td>
                    <td>
                      10:15
                    </td>
                    <td>
                      01/01/19
                    </td>
                    <td>
                      Carla Guzman
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr id="2b" onclick="$('#verComentarioNoticias').modal('show'); selectedRow('2b')">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">Bruna Husky: La detective replicante...</span>
                      </div>
                    </th>
                    <td>
                      Una noticia verdaderamente...
                    </td>
                    <td>
                      10:15
                    </td>
                    <td>
                      01/01/19
                    </td>
                    <td>
                      Carla Guzman
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr id="3b" onclick="$('#verComentarioNoticias').modal('show'); selectedRow('3b')">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">Bruna Husky: La detective replicante...</span>
                      </div>
                    </th>
                    <td>
                      Una noticia verdaderamente...
                    </td>
                    <td>
                      10:15
                    </td>
                    <td>
                      01/01/19
                    </td>
                    <td>
                      Carla Guzman
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr id="4b" onclick="$('#verComentarioNoticias').modal('show'); selectedRow('4b')">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">Bruna Husky: La detective replicante...</span>
                      </div>
                    </th>
                    <td>
                      Una noticia verdaderamente...
                    </td>
                    <td>
                      10:15
                    </td>
                    <td>
                      01/01/19
                    </td>
                    <td>
                      Carla Guzman
                    </td>
                    <td>

                    </td>
                  </tr>
                  <tr id="5b" onclick="$('#verComentarioNoticias').modal('show'); selectedRow('5b')">
                    <th scope="row">
                      <div class="media align-items-center" style="">
                        <span class="mb-0 text-sm">Bruna Husky: La detective replicante...</span>
                      </div>
                    </th>
                    <td>
                      Una noticia verdaderamente...
                    </td>
                    <td>
                      10:15
                    </td>
                    <td>
                      01/01/19
                    </td>
                    <td>
                      Carla Guzman
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

      <div class="modal fade" id="verComentarioLibros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Ver comentarios de libros</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Codigo Comentario:</label>
                  <input type="text" class="form-control form-control-alternative" id="codigoComentarioLibros" readonly value="0002">

                  <label for="message-text" class="col-form-label">Libro:</label>
                  <input type="text" class="form-control form-control-alternative" id="tituloLibro" readonly value="101 mensajes para decir te quiero para colorear y regalar">

                  <label for="message-text" class="col-form-label">Comentario:</label>
                  <textarea id="comentarioLibro" class="form-control form-control-alternative" rows="5" readonly>Es un libro que te atrapa desde las primeras paginas,totalmente recomendable, pero no para un public juvenil, más bien para personas que estamos reencontrandonos en otra etapa de la vida.
                  </textarea>

                  <div class="row">
                    <div class="col-3">
                      <label for="message-text" class="col-form-label" >Hora:</label>
                      <input type="time"  class="form-control form-control-alternative" id="horaComentarioLibro" value="18:45" readonly>
                    </div>
                    <div class="col-4">
                      <label for="message-text" class="col-form-label">Fecha:</label>
                      <input type="text" class="form-control form-control-alternative" id="fechaComentarioLibro" value="02/03/2019" readonly>
                    </div>
                    <div class="col-5">
                      <label for="message-text" class="col-form-label">Cliente:</label>
                        <input type="text" class="form-control form-control-alternative" id="nombreClienteLibro" value="Fabiola Martinez" readonly>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success btn-block" data-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="verComentarioNoticias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Ver comentarios de noticias</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Codigo Noticia:</label>
                  <input type="text" class="form-control form-control-alternative" id="codigoComentarioLibros" readonly value="0002">

                  <label for="message-text" class="col-form-label">Noticia:</label>
                  <input type="text" class="form-control form-control-alternative" id="tituloLibro" readonly value="Bruna Husky: La detective replicante de Rosa Montero que nos trasporta a un mundo dominado por la tecnología.">

                  <label for="message-text" class="col-form-label">Comentario:</label>
                  <textarea id="comentarioLibro" class="form-control form-control-alternative" rows="5" readonly>Una noticia verdaderamente interesante, sin duda un libro que espero con muchas ganas.
                  </textarea>

                  <div class="row">
                    <div class="col-3">
                      <label for="message-text" class="col-form-label" >Hora:</label>
                      <input type="time"  class="form-control form-control-alternative" id="horaComentarioLibro" value="18:45" readonly>
                    </div>
                    <div class="col-4">
                      <label for="message-text" class="col-form-label">Fecha:</label>
                      <input type="text" class="form-control form-control-alternative" id="fechaComentarioLibro" value="02/03/2019" readonly>
                    </div>
                    <div class="col-5">
                      <label for="message-text" class="col-form-label">Cliente:</label>
                        <input type="text" class="form-control form-control-alternative" id="nombreClienteLibro" value="Fabiola Martinez" readonly>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success btn-block" data-dismiss="modal">OK</button>
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
</body>

</html>
