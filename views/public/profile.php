<?php
require_once '../../core/helpers/model_page.php';
echo model_page::header();
?>

<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8" style="min-height: 600px; background-image: url(../../resources/img/clients/<?php
                                                                                                                  if (isset($_SESSION['imagenCliente']['img'])) {
                                                                                                                    echo $_SESSION['imagenCliente']['img'];
                                                                                                                  } else {
                                                                                                                    echo 'default-profile.gif';
                                                                                                                  } ?>); background-size: contain; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-5"></span>
  <!-- Header container -->

  <div class="row container">
    <div class="col-lg-12">
      <h1 id="nombre-cliente" class="display-2 text-white text-center">Hola Jesse</h1>
      <p class="text-white mt-0 mb-5 text-center">Esta es la pagina de tu cuenta donde puedes gestionar tu información.
      </p>
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
          <form id="form-update-cliente">
            <h6 class="heading-small text-muted mb-4">Información de Usuario</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Nombre:</label>
                    <input type="text" id="nombres" name="nombres" class="form-control form-control-alternative" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Apellido</label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control form-control-alternative" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Correo:</label>
                    <input type="email" id="correo" name="correo" class="form-control form-control-alternative" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" class="form-control form-control-alternative" required>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-image"></i> Imagen:</span>
                      </div>
                      <input id="imagen" name="imagen" class="form-control" type="file">
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-info">Editar Perfil</button>
          </form>
        </div>
        <hr class="my-4" />
        <!-- Address -->
        <h6 class="heading-small text-muted mb-4">Cambiar Contraseña</h6>
        <div class="pl-lg-4">
          <form id="form-update-contrasena-cliente">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-address">Contraseña Actual:</label>
                  <input name="old-password" class="form-control form-control-alternative" type="password" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-address">Reíte tu contraseña Actual:</label>
                  <input name="old-password-2" class="form-control form-control-alternative" type="password" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-city">Nueva Contraseña:</label>
                  <input name="new-password" type="password" class="form-control form-control-alternative" required>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-country">Confirmar Contraseña:</label>
                  <input name="new-password-2" type="password" class="form-control form-control-alternative" required>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-info">Cambiar Contraseña</button>
          </form>
        </div>
        <hr class="my-4" />
      </div>
    </div>
  </div>
</div>
<?php
echo model_page::footer('perfil');
?>