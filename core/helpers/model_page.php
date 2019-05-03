<?php
class model_page{
    public static function header(){
      session_start();

      ini_set('date.timezone', 'America/El_Salvador');

      if (isset($_SESSION['idCliente'])) {
        print ('
        <!doctype html>
        <html lang="es">
        <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="../../resources/css/bootstrap.css">
          <!-- Font Awesome -->
          <link rel="stylesheet" href="../../resources/css/all.css">
          <script defer src="../../resources/js/all.js"></script>
          <!-- Google Fonts -->
          <link href="../../resources/fonts/Googlefonts.css" rel="stylesheet">

          <!-- Fonts -->
          <link href="../../resources/fonts/GoogleArgo.css" rel="stylesheet">
          <!-- Icons -->
          <link href="../../resources/vendor/nucleo/css/nucleo.css" rel="stylesheet">
          <!-- Argon CSS -->
          <link type="text/css" href="../../resources/css/argon.min.css" rel="stylesheet">
          <!-- Sweetalert2 -->
          <link type="text/css" href="../../resources/css/sweetalert2.min.css" rel="stylesheet">
          <!-- Maquilishuat -->
          <link rel="icon" type="image/png" href="../../resources/img/fav-ico.PNG" />
          <link rel="stylesheet" href="../../resources/css/style.css">

          <title>Libreria Maquilishuat</title>
        </head>

        <body>
          <nav id="nav" class="navbar navbar-expand-lg navbar-dark bg-gradient-primary sticky-top">
            <div class="container">
              <a class="navbar-brand" href="#"><img src="../../resources/img/logo.png" alt=""></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-collapse-header">
                  <div class="row">
                    <div class="col-6 collapse-brand">
                      <a href="index.php">
                        <img src="../../resources/img/logo.png">
                      </a>
                    </div>
                    <div class="col-6 collapse-close">
                      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                      </button>
                    </div>
                  </div>
                </div>
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio <i class="fas fa-home"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categories.php">Categorias <i class="fas fa-filter"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="news.php">Noticias <i class="far fa-newspaper"></i></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Mi Cuenta
                      <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="profile.php">Editar Mis Datos</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" onclick="signOffCliente()">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></a>
                    </div>
                  </li>
                  <li class="nav-item mt-1">
                    <a class="nav-link" href="shoppinginfo.php"><i class="fas fa-shopping-cart"></i></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
      ');
      } else {
        print ('
        <!doctype html>
        <html lang="es">
        <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="../../resources/css/bootstrap.css">
          <!-- Font Awesome -->
          <link rel="stylesheet" href="../../resources/css/all.css">
          <script defer src="../../resources/js/all.js"></script>
          <!-- Google Fonts -->
          <link href="../../resources/fonts/Googlefonts.css" rel="stylesheet">

          <!-- Fonts -->
          <link href="../../resources/fonts/GoogleArgo.css" rel="stylesheet">
          <!-- Icons -->
          <link href="../../resources/vendor/nucleo/css/nucleo.css" rel="stylesheet">
          <!-- Argon CSS -->
          <link type="text/css" href="../../resources/css/argon.min.css" rel="stylesheet">
          <!-- Sweetalert2 -->
          <link type="text/css" href="../../resources/css/sweetalert2.min.css" rel="stylesheet">
          <!-- Maquilishuat -->
          <link rel="icon" type="image/png" href="../../resources/img/fav-ico.PNG" />
          <link rel="stylesheet" href="../../resources/css/style.css">

          <title>Libreria Maquilishuat</title>
        </head>

        <body>
          <nav id="nav" class="navbar navbar-expand-lg navbar-dark bg-gradient-primary sticky-top">
            <div class="container">
              <a class="navbar-brand" href="#"><img src="../../resources/img/logo.png" alt=""></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-collapse-header">
                  <div class="row">
                    <div class="col-6 collapse-brand">
                      <a href="index.php">
                        <img src="../../resources/img/logo.png">
                      </a>
                    </div>
                    <div class="col-6 collapse-close">
                      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                      </button>
                    </div>
                  </div>
                </div>
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio <i class="fas fa-home"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="categories.php">Categorias <i class="fas fa-filter"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="news.php">Noticias <i class="far fa-newspaper"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login <i class="fas fa-user"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
      ');
      }

    }

    public static function footer($controller ='index'){
        print('
        <footer id="footer" class="pb-4 pt-4 bg-gradient-primary">
          <div class="container">
            <div class="row text-center">
              <div class="col-12 col-md-6 col-lg pb-2">
                <a href="index.php">Inicio</a>
              </div>
              <div class="col-12 col-md-6 col-lg pb-2">
                <a href="contact.php">Contactanos</a>
              </div>
              <div class="col-12 col-md-6 col-lg pb-2">
                <a id="botoncito" href="#">Terminos y Condiciones</a>
              </div>
              <div class="col-12 col-md-6 col-lg pb-2">
                <a href="mission.vision.php">Mision y Vision</a>
              </div>

            </div>
          </div>
        </footer>




        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="../../core/helpers/functions.js"></script>
        <script src="../../resources/js/popper.js"></script>
        <script src="../../resources/js/bootstrap.js"></script>
        <script src="../../resources/js/bootstrap.bundle.min.js"></script>
        <script src="../../resources/js/argon.min.js"></script>
        <script src="../../resources/js/sweetalert2.min.js"></script>
        <script defer src="../../resources/js/index.js"></script>
        <script src="../../core/controllers/public/'.$controller.'.js"></script>


      </body>

      </html>
        ');
    }
}
