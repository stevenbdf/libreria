<!--Se manda a llamar todo el encabezado con el menú -->
<?php
  require_once '../../core/helpers/model_page.php';
  echo model_page::header();
 ?>

  <main id="categorias">
    <div class="container mt-4 mb-4 pb-4">
      <h1 class="text-center pt-3 in-container display-1">CATEGORIAS</h1>
      <div class="row">
        <!--DIvisón de cada categoría, se divide en rejillas para los distintos tamaños en dispsitivos-->
        <div class="col-10 offset-1 offset-md-0 col-md-6 col-lg-4 mt-4">
          <div class="card card-lift--hover shadow border-0">
            <img src="../../resources/img/categories/comic.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h4 class="card-title">Comics</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the
                bulk of the
                card's content.</p>
              <a href="all.products.php" class="btn btn-success">Ver más</a>
            </div>
          </div>
        </div>
        <!--Fin de la primer categoría e inicio de la siguiente -->
        <div class="col-10 offset-1 offset-md-0 col-md-6 col-lg-4 mt-4">
          <div class="card card-lift--hover shadow border-0">
            <img src="../../resources/img/categories/fiction.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h4 class="card-title">Ficción</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the
                bulk of the
                card's content.</p>
              <a href="all.products.php" class="btn btn-success">Ver más</a>
            </div>
          </div>
        </div>
        <div class="col-10 offset-1 offset-md-0 col-md-6 col-lg-4 mt-4">
          <div class="card card-lift--hover shadow border-0">
            <img src="../../resources/img/categories/drama.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h4 class="card-title">Drama</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the
                bulk of the
                card's content.</p>
              <a href="all.products.php" class="btn btn-success">Ver más</a>
            </div>
          </div>
        </div>
        <div class="col-10 offset-1 offset-md-0 col-md-6 col-lg-4 mt-4">
          <div class="card card-lift--hover shadow border-0">
            <img src="../../resources/img/categories/comic.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h4 class="card-title">Comics</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the
                bulk of the
                card's content.</p>
              <a href="all.products.php" class="btn btn-success">Ver más</a>
            </div>
          </div>
        </div>
        <div class="col-10 offset-1 offset-md-0 col-md-6 col-lg-4 mt-4">
          <div class="card card-lift--hover shadow border-0">
            <img src="../../resources/img/categories/fiction.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h4 class="card-title">Ficción</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the
                bulk of the
                card's content.</p>
              <a href="all.products.php" class="btn btn-success">Ver más</a>
            </div>
          </div>
        </div>
        <div class="col-10 offset-1 offset-md-0 col-md-6 col-lg-4 mt-4">
          <div class="card card-lift--hover shadow border-0">
            <img src="../../resources/img/categories/drama.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h4 class="card-title">Drama</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the
                bulk of the
                card's content.</p>
              <a href="all.products.php" class="btn btn-success">Ver más</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
<!--Se manda a llamar todo el pie de página -->
  <?php
    echo model_page::footer();
   ?>
