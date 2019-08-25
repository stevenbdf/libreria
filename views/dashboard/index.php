<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Iniciar sesión');
?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-6" style="margin-top: 12.5%;">
            <div class="card">
                <div class="card-body">
                    <form class="row" id="form-session">
                        <div class="col-12 d-flex justify-content-center align-items-center py-4" style="flex-direction: column;">
                            <h1>Iniciar Sesión</h1>
                            <i class="material-icons mt-4" style="font-size: 120px;">
                                supervised_user_circle
                            </i>
                        </div>
                        <div class="form-group col-12 col-md-10 mt-3 offset-md-1">
                            <label for="exampleInputEmail1">Correo:</label>
                            <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp" placeholder="alguien@dominio.com" required autocomplete="off">
                            <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo
                                electrónico con nadie más.</small>
                        </div>
                        <div class="form-group col-12 col-md-10 mt-3 offset-md-1">
                            <label for="exampleInputPassword1">Contraseña:</label>
                            <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="*******" required autocomplete="off">
                        </div>
                        <div class="col-12 col-md-10 offset-md-1">
                            <div class="row d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary p-3">Ingresar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::footerTemplate('login');
?>