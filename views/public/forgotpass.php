<?php
require_once '../../core/helpers/modelPage.php';
echo modelPage::header();
?>

<main id="login">
    <div class="container-fluid login pt-5 pt-lg-4 pb-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Ingresa tu correo y te ayudaremos a recuperar tu contraseña</small>
                        </div>
                        <form>

                            <div class="form-group  mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-envelope-open"></i></span>
                                    </div>
                                    <input id="correo" class="form-control form-control-alternative" placeholder="Email" type="email">
                                </div>
                            </div>

                            <div class="text-center">
                                <button onclick="enviarCorreo()" type="button" class="btn btn-primary my-4">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Parte final del form, está fuera del cuadro-->
                <div class="row mt-3">
                    <div class="col-6">
                        <a href="login.php" class="text-light">
                            <small>Iniciar Sesión</small>
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
<script src="../../resources/js/index.js"></script>
<script src="../../core/controllers/public/forgotPass.js"></script>
</body>

</html>