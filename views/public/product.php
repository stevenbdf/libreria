<?php
require_once '../../core/helpers/model_page.php';
echo model_page::header();
?>

<main id="info-libro">
  <div class="container mt-4 mb-4">
    <div class="row">
      <div id="libro" class="col-md-12 col-lg-5 pt-3 pb-3 text-center"></div>
      <div class="col-md-12 col-lg-7 text-left pt-3">
        <h1 id="titulo-libro"></h1>
        <div class="row mt-4">
          <div id="likes" class="col-4 text-center"></div>
          <div id="dislikes" class="col-4 text-center"></div>
        </div>
        <div class="row mt-4">
          <div class="col-8">
            <div id="barra-aprobacion" class="progress" style="height:3px;"></div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12 precio text-left" id="precio"></div>
          <div class="col-6 col-md-4 text-left mt-2 mb-2">
            <button type="button" class="btn btn-success">Agregar al carrito <i class="fas fa-shopping-cart"></i></button>
          </div>
          <div class="col-12 text-left mt-2 mb-2" id="cantidad"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h3 class="text-uppercase">Acerca del libro</h3>
      </div>
      <div class="col-12" id="resena"></div>
      <div class="col-6 col-md-4 col-lg-3 mb-4" id="noPaginas"></div>
      <div class="col-6 col-md-4 col-lg-3 mb-4" id="editorial"></div>
      <div class="col-6 col-md-4 col-lg-3 mb-4" id="idioma"></div>
      <div class="col-6 col-md-4 col-lg-3 mb-4" id="autor"></div>
      <div class="col-6 col-md-4 col-lg-3 mb-4" id="encuadernacion"></div>
      <div class="col-6 col-md-4 col-lg-3 mb-4" id="pais"></div>
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
      <!--Comentarios container  -->
      <div id="comentarios-container" class="row mt-2 ml-auto mr-auto mb-4 p-3" style="border: 1px solid #5e72e4; width:85%;"></div>
    </div>
  </div>
</main>

<?php
echo model_page::footer('producto');
?>