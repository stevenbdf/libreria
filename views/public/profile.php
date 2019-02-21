<?php
  require_once '../../core/helpers/model_page.php';
  echo model_page::header();
 ?>

 <!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8" style="min-height: 600px; background-image: url(../dashboard/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="display-2 text-white text-center">Hola Jesse</h1>
        <p class="text-white mt-0 mb-5 text-center">Esta es la pagina de perfil donde puedes gestionar tu información.</p>
      </div>
    </div>

</div>
<!-- Page content -->
<div class="container-fluid mt--9">
  <div class="row">

    <div class="col-xl-10 offset-xl-1 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Mi Cuenta</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form>
            <h6 class="heading-small text-muted mb-4">Información de Usuario</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Correo:</label>
                    <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">DUI:</label>
                    <input type="text" id="DUI" class="form-control form-control-alternative" placeholder="0145857-8">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Nombre:</label>
                    <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="Lucky">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Apellido</label>
                    <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
                  </div>
                </div>
              </div>
              <a href="#!" class="btn btn-info">Editar Perfil</a>
            </div>
            <hr class="my-4" />
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Cambiar Contraseña</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">Contraseña Actual:</label>
                    <input class="form-control form-control-alternative" type="password">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-city">Nueva Contraseña:</label>
                    <input type="password" class="form-control form-control-alternative">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-country">Confirmar Contraseña:</label>
                    <input type="password" class="form-control form-control-alternative">
                  </div>
                </div>
              </div>
              <a href="#!" class="btn btn-info">Cambiar Contraseña</a>
            </div>
            <hr class="my-4" />
          </form>
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


  <!-- Se especifica que archivos se han usado para el funcionamiento del login-->
  <script src="../../resources/js/jquery-3.3.1.slim.js"></script>
  <script src="../../resources/js/popper.js"></script>
  <script src="../../resources/js/bootstrap.js"></script>
  <script src="../../resources/js/argon.min.js"></script>
  <script src="../../resources/js/sweetalert2.min.js"></script>
  <script defer src="../../resources/js/index.js"></script>

</body>

</html>
