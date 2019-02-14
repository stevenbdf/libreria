<?php
class model_page{
    public static function header(){
        return '
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
                      Mi Perfil
                      <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="login.php">Editar Mis Datos</a>
                      <a class="dropdown-item" href="#">Mis Comentarios</a>
                      <a class="dropdown-item" href="#">Mis Pedidos</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">$17.5 <i class="fas fa-shopping-cart"></i></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        ';
    }

    public static function headerDashboard(){
        return '
        <!DOCTYPE html>
        <html>

        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
          <meta name="author" content="Creative Tim">
          <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
          <!-- Favicon -->
          <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
          <!-- Fonts -->
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
          <!-- Icons -->
          <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
          <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
          <!-- Argon CSS -->
          <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">
        </head>
        ';
    }

    public static function footer(){
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
                <a href="news.php">Noticias</a>
              </div>
              <div class="col-12 col-md-6 col-lg pb-2">
                <a id="botoncito" href="#">Terminos y Condiciones</a>
              </div>
              <div class="col-12 col-md-6 col-lg pb-2">
                <a href="#">Privacidad</a>
              </div>
              <div class="col-12 col-md-6 col-lg pb-2">
                <a href="mission.vision.php">Mision y Vision</a>
              </div>
            </div>
          </div>
        </footer>




        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../../resources/js/jquery-3.3.1.slim.js"></script>
        <script src="../../resources/js/popper.js"></script>
        <script src="../../resources/js/bootstrap.js"></script>
        <script src="../../resources/js/argon.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script defer src="../../resources/js/index.js"></script>


      </body>

      </html>
        ');
    }

    public static function footerDashboard(){
        print('

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../../resources/js/jquery-3.3.1.slim.js"></script>
        <script src="../../resources/js/popper.js"></script>
        <script src="../../resources/js/bootstrap.js"></script>
        <script src="../../resources/js/argon.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script defer src="../../resources/js/index.js"></script>


      </body>

      </html>
        ');
    }
}
?>
