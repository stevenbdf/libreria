<!--Se manda a llamar todo el encabezado con el menú -->
<?php
  require_once '../../core/helpers/modelPage.php';
  echo modelPage::header();
 ?>

  <main id="categorias">
    <div class="container mt-4 mb-4 pb-4">
      <h1 class="text-center pt-3 in-container display-1">CATEGORIAS</h1>
      <div id="categoria-container" class="row"></div>
    </div>
  </main>
<!--Se manda a llamar todo el pie de página -->
  <?php
    echo modelPage::footer('categorias');
   ?>
