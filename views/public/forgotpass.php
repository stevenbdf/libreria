<?php
  require_once '../../core/helpers/model_page.php';
  echo model_page::header();
 ?>
 <!--Divider password  -->
<div class=" col-12 col-md-6 offset-md-3 col-lg pb-2  col-xs-4">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-5 col-md-offset-3  col-sm-5 col-sm-offset-3 col-xs-6 col-xs-offset-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                    <div class="mb-4">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                    </div>
                  <div class="panel-body">

                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>

                      <input type="hidden" class="hide" name="token" id="token" value="">
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</div>


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../../resources/js/jquery-3.3.1.slim.js"></script>
  <script src="../../resources/js/popper.js"></script>
  <script src="../../resources/js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script defer src="../../resources/js/index.js"></script>
</body>

</html>

<?php
  echo model_page::footer();
 ?>
