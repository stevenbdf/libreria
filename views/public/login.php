<?php
  require_once '../../core/helpers/model_page.php';
  echo model_page::header();
 ?>

  <main id="login">
    <div class="container-fluid login pt-5 pt-lg-4 pb-4">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-white pb-5">
              <div class="text-muted text-center mb-3">
                <small>Continua con ...</small>
              </div>
              <div class="btn-wrapper text-center"> <!-- En esta parte se podrá iniciar sesión con otro métodos -->
                <a href="https:www.facebook.com" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon">
                    <i class="fab fa-facebook-square"></i>
                  </span>
                  <span class="btn-inner--text">Facebook</span>
                </a>
                <a href="https:www.gmail.com" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon">
                    <i class="fab fa-google"></i>
                  </span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>O ingresa con tus credenciales</small>
              </div>
              <form>

                <div class="form-group  mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-envelope-open"></i></span>
                    </div>
                    <input class="form-control form-control-alternative" placeholder="Email" type="email">
                  </div>
                </div>

                <div class="form-group password">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span>Recuerdame</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="button" class="btn btn-primary my-4">Acceder</button>
                </div>
              </form>
            </div>
          </div>
          <!--Parte final del form, está fuera del cuadro-->
          <div class="row mt-3">
            <div class="col-6">
              <a href="forgotpass.php" class="text-light">
                <small>¿Olvidaste tu contraseña?</small>
              </a>
            </div>
            <div class="col-6 text-right">
              <a href="register.php" class="text-light">
                <small>Registrate</small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


  <!-- Se especifica que archivos se han usado para el funcionamiento del login-->
  <script src="../../resources/js/jquery-3.3.1.slim.js"></script>
  <script src="../../resources/js/popper.js"></script>
  <script src="../../resources/js/bootstrap.js"></script>
  <script src="../../resources/js/argon.min.js"></script>
  <script src="../../resources/js/sweetalert2.min.js"></script>
  <script defer src="../../resources/js/index.js"></script>

</body>

</html>
