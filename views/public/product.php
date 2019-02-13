<?php
  require_once '../../core/helpers/model_page.php';
  echo model_page::header();
 ?>

  <main id="info-libro">
    <div class="container mt-4 mb-4">
      <div class="row">
        <div id="libro" class="col-md-12 col-lg-5 pt-3 pb-3 text-center"><img src="../../resources/img/libro.jpg" alt="libro ocho"></div>
        <div class="col-md-12 col-lg-7 text-left pt-3">
          <h1>101 mensajes para decir te quiero para colorear y regalar</h1>
          <div class="row mt-4">
            <div class="col-4 text-center"><i class="fas fa-thumbs-up green"></i> Like 5,000</div>
            <div class="col-4 text-center"><i class="fas fa-thumbs-down"></i> Dislike 755</div>
          </div>
          <div class="row mt-4">
            <div class="col-8">
              <div class="progress" style="height:3px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-12 precio text-left">
              <h4>Precio: <span class="libreria-numero">$15.95</span></h4>
            </div>
            <div class="col-6 col-md-4 text-left mt-2 mb-2">
              <button type="button" class="btn btn-success">Agregar al carrito <i class="fas fa-shopping-cart"></i></button>
            </div>
            <div class="col-12 text-left mt-2 mb-2">
              <h4>Disponibles: <span class="libreria-numero">150</span> </h4>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <h3 class="text-uppercase">Acerca del libro</h3>
        </div>
        <div class="col-12">
          <p>¡Prepara los lápices de colores! Di «Te quiero» de la forma más creativa y original.
            Medita sobre pensamientos positivos para crecer... ¡libera al artista que llevas dentro!
            Los libros para colorear son la última tendencia antiestrés para adultos y base para talleres
            terapéuticos. La arteterapia y el coloreado ayudan a relajarse, disminuir el estrés
            y a aumentar la concentración gracias a los lápices de colores.
          </p>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-4"><span class="font-weight-bold text-uppercase">No. de Paginas:  </span> 112</div>
        <div class="col-6 col-md-4 col-lg-3 mb-4"><span class="font-weight-bold text-uppercase">Editorial:  </span> EDAF</div>
        <div class="col-6 col-md-4 col-lg-3 mb-4"><span class="font-weight-bold text-uppercase">Lengua:  </span> Castellano</div>
        <div class="col-6 col-md-4 col-lg-3 mb-4"><span class="font-weight-bold text-uppercase">ISBN:  </span> 9788441436008</div>
        <div class="col-6 col-md-4 col-lg-3 mb-4"><span class="font-weight-bold text-uppercase">Autor:  </span> Lisa Magano</div>
        <div class="col-6 col-md-4 col-lg-3 mb-4"><span class="font-weight-bold text-uppercase">Fecha de publicación:  </span> 2016</div>
        <div class="col-6 col-md-4 col-lg-3 mb-4"><span class="font-weight-bold text-uppercase">Encuadernación:  </span> Tapa blanda</div>
        <div class="col-6 col-md-4 col-lg-3 mb-4"><span class="font-weight-bold text-uppercase">País Origen:  </span> Francia</div>
      </div>
      <div class="row">
        <div class="col-12">
          <h3 class="text-uppercase">Comentarios</h3>
        </div>
      </div>
      <!--Tu comentario -->
      <div class="row mt-4">
        <div class="col-1 col-md-2 offset-md-1 text-right pt-2 pb-2">
          <img class="profile-img-main" src="../../resources/img/profile.jpeg" alt="foto de perfil">
        </div>
        <div class="col-8 offset-2 offset-md-0 col-md-6 my-auto">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-lg"><i class="far fa-comment-dots"></i></span>
            </div>
            <textarea class="form-control" aria-label="With textarea" placeholder="Escribe tu comentario..."></textarea>
          </div>
        </div>
        <div class="col-12 col-md-2 my-auto text-center">
          <button type="button" class="btn btn-success btn-lg btn-block">Enviar</button>
        </div>
      </div><!-- Fin Tu comentario -->


      <div class="row">
        <div class="col-12">
          <h1 class="uppercase text-center">Otros comentarios</h1>
        </div>
        <!--Comentario  -->
        <div class="row mt-2 ml-auto mr-auto mb-4 p-3" style="border: 1px solid #5e72e4; width:85%;">

          <div class="col-2 col-md-2 offset-md-1 text-right pt-4 pb-2">
            <img class="profile-img" src="../../resources/img/profile2.jpeg" alt="foto de perfil" >
          </div>
          <div class="col-8  offset-2 offset-md-1 offset-lg-0 my-auto mt-4">
            <div class="card mt-2">
              <div class="card-body">
                This is some text within a card body.
              </div>
            </div>
          </div>

          <!--Comentario  -->
          <div class="col-2 col-md-2 offset-md-1 text-right pt-4 pb-2">
            <img class="profile-img" src="../../resources/img/profile3.jpg" alt="foto de perfil" >
          </div>
          <div class="col-8  offset-2 offset-md-1 offset-lg-0 my-auto">
            <div class="card mt-2">
              <div class="card-body">
                This is some text within a card body.
              </div>
            </div>
          </div>

          <!--Comentario  -->
          <div class="col-2 col-md-2 offset-md-1 text-right pt-4 pb-2">
            <img class="profile-img" src="../../resources/img/profile4.jpg" alt="foto de perfil" >
          </div>
          <div class="col-8  offset-2 offset-md-1 offset-lg-0 my-auto">
            <div class="card mt-2">
              <div class="card-body">
                This is some text within a card body.
              </div>
            </div>
          </div>

          <!--Comentario  -->
          <div class="col-2 col-md-2 offset-md-1 text-right pt-4 pb-2">
            <img class="profile-img" src="../../resources/img/profile5.png" alt="foto de perfil" >
          </div>
          <div class="col-8  offset-2 offset-md-1 offset-lg-0 my-auto">
            <div class="card mt-2">
              <div class="card-body">
                This is some text within a card body.
              </div>
            </div>
          </div>

          <!--Comentario  -->
          <div class="col-2 col-md-2 offset-md-1 text-right pt-4 pb-2">
            <img class="profile-img" src="../../resources/img/profile6.jpg" alt="foto de perfil" >
          </div>
          <div class="col-8  offset-2 offset-md-1 offset-lg-0 my-auto">
            <div class="card mt-2">
              <div class="card-body">
                This is some text within a card body.
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>
  
  <?php
    echo model_page::footer();
   ?>
