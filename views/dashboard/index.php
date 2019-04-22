<?php
require_once('../../core/helpers/dashboardTemplate.php');
Dashboard::headerTemplate('Iniciar sesión');
?>
    <main>
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
                                    <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp"
                                        placeholder="alguien@dominio.com">
                                    <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo
                                        electrónico con nadie más.</small>
                                </div>
                                <div class="form-group col-12 col-md-10 mt-3 offset-md-1">
                                    <label for="exampleInputPassword1">Contraseña:</label>
                                    <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="*******">
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
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <!-- Then Material JavaScript on top of Bootstrap JavaScript -->

    <!-- <script src="../../resources/js/material/material.js"></script> -->
    <script src="../../resources/js/material/material.js"></script>
    <script src="../../core/helpers/functions.js"></script>
    <script src="../../resources/js/sweetalert2.min.js"></script>

    <script src="../../core/controllers/dashboard/login.js"></script>

</body>

</html>