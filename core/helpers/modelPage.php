<?php
class modelPage
{
  public static function header()
  {
    session_start();

    ini_set('date.timezone', 'America/El_Salvador');
    if (isset($_SESSION['idCliente'])) {
      $total = 0;
      if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $key => $value) {
          foreach ($value as $key2 => $value2) {
            $total =  $total + ((float)$value2['precio'] * (int)$value2['cantidad']);
          }
        }
      }
      print('
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
                      <a class="dropdown-item" href="profile.php">Editar mis datos</a>
                      <a class="dropdown-item" href="orders.php">Mis pedidos</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" onclick="signOffCliente()">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></a>
                    </div>
                  </li>
                  <li class="nav-item ">
                    <a id="cart-label-info" class="nav-link" href="shoppinginfo.php"><i class="fas fa-shopping-cart"></i> $' . $total . '</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
      ');
    } else {
      print('
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

  public static function footer($controller = 'index')
  {
    print('
        <div class="modal fade" id="terminosCondiciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h2 style="text-align: center;"><strong>Términos y Condiciones de Uso</strong></h2><p>&nbsp;</p><p><strong>INFORMACIÓN RELEVANTE</strong></p><p>Es requisito necesario para la adquisición de los productos que se ofrecen en este sitio, que lea y acepte los siguientes Términos y Condiciones que a continuación se redactan. El uso de nuestros servicios así como la compra de nuestros productos implicará que usted ha leído y aceptado los Términos y Condiciones de Uso en el presente documento. Todas los productos &nbsp;que son ofrecidos por nuestro sitio web pudieran ser creadas, cobradas, enviadas o presentadas por una página web tercera y en tal caso estarían sujetas a sus propios Términos y Condiciones. En algunos casos, para adquirir un producto, será necesario el registro por parte del usuario, con ingreso de datos personales fidedignos y definición de una contraseña.</p><p>El usuario puede elegir y cambiar la clave para su acceso de administración de la cuenta en cualquier momento, en caso de que se haya registrado y que sea necesario para la compra de alguno de nuestros productos. libreria-maquilishuat.com no asume la responsabilidad en caso de que entregue dicha clave a terceros.</p><p>Todas las compras y transacciones que se lleven a cabo por medio de este sitio web, están sujetas a un proceso de confirmación y verificación, el cual podría incluir la verificación del stock y disponibilidad de producto, validación de la forma de pago, validación de la factura (en caso de existir) y el cumplimiento de las condiciones requeridas por el medio de pago seleccionado. En algunos casos puede que se requiera una verificación por medio de correo electrónico.</p><p>Los precios de los productos ofrecidos en esta Tienda Online es válido solamente en las compras realizadas en este sitio web.</p><p><strong>LICENCIA</strong></p><p>Libreria Maquilishuat&nbsp; a través de su sitio web concede una licencia para que los usuarios utilicen&nbsp; los productos que son vendidos en este sitio web de acuerdo a los Términos y Condiciones que se describen en este documento.</p><p><strong>USO NO AUTORIZADO</strong></p><p>En caso de que aplique (para venta de software, templetes, u otro producto de diseño y programación) usted no puede colocar uno de nuestros productos, modificado o sin modificar, en un CD, sitio web o ningún otro medio y ofrecerlos para la redistribución o la reventa de ningún tipo.</p><p><strong>PROPIEDAD</strong></p><p>Usted no puede declarar propiedad intelectual o exclusiva a ninguno de nuestros productos, modificado o sin modificar. Todos los productos son propiedad &nbsp;de los proveedores del contenido. En caso de que no se especifique lo contrario, nuestros productos se proporcionan&nbsp; sin ningún tipo de garantía, expresa o implícita. En ningún esta compañía será &nbsp;responsables de ningún daño incluyendo, pero no limitado a, daños directos, indirectos, especiales, fortuitos o consecuentes u otras pérdidas resultantes del uso o de la imposibilidad de utilizar nuestros productos.</p><p><strong>POLÍTICA DE REEMBOLSO Y GARANTÍA</strong></p><p>En el caso de productos que sean&nbsp; mercancías irrevocables no-tangibles, no realizamos reembolsos después de que se envíe el producto, usted tiene la responsabilidad de entender antes de comprarlo. &nbsp;Le pedimos que lea cuidadosamente antes de comprarlo. Hacemos solamente excepciones con esta regla cuando la descripción no se ajusta al producto. Hay algunos productos que pudieran tener garantía y posibilidad de reembolso pero este será especificado al comprar el producto. En tales casos la garantía solo cubrirá fallas de fábrica y sólo se hará efectiva cuando el producto se haya usado correctamente. La garantía no cubre averías o daños ocasionados por uso indebido. Los términos de la garantía están asociados a fallas de fabricación y funcionamiento en condiciones normales de los productos y sólo se harán efectivos estos términos si el equipo ha sido usado correctamente. Esto incluye:</p><p>– De acuerdo a las especificaciones técnicas indicadas para cada producto.<br>– En condiciones ambientales acorde con las especificaciones indicadas por el fabricante.<br>– En uso específico para la función con que fue diseñado de fábrica.<br>– En condiciones de operación eléctricas acorde con las especificaciones y tolerancias indicadas.</p><p><strong>COMPROBACIÓN ANTIFRAUDE</strong></p><p>La compra del cliente puede ser aplazada para la comprobación antifraude. También puede ser suspendida por más tiempo para una investigación más rigurosa, para evitar transacciones fraudulentas.</p><p><strong>PRIVACIDAD</strong></p><p>Este <a href="http://www.lasvegas.es" target="_blank">sitio web</a> libreria-maquilishuat.com garantiza que la información personal que usted envía cuenta con la seguridad necesaria. Los datos ingresados por usuario o en el caso de requerir una validación de los pedidos no serán entregados a terceros, salvo que deba ser revelada en cumplimiento a una orden judicial o requerimientos legales.</p><p>La suscripción a boletines de correos electrónicos publicitarios es voluntaria y podría ser seleccionada al momento de crear su cuenta.</p><p>Libreria Maquilishuat reserva los derechos de cambiar o de modificar estos términos sin previo aviso.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
              </div>
            </div>
          </div>
        </div>
        <footer id="footer" class="pb-4 pt-4 bg-gradient-primary">
          <div class="container">
            <div class="row text-center">
              <div class="col-12 col-md-6 col-lg pb-2">
                <a href="index.php">Inicio</a>
              </div>
              <div class="col-12 col-md-6 col-lg pb-2 d-none">
                <a href="contact.php">Contactanos</a>
              </div>
              <div class="col-12 col-md-6 col-lg pb-2">
                <a data-toggle="modal" data-target="#terminosCondiciones">Terminos y Condiciones</a>
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
        <script src="../../core/helpers/closeSession.js"></script>
        <script src="../../resources/js/popper.js"></script>
        <script src="../../resources/js/bootstrap.js"></script>
        <script src="../../resources/js/bootstrap.bundle.min.js"></script>
        <script src="../../resources/js/argon.min.js"></script>
        <script src="../../resources/js/sweetalert2.min.js"></script>
        <script defer src="../../resources/js/index.js"></script>
        <script src="../../core/controllers/public/' . $controller . '.js"></script>
        <script src="../../core/helpers/Public.js"></script>


      </body>

      </html>
        ');
  }
}
