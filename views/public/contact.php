<?php
  require_once '../../core/helpers/model_page.php';
  echo model_page::header();
 ?>

<div class="container contact-form">
  <div class="contact-image">
    <img src="../../resources/img/rocket_contact.png" alt="rocket_contact" />
  </div>
  <form method="post" role="form">
    <h3>Envianos un mensaje</h3>
    <div class="row">
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
           <button type="button" class="btn btn-primary btn-lg btn-block">Enviar</button>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <textarea name="txtMsg" class="form-control form-control-alternative" placeholder="Tu Mensaje *" style="width: 100%; height: 185px;"></textarea>
        </div>
      </div>
    </div>
  </form>
</div>
<?php
    echo model_page::footer();
   ?>
