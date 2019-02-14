<?php
  require_once '../../core/helpers/model_page.php';
  echo model_page::header();
 ?>

  <main id="noticias">
    <div class="container mt-4 mb-4">
      <div class="row">
        <div class="col-12">
          <h1 class="text-center pt-3 in-container display-1">Noticias</h1>
        </div>
      </div>

      <!-- Noticia 1-->
      <div class="row mt-4 pb-4">
        <div class="col-12 col-md-10 offset-0 offset-md-1">
          <h3>Bruna Husky: La detective replicante de Rosa Montero
            que nos trasporta a un mundo dominado por la tecnología.</h3>
          <p>Por: Fabiola Martinez - 03 de Febrero 2019 - El Salvador</p>
        </div>
        <div class="col-12 col-md-10 offset-0 offset-md-1">
          <div class="col-12 col-md-6 float-left">
            <img src="../../resources/img/news/news1.jpg" class="img-fluid" alt="Noticia 1">
          </div>
          <p class="text-justify ml-md-3">Bruna Husky es una detective de ficción, diferente a cualquier otra, empezando porque no
            es de naturaleza humana, pero sobre todo, es el vehículo que utiliza Rosa Montero para cuestionar
            temas de un futuro próximo que empiezan a
            preocupar en el presente, desde la sobrepoblación, a la implantación
            de tecnología en el cuerpo humano, pasando por el extinción de los recursos del planeta.
            La visión social detrás de la ficción es el principal atractivo de esta saga de misterio
            futurista, con casos bien planteados y un mundo de ciber realidad que aterra por la similitud
            con lo que todos podemos imaginar que el futuro deparará a la humanidad.
          </p>
          <h4 class="text-justify ml-md-3 pt-md-3">¿Quién es Bruna Husky?</h4>
          <p class="text-justify ml-md-3">
            Bruna Husky es una detective replicante que vive en Madrid, en el año 2110.
            Originariamente creada como replicante de combate consigue su libertad después de dos años trabajando
            para la empresa que la crea. Bruna vive atormentada porque sabe el día que va a morir, como todos los
            de su especie. Su vida dura 10 años, después mueren de TTT, un cáncer total que irremediablemente
            termina con la vida de los que son como ella.
            Mejorada en fuerza y empatía, Bruna es muy alta para las medidas humanas, lleva la cabeza rapada
            y un tatuaje diagonal que le cruza el cuerpo. Vive en una sociedad complicada, convulsa y muy revuelta
            y, a pesar de su alta capacidad empática, es desconfiada, intuitiva y carga con la amargura que proporciona
            la soledad, porque Bruna no se siente capaz de integrarse ni con los humanos ni con los robots.
            Los humanos viven como si pensaran que son eternos a pesar de su debilidad. Ella es mucho más fuerte
            que ningún humano, pero no puede ignorar que sabe cuando va a morir.
          </p>
        </div>


        <div class="col-12">
          <h3 class="text-uppercase">Comentarios</h3>
        </div>

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
        </div><!-- Fin Tu comentario -->

        <div class="col-12">
          <h1 class="uppercase text-center">Otros comentarios</h1>
        </div>
        <!--Comentario  -->
        <div class="row mt-2 ml-auto mr-auto mb-4 p-3" style="border: 1px solid #5e72e4; width:85%;">

          <div class="col-2 col-md-2 offset-md-1 text-right pt-4 pb-2">
            <img class="profile-img" src="../../resources/img/profile2.jpeg" alt="foto de perfil">
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
            <img class="profile-img" src="../../resources/img/profile3.jpg" alt="foto de perfil">
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
            <img class="profile-img" src="../../resources/img/profile4.jpg" alt="foto de perfil">
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
            <img class="profile-img" src="../../resources/img/profile5.png" alt="foto de perfil">
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
            <img class="profile-img" src="../../resources/img/profile6.jpg" alt="foto de perfil">
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

      <!-- Noticia 2-->
      <div class="row mt-4 pb-4">
        <div class="col-12 col-md-10 offset-0 offset-md-1">
          <h3>¿Sabíais de la existencia de una biblioteca de magia?</h3>
          <p>Por: Steven Diaz - 24 de Enero 2019 - El Salvador</p>
        </div>
        <div class="col-12 col-md-10 offset-0 offset-md-1">
          <div class="col-12 col-md-6 float-left">
            <img src="../../resources/img/news/news2.jpg" class="img-fluid" alt="Noticia 1">
          </div>
          <p class="text-justify ml-md-3">La magia siempre ha sido un tema recurrente sobre todo para los libros de fantasía
            y ficción, y en el tema cinematográfico, si es un ámbito mucho más tocado y actual. Pero, ¿sabíais de la
            existencia de una biblioteca de magia? Yo no…. Al menos hasta hace unos días.La biblioteca de magia de la
            que os hablamos se encuentra en Manhattan y contiene libros bastante raros. Otro dato curioso y que llama
            mucho al atención, es que sólo se puede acceder a ella mediante cita previa… Si queréis saber más sobre
            qué trata y qué libros podemos encontrar en ella, sigue leyendo un poco más abajo.
          </p>
          <h4 class="text-justify ml-md-3 pt-md-3">Creas o no en la magia…</h4>
          <p class="text-justify ml-md-3">
            Debes conocer la existencia de esta biblioteca. Sabemos que Iker Jiménez y sus colaboradores televisivos disfrutarían
            como niños con zapatos nuevos por los pasillos de esta biblioteca pero, ¿quién no ha tenido curiosidad o le ha
            llamado la atención ocasionalmente algo relacionado con al magia? Con sólo ver el secretismo y el ocultismo con
            que es tratado el tema ya da bastante que pensar…Oficialmente, esta biblioteca se hace llamar Biblioteca de
            Investigación de las Artes de la Conjuración, y en su interior podemos encontrar los libros más importantes
            sobre el tema magia en general. Está situada en el barrio de Manhattan, concretamente en un ático y para acceder
            a ella hace falta que pidas cita previamente y digas a qué se debe tu interés por este tipo de libros. Su fundador
            es Bill Kalush, que asegura que en el interior de muchos de estos libros pueden encontrarse conocimientos únicos
            o conocidos por muy pocas personas en el mundo.
          </p>
        </div>

        <div class="col-12">
          <h3 class="text-uppercase">Comentarios</h3>
        </div>

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
        </div><!-- Fin Tu comentario -->

        <div class="col-12">
          <h1 class="uppercase text-center">Otros comentarios</h1>
        </div>
        <!--Comentario  -->
        <div class="row mt-2 ml-auto mr-auto mb-4 p-3" style="border: 1px solid #5e72e4; width:85%;">

          <div class="col-2 col-md-2 offset-md-1 text-right pt-4 pb-2">
            <img class="profile-img" src="../../resources/img/profile2.jpeg" alt="foto de perfil">
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
            <img class="profile-img" src="../../resources/img/profile3.jpg" alt="foto de perfil">
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
            <img class="profile-img" src="../../resources/img/profile4.jpg" alt="foto de perfil">
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
            <img class="profile-img" src="../../resources/img/profile5.png" alt="foto de perfil">
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
            <img class="profile-img" src="../../resources/img/profile6.jpg" alt="foto de perfil">
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