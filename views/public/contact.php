<?php
  require_once '../../core/helpers/modelPage.php';
  echo modelPage::header();
 ?>
<!-- Parte principal, contiene toda la información y los divs que se van distribuyendo -->
<div class="container contact-form">
  <div class="contact-image"> <!--En este div se encuentra la imagen de cohete -->
    <img src="../../resources/img/rocket_contact.png" alt="rocket_contact" />
  </div>
  <form method="post" role="form">
    <h3>Envianos un mensaje</h3>
    <div class="row">
      <!--Aquí está todo el contenido del formulario -->
      <div class="col-md-6">
        <div class="form-group">
          <input type="text" class="form-control form-control-alternative" placeholder="Tu Nombre *" />
        </div>
        <div class="form-group">
          <input type="email" class="form-control form-control-alternative" placeholder="Tu Correo *"  />
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-alternative" placeholder="Tu # Celular *"/>
        </div>
        <div class="form-group">
           <button type="button" class="btn btn-primary btn-block">Enviar</button>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <textarea name="txtMsg" class="form-control form-control-alternative" placeholder="Tu Mensaje *" style="width: 100%; height: 185px;"></textarea>
        </div>
      </div>

    </div>
    <div class="col-md-12 mt-5">
      <h3>Nuestros datos</h3>
    </div>
    <div class="row">
      <div class="col-6 mt-2">
        <strong>Tel:</strong> +503 7781-4435
      </div>
      <div class="col-6 mt-2">
        <strong>Correo:</strong> libreria_maquilishuat@gmail.com
      </div>
      <div class="col-12 mt-2">
        <strong>Dirección:</strong> 5ta Calle Poniente, 2 Av. Principal Lincoln San Salvador, El Salvador
      </div>
    </div>
  </form>
</div>
<?php
    echo modelPage::footer();
   ?>
