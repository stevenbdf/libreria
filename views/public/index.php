<?php
  require_once '../../core/helpers/model_page.php';
  echo model_page::header();
 ?>

  <div class="container"> <!--En este div se encuentra en carrusel -->
    <div id="demo" class="carousel slide mb-4" data-ride="carousel">
      <ul class="carousel-indicators"> <!--En esta parte se designan cuantas partes tendrá el carrusel -->
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner"> <!--Se establecen las imágenes por cada parte y además la información que lleva cada parte. -->
        <div class="carousel-item active">
          <img src="../../resources/img/book.jpg" class="d-block w-100" alt="Categorias">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="titulo-home">Categorias</h5>
            <p class="p-carousel">Busca tu libro favorito</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../../resources/img/librosss.jpg" class="d-block w-100" alt="noticias">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="titulo-home">Noticias</h5>
            <p class="p-carousel">La mejor información acerca de tus autores favoritos.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../../resources/img/banner.jpg" class="d-block w-100" alt="perfil">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="titulo-home">Mi perfil</h5>
            <p class="p-carousel ">¿Cansad@ de adquirir libros desde una tienda física? ¡Crea tu perfil y podrás comprar desde la comodidad de tu hogar!</p>
          </div>
        </div>
      </div>
      <!--Se establecen y se les asigna la acción a los botones para que el carrusel funcione adecuadamente-->
      <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

<!--Empiezan cada una de las diviciones para presentar las categorías rápidamente -->
  <div class="container mt-4 mb-4 pb-4">
    <h1 class="text-center pt-3">CATEGORIAS</h1>
    <div id="categoria-container" class="row"></div>
  </div>
  <!--Aquí está el vídeo y las rejillas en cada tamaño siempre será de 12 -->
  <div class="container">
    <div class="row">
      <div class="col-12 ">
        <div class="embed-responsive embed-responsive-16by9 mb-4">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/t0aez1AVeqs" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

  <?php
    echo model_page::footer('index');
   ?>
