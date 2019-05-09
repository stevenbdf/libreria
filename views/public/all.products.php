<!--Se manda a llamar todo el encabezado con el menú -->
<?php
require_once '../../core/helpers/modelPage.php';
echo modelPage::header();
?>
<!-- Contenido principal, aquí se encuentran cada una de las diviciones para presentar cada producto según la categoría-->
<main id="all-products"  style="min-height:100vh;">
  <!-- Div principal en donde están cada una de las tarjetas. -->
  <div class="container mt-4 mb-4 pb-4">
    <h1 id="titulo" class="text-center pt-3"></h1>
    <div id="productos-all-container" class="card-columns"></div>
  </div>
</main>
<!--Se manda a llamar todo el código html del footer-->
<?php
echo modelPage::footer('productos');
?>