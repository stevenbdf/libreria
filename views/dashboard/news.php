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
               <h2 class="text-white mb-0">Noticias</h2>
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
                 <a href="#" data-toggle="modal" data-target="#guardarNoticiaModal">
                   <i class="fas fa-plus"></i>
                 </a>
               </div>
               <div class="icon icon-shape bg-warning text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="Modificar">
                 <a href="#" data-toggle="modal" data-target="#modificarNoticiaModal">
                   <i class="fas fa-pen"></i>
                 </a>
               </div>
               <div class="icon icon-shape bg-danger text-white rounded-circle shadow ml-md-2 ml-lg-3 mt-md-2 mt-lg-0" data-toggle="tooltip"  data-placement="top" title="Eliminar" onclick="deleteAlert('Noticia')">
                 <a>
                   <i class="fas fa-trash-alt"></i>
                 </a>
               </div>
             </div>
           </div>
         </div>
         <div class="table-responsive">
           <table class="table align-items-center table-dark table-flush" id="noticias">
             <thead class="thead-dark">
               <tr>
                 <th scope="col">Fecha</th>
                 <th scope="col">Titulo</th>
                 <th scope="col">Autor</th>
                 <th scope="col"></th>
               </tr>
             </thead>
             <tbody>
               <tr id="1" onclick="selectedRow(1)">
                 <th scope="row">
                   <div class="media align-items-center" style="">
                     <span class="mb-0 text-sm">03/02/19</span>
                   </div>
                 </th>
                 <td>
                   Bruna Husky: La detective replicante de Rosa Montero que nos trasporta...
                 </td>
                 <td>
                   Fabiola Martinez
                 </td>
                 <td>

                 </td>
               </tr>
               <tr id="2" onclick="selectedRow(2)">
                 <th scope="row">
                   <div class="media align-items-center" style="">
                     <span class="mb-0 text-sm">24/01/19</span>
                   </div>
                 </th>
                 <td>
                   ¿Sabíais de la existencia de una biblioteca de magia?
                 </td>
                 <td>
                   Steven Diaz
                 </td>
                 <td>

                 </td>
               </tr>
               <tr id="3" onclick="selectedRow(3)">
                 <th scope="row">
                   <div class="media align-items-center" style="">
                     <span class="mb-0 text-sm">03/02/19</span>
                   </div>
                 </th>
                 <td>
                   Bruna Husky: La detective replicante de Rosa Montero que nos trasporta...
                 </td>
                 <td>
                   Fabiola Martinez
                 </td>
                 <td>

                 </td>
               </tr>
               <tr id="4" onclick="selectedRow(4)">
                 <th scope="row">
                   <div class="media align-items-center" style="">
                     <span class="mb-0 text-sm">24/01/19</span>
                   </div>
                 </th>
                 <td>
                   ¿Sabíais de la existencia de una biblioteca de magia?
                 </td>
                 <td>
                   Steven Diaz
                 </td>
                 <td>

                 </td>
               </tr>
               <tr id="5" onclick="selectedRow(5)">
                 <th scope="row">
                   <div class="media align-items-center" style="">
                     <span class="mb-0 text-sm">03/02/19</span>
                   </div>
                 </th>
                 <td>
                   Bruna Husky: La detective replicante de Rosa Montero que nos trasporta...
                 </td>
                 <td>
                   Fabiola Martinez
                 </td>
                 <td>

                 </td>
               </tr>
               <tr id="6" onclick="selectedRow(6)">
                 <th scope="row">
                   <div class="media align-items-center" style="">
                     <span class="mb-0 text-sm">24/01/19</span>
                   </div>
                 </th>
                 <td>
                   ¿Sabíais de la existencia de una biblioteca de magia?
                 </td>
                 <td>
                   Steven Diaz
                 </td>
                 <td>

                 </td>
               </tr>
               <tr id="7" onclick="selectedRow(7)">
                 <th scope="row">
                   <div class="media align-items-center" style="">
                     <span class="mb-0 text-sm">03/02/19</span>
                   </div>
                 </th>
                 <td>
                   Bruna Husky: La detective replicante de Rosa Montero que nos trasporta...
                 </td>
                 <td>
                   Fabiola Martinez
                 </td>
                 <td>

                 </td>
               </tr>
               <tr id="8" onclick="selectedRow(8)">
                 <th scope="row">
                   <div class="media align-items-center" style="">
                     <span class="mb-0 text-sm">24/01/19</span>
                   </div>
                 </th>
                 <td>
                   ¿Sabíais de la existencia de una biblioteca de magia?
                 </td>
                 <td>
                   Steven Diaz
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

   <div class="modal fade" id="guardarNoticiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="exampleModalLabel">Agregar Noticia</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <form>
             <div class="form-group">
               <label for="recipient-name" class="col-form-label">Codigo:</label>
               <input type="text" class="form-control form-control-alternative" id="codNoticia" disabled>

               <label for="message-text" class="col-form-label">Empleado Autor:</label>
               <div class="input-group mb-3">
                 <select class="custom-select form-control-alternative" id="inputGroupAutor">
                   <option selected>Seleccionar...</option>
                   <option value="1">Fabiola Martinez</option>
                   <option value="2">Steven Diaz</option>
                   <option value="3">Boris Huezo</option>
                 </select>
               </div>

               <label for="message-text" class="col-form-label">Fecha:</label>
               <div class="form-group">
                   <div class="input-group input-group-alternative">
                       <div class="input-group-prepend">
                           <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                       </div>
                       <input id="datepicker" class="form-control datepicker" placeholder="Selecciona una fecha" type="text">
                   </div>
               </div>

               <label for="message-text" class="col-form-label">Titulo:</label>
               <input type="text" class="form-control form-control-alternative" id="tituloNoticia">

               <label for="message-text" class="col-form-label">Cuerpo:</label>
               <textarea id="cuerpo1" class="form-control form-control-alternative" rows="20" placeholder="Redacte su noticia ..."></textarea>

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
           <button type="button" class="btn btn-success" data-dismiss="modal" onclick="savedAlert('Noticia')">Guardar</button>
         </div>
       </div>
     </div>
   </div>

   <div class="modal fade" id="modificarNoticiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="exampleModalLabel">Modificar Noticia</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <form>
             <div class="form-group">
               <label for="recipient-name" class="col-form-label">Codigo:</label>
               <input type="text" class="form-control form-control-alternative" id="codNoticia2" value="0154" disabled>

               <label for="message-text" class="col-form-label">Empleado Autor:</label>
               <div class="input-group mb-3">
                 <select class="custom-select form-control-alternative" id="inputGroupAutor2">
                   <option>Seleccionar...</option>
                   <option selected value="1">Fabiola Martinez</option>
                   <option value="2">Steven Diaz</option>
                   <option value="3">Boris Huezo</option>
                 </select>
               </div>

               <label for="message-text" class="col-form-label">Fecha:</label>
               <div class="form-group">
                   <div class="input-group input-group-alternative">
                       <div class="input-group-prepend">
                           <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                       </div>
                       <input class="form-control datepicker" placeholder="Selecciona una fecha" type="text">
                   </div>
               </div>

               <label for="message-text" class="col-form-label">Titulo:</label>
               <input type="text" class="form-control form-control-alternative" id="tituloNoticia2" value="Bruna Husky: La detective replicante de Rosa Montero que nos trasporta a un mundo dominado por la tecnología.">

               <label for="message-text" class="col-form-label">Cuerpo:</label>
               <textarea id="cuerpo2" class="form-control form-control-alternative" rows="20" placeholder="Redacte su noticia ...">Bruna Husky es una detective de ficción, diferente a cualquier otra, empezando porque no es de naturaleza humana, pero sobre todo, es el vehículo que utiliza Rosa Montero para cuestionar temas de un futuro próximo que empiezan a preocupar en el presente, desde la sobrepoblación, a la implantación de tecnología en el cuerpo humano, pasando por el extinción de los recursos del planeta. La visión social detrás de la ficción es el principal atractivo de esta saga de misterio futurista, con casos bien planteados y un mundo de ciber realidad que aterra por la similitud con lo que todos podemos imaginar que el futuro deparará a la humanidad.

¿QUIÉN ES BRUNA HUSKY?

Bruna Husky es una detective replicante que vive en Madrid, en el año 2110. Originariamente creada como replicante de combate consigue su libertad después de dos años trabajando para la empresa que la crea. Bruna vive atormentada porque sabe el día que va a morir, como todos los de su especie. Su vida dura 10 años, después mueren de TTT, un cáncer total que irremediablemente termina con la vida de los que son como ella. Mejorada en fuerza y empatía, Bruna es muy alta para las medidas humanas, lleva la cabeza rapada y un tatuaje diagonal que le cruza el cuerpo. Vive en una sociedad complicada, convulsa y muy revuelta y, a pesar de su alta capacidad empática, es desconfiada, intuitiva y carga con la amargura que proporciona la soledad, porque Bruna no se siente capaz de integrarse ni con los humanos ni con los robots. Los humanos viven como si pensaran que son eternos a pesar de su debilidad. Ella es mucho más fuerte que ningún humano, pero no puede ignorar que sabe cuando va a morir.</textarea>

               <div class="row mt-3 ">
                 <div class="input-group mt-3 container">
                   <div class="input-group-prepend">
                     <span class="input-group-text" id="inputGroupFileAddon01">Imagen</span>
                   </div>
                   <div class="custom-file">
                     <input type="file" class="custom-file-input" id="inputGroupFoto2" aria-describedby="inputGroupFileAddon01">
                     <label class="custom-file-label" for="inputGroupFoto1">Subir archivo</label>
                   </div>
                 </div>
               </div>


             </div>
           </form>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
           <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="modifyAlert('Noticia')">Modificar</button>
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
<script src="./assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Argon JS -->
<script src="./assets/js/argon.js?v=1.0.0"></script>
<script src="../../resources/js/sweetalert2.min.js"></script>
<script src="../../resources/js/index.js"></script>
</body>

</html>
