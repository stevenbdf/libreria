<?php
  require_once '../../core/helpers/model_page.php';
  echo model_page::header();
 ?>

  <main id="mission-vision">
    <div class="container mt-4 mb-4 pt-4 pb-4">
      <div class="row">
        <div class="col-12 mt-4 mb-2">
          <h2 class="text-center">Misión y Visión</h2>
        </div>
        <div class="col-10 col-md-6 offset-1 offset-md-0 mb-2">
          <div class="cardvis">
            <div class="col-10 offset-1">
              <img src="../../resources/img/mision.vision/mision.jpg" class="card-img-top" alt="...">
            </div>

            <div class="card-body"> <!-- división de la misión -->
              <h3 class="text-center">Misión</h3>
              <p class="card-text">Contribuir a la difusión de la cultura y entretenimiento, creando espacios propicios para el encuentro con el conocimiento. Atendiendo el compromiso moral con nuestro entorno, nuestros colaboradores y accionistas.</p>
            </div>
          </div>
        </div>
        <div class="col-10 col-md-6 offset-1 offset-md-0">
          <div class="cardvis">
            <div class="col-10 offset-1">
              <img src="../../resources/img/mision.vision/vision.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body"><!-- división de la visión -->
              <h3 class="text-center">Visión</h3>
              <p class="card-text">Contribuir a la difusión de la cultura y entretenimiento, creando espacios propicios para el encuentro con el conocimiento. Atendiendo el compromiso moral con nuestro entorno, nuestros colaboradores y
                accionistas.Consolidar el liderazgo de la marca, accediendo a nuevos mercados y enriqueciendo nuestra oferta cultural hacia el año 2020.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php
    echo model_page::footer();
   ?>
