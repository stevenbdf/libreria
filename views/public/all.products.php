<!--Se manda a llamar todo el encabezado con el menú -->
<?php
  require_once '../../core/helpers/model_page.php';
  echo model_page::header();
 ?>
<!-- Contenido principal, aquí se encuentran cada una de las diviciones para presentar cada producto según la categoría-->
  <main id="all-products">
    <div class="container mt-4 mb-4 pb-4">    <!-- Div principal en donde están cada una de las tarjetas. -->
      <h1 class="text-center pt-3">Comics</h1>
      <div class="card-columns">

          <!-- Cada una de las tarjetas con la información del producto-->
        <div class="card pb-md-4 pb-lg-0 card-lift--hover shadow border-0">
          <img src="../../resources/img/books/vengadores-acuatico.jpg" class="card-img-top card-img-book" alt="...">
          <div class="card-body">
            <h5 class="card-title">Los vengadores No.5</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <a href="product.php" class="btn btn-success float-left float-lg-none">Ver más</a> <a href="#" class="btn btn-primary float-right float-lg-none"><i class="fas fa-shopping-cart"></i></a>
          </div>
        </div>
        <!--finaliza la tarjeta -->
        <div class="card pb-md-4 pb-lg-0 card-lift--hover shadow border-0">
          <img src="../../resources/img/books/campeones.jpg" class="card-img-top card-img-book" alt="...">
          <div class="card-body">
            <h5 class="card-title">CAMPEONES Nº25</h5>
            <p class="card-text">Celebra nuestras 25 entregas con el comienzo de una nueva aventura. Nuestros
               héroes viajan a Reino Salvaje, un lugar donde los sueños se hacen realidad, y también las
               pesadillas...</p>
               <a href="product.php" class="btn btn-success float-left float-lg-none">Ver más</a> <a href="#" class="btn btn-primary float-right float-lg-none"><i class="fas fa-shopping-cart"></i></a>
          </div>
        </div>

        <div class="card pb-md-4 pb-lg-0 card-lift--hover shadow border-0">
          <img src="../../resources/img/books/guerra-infinito.jpg" class="card-img-top card-img-book" alt="...">
          <div class="card-body">
            <h5 class="card-title">GUERRAS DEL INFINITO Nº4 [GRAPA]</h5>
            <p class="card-text">Ha vencido. Réquiem, la Mujer Más Peligrosa de la Galaxia, ha salido victoriosa,
              mientras la realidad al completo se ha visto alterada de las más extrañas maneras. Ahora, sólo queda
               una esperanza. ¿Estarán dispuestos los héroes a aceptarla?</p>
               <a href="product.php" class="btn btn-success float-left float-lg-none">Ver más</a> <a href="#" class="btn btn-primary float-right float-lg-none"><i class="fas fa-shopping-cart"></i></a>
          </div>
        </div>

        <div class="card pb-md-4 pb-lg-0 card-lift--hover shadow border-0">
          <img src="../../resources/img/books/spiderman.jpg" class="card-img-top card-img-book" alt="...">
          <div class="card-body">
            <h5 class="card-title">PETER PARKER: EL ESPECTACULAR SPIDERMAN Nº149
              / Nº8-310 USA (MARVEL LEGACY) [RUSTICA]</h5>
            <p class="card-text">Después de viajar a través del espacio y del tiempo...</p>
               <a href="product.php" class="btn btn-success float-left float-lg-none">Ver más</a> <a href="#" class="btn btn-primary float-right float-lg-none"><i class="fas fa-shopping-cart"></i></a>
          </div>
        </div>

        <div class="card pb-md-4 pb-lg-0 card-lift--hover shadow border-0">
          <img src="../../resources/img/books/thor.jpg" class="card-img-top card-img-book" alt="...">
          <div class="card-body">
            <h5 class="card-title">THOR Nº05 / Nº93</h5>
            <p class="card-text">Si te pareció que El Viejo Fénix estaba loco, espera a que veas lo que hemos hecho
              con el Doctor Muerte. En el fin de los tiempos, Muerte es más poderoso que cualquier otra cosa
               que haya sobrevivido. ¿Qué pueden hacer el Rey Thor y El Viejo Logan contra él?</p>
            <a href="product.php" class="btn btn-success float-left float-lg-none">Ver más</a> <a href="#" class="btn btn-primary float-right float-lg-none"><i class="fas fa-shopping-cart"></i></a>
          </div>
        </div>

        <div class="card pb-md-4 pb-lg-0 card-lift--hover shadow border-0">
          <img src="../../resources/img/books/vengadores-acuatico.jpg" class="card-img-top card-img-book" alt="...">
          <div class="card-body">
            <h5 class="card-title">Los vengadores No.5</h5>
            <p class="card-text">N/A</p>
            <a href="product.php" class="btn btn-success float-left float-lg-none">Ver más</a> <a href="#" class="btn btn-primary float-right float-lg-none"><i class="fas fa-shopping-cart"></i></a>
          </div>
        </div>

        <div class="card pb-md-4 pb-lg-0 card-lift--hover shadow border-0">
          <img src="../../resources/img/books/spiderman.jpg" class="card-img-top card-img-book" alt="...">
          <div class="card-body">
            <h5 class="card-title">PETER PARKER: EL ESPECTACULAR SPIDERMAN Nº149
              / Nº8-310 USA (MARVEL LEGACY) [RUSTICA]</h5>
            <p class="card-text">Después de viajar a través del espacio y del tiempo, sólo hay una cosa que le queda
               a Spidey por hacer: ¡evitar que los Vedomi, un colectivo de inteligencias artificiales, destruyan el
               mundo! ¿Podrá hacerlo? ¿Y cuál será el precio a pagar?</p>
               <a href="product.php" class="btn btn-success float-left float-lg-none">Ver más</a> <a href="#" class="btn btn-primary float-right float-lg-none"><i class="fas fa-shopping-cart"></i></a>
          </div>
        </div>



        <div class="card pb-md-4 pb-lg-0 card-lift--hover shadow border-0">
          <img src="../../resources/img/books/guerra-infinito.jpg" class="card-img-top card-img-book" alt="...">
          <div class="card-body">
            <h5 class="card-title">GUERRAS DEL INFINITO Nº4 [GRAPA]</h5>
            <p class="card-text">Ha vencido. Réquiem, la Mujer Más Peligrosa de la Galaxia, ha salido victoriosa,
              mientras la realidad al completo se ha visto alterada de las más extrañas maneras. Ahora, sólo queda
               una esperanza. ¿Estarán dispuestos los héroes a aceptarla?</p>
               <a href="product.php" class="btn btn-success float-left float-lg-none">Ver más</a> <a href="#" class="btn btn-primary float-right float-lg-none"><i class="fas fa-shopping-cart"></i></a>
          </div>
        </div>

        <div class="card pb-md-4 pb-lg-0 card-lift--hover shadow border-0">
          <img src="../../resources/img/books/spiderman.jpg" class="card-img-top card-img-book" alt="...">
          <div class="card-body">
            <h5 class="card-title">PETER PARKER: EL ESPECTACULAR SPIDERMAN Nº149
              / Nº8-310 USA (MARVEL LEGACY) [RUSTICA]</h5>
            <p class="card-text">Después de viajar a través del espacio y del tiempo...</p>
               <a href="product.php" class="btn btn-success float-left float-lg-none">Ver más</a> <a href="#" class="btn btn-primary float-right float-lg-none"><i class="fas fa-shopping-cart"></i></a>
          </div>
        </div>

      </div>
    </div>
  </main>
<!--Se manda a llamar todo el código html del footer-->
  <?php
    echo model_page::footer();
   ?>
