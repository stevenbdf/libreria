<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
    <!-- CSS -->
    <!-- Add Material font (Roboto) and Material icon as needed -->
    <link href="../../resources/fonts/Googlefonts.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Add Material CSS, replace Bootstrap CSS -->
    <link href="../../resources/css/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../resources/css/material/material.min.css">
    <link href="../../resources/css/material/material.css" rel="stylesheet">
</head>
<body>
    <main>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-6" style="margin-top: 12.5%;">
                    <div class="card">
                        <div class="card-body">
                            <form class="row" id="form-register-dashboard">
                                <div class="col-12 d-flex justify-content-center align-items-center py-4"
                                    style="flex-direction: column;">
                                    <h1>Registrate</h1>
                                    <i class="material-icons mt-4" style="font-size: 120px;">
                                        supervised_user_circle
                                    </i>
                                </div>
                                <div class="form-group col-12 col-md-6 mt-3">
                                    <label>Nombres:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="form-group col-12 col-md-6 mt-3">
                                    <label for="exampleInputPassword1">Apellidos:</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                                </div>
                                <div class="form-group col-12 col-md-12 mt-3">
                                    <label>Correo:</label>
                                    <input type="email" class="form-control" id="correo" name="correo" required>
                                </div>
                                <div class="form-group col-12 col-md-6 mt-3">
                                    <label>DUI:</label>
                                    <input type="number" class="form-control" id="dui" name="dui" required>
                                </div>
                                <div class="form-group col-12 col-md-6 mt-3">
                                    <label>Contraseña:</label>
                                    <input type="password" class="form-control" id="contrasena" name="contrasena"
                                        required>
                                </div>
                                <div class="col-12 col-md-10 offset-md-1">
                                    <div class="row d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary p-3">Registrarse</button>
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
    <script src="../../libraries/jquery-3.3.1.js"></script>
    <script src="../../libraries/popper.js"></script>
    <script src="../../libraries/bootstrap-dashboard.js"></script>

    <!-- Then Material JavaScript on top of Bootstrap JavaScript -->

    <!-- <script src="../../resources/js/material/material.js"></script> -->
    <script src="../../resources/js/material/material.js"></script>
    <script src="../../core/helpers/functions.js"></script>
    <script src="../../resources/js/sweetalert2.min.js"></script>
    <script src="../../core/controllers/dashboard/register.js"></script>

</body>
</html>