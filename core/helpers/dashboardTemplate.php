<?php
class Dashboard
{
	public static function headerTemplate($title)
	{
		session_start();

		ini_set('date.timezone', 'America/El_Salvador');

		if (isset($_SESSION['idEmpleado'])) {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename == 'index.php') {
				header('location: main.php');
			} else if ($filename == 'main.php') {
				print('<!DOCTYPE html>
						<html lang="es">						
						<head>
							<!-- Required meta tags -->
							<meta charset="utf-8">
							<meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
							<title>Dashboard - ' . $title . '</title>
							<!-- CSS -->
							<!-- Add Material font (Roboto) and Material icon as needed -->
							<link href="../../resources/fonts/Googlefonts.css" rel="stylesheet">
							<link href="../../libraries/material-icons.css" rel="stylesheet">
							<!-- Add Material CSS, replace Bootstrap CSS -->
							<link href="../../resources/css/sweetalert2.min.css" rel="stylesheet">
							<link rel="stylesheet" href="../../resources/css/material/material.min.css">
							<link rel="stylesheet" href="../../resources/css/material/dataTables.material.min.css">
						
							<!-- Maquilishuat -->
          					<link rel="icon" type="image/png" href="../../resources/img/fav-ico.PNG" />
							<link href="../../resources/css/material/material.css" rel="stylesheet">
						
							<link rel="stylesheet" href="../../resources/css/dashboardIndex/style.css">
						
						</head>
						<body>
						<header class="navbar navbar-dark navbar-full doc-navbar-default sticky-top" style="background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 33%, #ee609c 66%, #ee609c 100%); !important;">
							<button aria-controls="navdrawerDefault" aria-expanded="false" aria-label="Toggle Navdrawer"
								class="navbar-toggler" data-target="#navdrawerDefault" data-toggle="navdrawer"><span
									class="navbar-toggler-icon"></span></button>
							<span class="navbar-brand mr-auto">Libreria Maquilishuat</span>
						</header>
						<div aria-hidden="true" class="navdrawer" id="navdrawerDefault" tabindex="-1">
							<div class="navdrawer-content">
								<div class="navdrawer-header">
									<a class="navbar-brand px-0" href="./main.php">Dashboard</a>
								</div>
								<nav class="navdrawer-nav">
								<p class="nav-link active"><i class="material-icons mr-3" style="font-size: 30px;">account_circle</i>' . $_SESSION['correoUsuario'] . '</p>
								<p class="nav-link" data-target="#navdrawerDefault" data-toggle="navdrawer"><a  data-toggle="modal" data-target="#cambiarContrasenaModal" ><i class="material-icons mr-3" style="font-size: 30px;">settings</i>Cambiar contraseña</a></p>
								<p class="nav-link" onclick="signOff()"><i class="material-icons mr-3" style="font-size: 30px;">power_settings_new</i>Cerrar sesión</p>
								</nav>
							</div>
						</div>
						<!-- Ventana para cambiar contraseña  -->
						<div class="modal fade" id="cambiarContrasenaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="POST" id="form-update-contrasena">
											<div class="form-group">
												<div class="row">
													<div class="col-6">
														<label for="recipient-name" class="col-form-label">Antigua contraseña:</label>
														<input type="password" name="old-password" class="form-control form-control-alternative">
													</div>
													<div class="col-6">
														<label for="recipient-name" class="col-form-label">Repita antigua contraseña:</label>
														<input type="password" name="old-password-2" class="form-control form-control-alternative">
													</div>
													<div class="col-6">
														<label for="recipient-name" class="col-form-label">Nueva contraseña:</label>
														<input type="password" name="new-password" class="form-control form-control-alternative">
													</div>
													<div class="col-6">
														<label for="recipient-name" class="col-form-label">Repita nueva contraseña:</label>
														<input type="password" name="new-password-2" class="form-control form-control-alternative">
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-success">Guardar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<main>
						
				');
			} else if ($filename == 'noticias.php') {
				print('
				<!DOCTYPE html>
				<html lang="es">		
				<head>
					<!-- Required meta tags -->
					<meta charset="utf-8">
					<meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
					<title>Dashboard - ' . $title . '</title>
					<!-- CSS -->
					<!-- Add Material font (Roboto) and Material icon as needed -->
					<link href="../../resources/fonts/Googlefonts.css" rel="stylesheet">
					<link href="../../libraries/material-icons.css" rel="stylesheet">
					<!-- Add Material CSS, replace Bootstrap CSS -->
					<link href="../../resources/css/sweetalert2.min.css" rel="stylesheet">
					<link rel="stylesheet" href="../../resources/css/material/material.min.css">
					<link rel="stylesheet" href="../../resources/css/material/dataTables.material.min.css">
				
					<!-- Froala text editor -->
					<link rel="stylesheet" href="../../resources/css/all.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/froala_editor.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/froala_style.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/code_view.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/image_manager.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/image.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/table.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/video.css">
					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
					<!-- Maquilishuat -->
         			<link rel="icon" type="image/png" href="../../resources/img/fav-ico.PNG" />
					<link href="../../resources/css/material/material.css" rel="stylesheet">
				
					<link rel="stylesheet" href="../../resources/css/dashboardBasic/style.css">
				
				</head>
				<body>
				<header class="navbar navbar-dark navbar-full doc-navbar-default sticky-top" style="background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 33%, #ee609c 66%, #ee609c 100%); !important;">
					<button aria-controls="navdrawerDefault" aria-expanded="false" aria-label="Toggle Navdrawer"
						class="navbar-toggler" data-target="#navdrawerDefault" data-toggle="navdrawer"><span
							class="navbar-toggler-icon"></span></button>
					<span class="navbar-brand mr-auto">Libreria Maquilishuat</span>
				</header>
				<div aria-hidden="true" class="navdrawer" id="navdrawerDefault" tabindex="-1">
					<div class="navdrawer-content">
						<div class="navdrawer-header">
							<a class="navbar-brand px-0" href="./main.php">Dashboard</a>
						</div>
						<nav class="navdrawer-nav">
						<p class="nav-link active"><i class="material-icons mr-3" style="font-size: 30px;">account_circle</i>' . $_SESSION['correoUsuario'] . '</p>
						<p class="nav-link" data-target="#navdrawerDefault" data-toggle="navdrawer"><a  data-toggle="modal" data-target="#cambiarContrasenaModal" ><i class="material-icons mr-3" style="font-size: 30px;">settings</i>Cambiar contraseña</a></p>
						<p class="nav-link" onclick="signOff()"><i class="material-icons mr-3" style="font-size: 30px;">power_settings_new</i>Cerrar sesión</p>
						</nav>
						<div class="navdrawer-divider"></div>
						<p class="navdrawer-subheader">Mantenimientos</p>
						<ul class="navdrawer-nav">
							<li class="nav-item">
								<a class="nav-link" href="./productos.php"><i class="material-icons mr-3">book</i> Productos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./noticias.php"><i class="material-icons mr-3">library_books</i> Noticias</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./categorias.php"><i class="material-icons mr-3">category</i> Categorias</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./empleados.php"><i class="material-icons mr-3">people</i> Empleados</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./clientes.php"><i class="material-icons mr-3">people_outline</i> Clientes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./pedidos.php"><i class="material-icons mr-3">shopping_cart</i> Pedidos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./comentariosLibros.php"><i class="material-icons mr-3">comment</i> Comentarios de libros</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./comentariosNoticias.php"><i class="material-icons mr-3">comment</i> Comentarios de noticias</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./autores.php"><i class="material-icons mr-3">local_library</i> Autores</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./editoriales.php"><i class="material-icons mr-3">local_library</i> Editoriales</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./bitacora.php"><i class="material-icons mr-3">format_list_bulleted</i> Bitacora</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./graficas.php"><i class="material-icons mr-3">timeline</i> Gráficas</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- Ventana para cambiar contraseña  -->
				<div class="modal fade" id="cambiarContrasenaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST" id="form-update-contrasena">
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<label for="recipient-name" class="col-form-label">Antigua contraseña:</label>
												<input type="password" name="old-password" class="form-control form-control-alternative">
											</div>
											<div class="col-6">
												<label for="recipient-name" class="col-form-label">Repita antigua contraseña:</label>
												<input type="password" name="old-password-2" class="form-control form-control-alternative">
											</div>
											<div class="col-6">
												<label for="recipient-name" class="col-form-label mb-4">Nueva contraseña:</label>
												<input type="password" name="new-password" class="form-control form-control-alternative">
											</div>
											<div class="col-6">
												<label for="recipient-name" class="col-form-label">Repita nueva contraseña:</label>
												<input type="password" name="new-password-2" class="form-control form-control-alternative">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn btn-success">Guardar</button>
									</div>
								</form>
							</div>
				
						</div>
					</div>
				</div>
				<main>
				');
			} else {
				print('
				<!DOCTYPE html>
				<html lang="es">			
				<head>
					<!-- Required meta tags -->
					<meta charset="utf-8">
					<meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
					<title>Dashboard - ' . $title . '</title>
					<!-- CSS -->
					<!-- Add Material font (Roboto) and Material icon as needed -->
					<link href="../../resources/fonts/Googlefonts.css" rel="stylesheet">
					<link href="../../libraries/material-icons.css" rel="stylesheet">
					<!-- Add Material CSS, replace Bootstrap CSS -->
					<link href="../../resources/css/sweetalert2.min.css" rel="stylesheet">
					<link rel="stylesheet" href="../../resources/css/material/material.min.css">
					<link rel="stylesheet" href="../../resources/css/material/dataTables.material.min.css">
					<!-- Maquilishuat -->
					<link rel="icon" type="image/png" href="../../resources/img/fav-ico.PNG" />
					<link href="../../resources/css/material/material.css" rel="stylesheet">
				
					<link rel="stylesheet" href="../../resources/css/dashboardBasic/style.css">
				
				</head>
				<body>
				<header class="navbar navbar-dark navbar-full doc-navbar-default sticky-top" style="background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 33%, #ee609c 66%, #ee609c 100%); !important;">
							<button aria-controls="navdrawerDefault" aria-expanded="false" aria-label="Toggle Navdrawer"
								class="navbar-toggler" data-target="#navdrawerDefault" data-toggle="navdrawer"><span
									class="navbar-toggler-icon"></span></button>
							<span class="navbar-brand mr-auto">Libreria Maquilishuat</span>
				</header>
				<div aria-hidden="true" class="navdrawer" id="navdrawerDefault" tabindex="-1">
					<div class="navdrawer-content">
						<div class="navdrawer-header">
							<a class="navbar-brand px-0" href="./main.php">Dashboard</a>
						</div>
						<nav class="navdrawer-nav">
						<p class="nav-link active"><i class="material-icons mr-3" style="font-size: 30px;">account_circle</i>' . $_SESSION['correoUsuario'] . '</p>
						<p class="nav-link" data-target="#navdrawerDefault" data-toggle="navdrawer"><a  data-toggle="modal" data-target="#cambiarContrasenaModal" ><i class="material-icons mr-3" style="font-size: 30px;">settings</i>Cambiar contraseña</a></p>
						<p class="nav-link" onclick="signOff()"><i class="material-icons mr-3" style="font-size: 30px;">power_settings_new</i>Cerrar sesión</p>
						</nav>
						<div class="navdrawer-divider"></div>
						<p class="navdrawer-subheader">Mantenimientos</p>
						<ul class="navdrawer-nav">
							<li class="nav-item">
								<a class="nav-link" href="./productos.php"><i class="material-icons mr-3">book</i> Productos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./noticias.php"><i class="material-icons mr-3">library_books</i> Noticias</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./categorias.php"><i class="material-icons mr-3">category</i> Categorias</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./empleados.php"><i class="material-icons mr-3">people</i> Empleados</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./clientes.php"><i class="material-icons mr-3">people_outline</i> Clientes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./pedidos.php"><i class="material-icons mr-3">shopping_cart</i> Pedidos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./comentariosLibros.php"><i class="material-icons mr-3">comment</i> Comentarios de libros</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./comentariosNoticias.php"><i class="material-icons mr-3">comment</i> Comentarios de noticias</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./autores.php"><i class="material-icons mr-3">local_library</i> Autores</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./editoriales.php"><i class="material-icons mr-3">local_library</i> Editoriales</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./bitacora.php"><i class="material-icons mr-3">format_list_bulleted</i> Bitacora</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./graficas.php"><i class="material-icons mr-3">timeline</i> Gráficas</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- Ventana para cambiar contraseña  -->
				<div class="modal fade" id="cambiarContrasenaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST" id="form-update-contrasena">
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<label for="recipient-name" class="col-form-label">Antigua contraseña:</label>
												<input type="password" name="old-password" class="form-control form-control-alternative">
											</div>
											<div class="col-6">
												<label for="recipient-name" class="col-form-label">Repita antigua contraseña:</label>
												<input type="password" name="old-password-2" class="form-control form-control-alternative">
											</div>
											<div class="col-6">
												<label for="recipient-name" class="col-form-label mb-4">Nueva contraseña:</label>
												<input type="password" name="new-password" class="form-control form-control-alternative">
											</div>
											<div class="col-6">
												<label for="recipient-name" class="col-form-label">Repita nueva contraseña:</label>
												<input type="password" name="new-password-2" class="form-control form-control-alternative">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn btn-success">Guardar</button>
									</div>
								</form>
							</div>
				
						</div>
					</div>
				</div>
				<main>
				');
			}
		} else {
			print('
			<!DOCTYPE html>
			<html lang="es">     
				<head>
					<!-- Required meta tags -->
					<meta charset="utf-8">
					<meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
					<title>Dashboard - ' . $title . '</title>
					<!-- CSS -->
					<!-- Add Material font (Roboto) and Material icon as needed -->
					<link href="../../resources/fonts/Googlefonts.css" rel="stylesheet">
					<link href="../../libraries/material-icons.css" rel="stylesheet">
					<!-- Add Material CSS, replace Bootstrap CSS -->
					<link href="../../resources/css/sweetalert2.min.css" rel="stylesheet">
					<link rel="stylesheet" href="../../resources/css/material/material.min.css">
					<!-- Maquilishuat -->
          			<link rel="icon" type="image/png" href="../../resources/img/fav-ico.PNG" />
					<link href="../../resources/css/material/material.css" rel="stylesheet">        
				
				</head>
				<body>
				<main>
			');
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'register.php' && $filename != 'recuperarContrasena.php') {
				header('location: index.php');
			}
		}
	}

	public static function footerTemplate($controller)
	{
		if ($controller == 'login' || $controller == 'recuperarContrasena') {
			print('
					</main>
					<!-- Optional JavaScript -->
					<!-- jQuery first, then Popper.js, then Bootstrap JS -->
					<script src="../../libraries/jquery-3.3.1.js"></script>
					<script src="../../libraries/popper.js"></script>
					<script src="../../libraries/bootstrap-dashboard.js"></script>

					<!-- Then Material JavaScript on top of Bootstrap JavaScript -->

					<!-- <script src="../../resources/js/material/material.js"></script> -->
					<script src="../../resources/js/material/material.js"></script>
					<script src="../../resources/js/material/jquery.dataTables.min.js"></script>
					<script src="../../resources/js/material/dataTables.material.min.js"></script>
					<script src="../../core/helpers/functions.js"></script>
					<script src="../../resources/js/sweetalert2.min.js"></script>

					<script src="../../core/controllers/dashboard/' . $controller . '.js"></script>
					</body>
			</html>
		');
		} else {
			print('
					</main>
					<footer style="
					background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 66%, #ee609c 80%, #ee609c 100%);
					" class="text-white">
						<div class="container">
							<div class="row">
								<div class="col-12 col-md-6 col-lg-6">
									<h5 class="text-white">Dashboard</h5>
									<a class="text-white" href="mailto:support@libreria-maquilishuat.com"><i class="material-icons left">email</i>Ayuda</a>
								</div>
								<div class="col-12 col-md-6 col-lg-6">
									<h5 class="text-white">Enlaces</h5>
									<a class="text-white" href="http://localhost/phpmyadmin/" target="_blank"><i class="material-icons left">cloud</i> phpMyAdmin</a>
								</div>
							</div>
							<div class="row mt-2">
								<div class="container">
									<span>© Libreria Maquilishuat, todos los derechos reservados.</span>
									<span class="text-white">Diseñado con <a class="	text-accent-1" href="http://daemonite.github.io/material/" target="_blank"><b class="text-white">Bootstrap - Daemonite`s Material UI</b></a></span>
								</div>
							</div>
						</div>
					</footer>
					<!-- Optional JavaScript -->
					<!-- jQuery first, then Popper.js, then Bootstrap JS -->
					<script src="../../libraries/jquery-3.3.1.js"></script>
					<script src="../../libraries/popper.js"></script>
					<script src="../../libraries/bootstrap-dashboard.js"></script>

					<!-- Then Material JavaScript on top of Bootstrap JavaScript -->

					<!-- <script src="../../resources/js/material/material.js"></script> -->
					<script src="../../resources/js/material/material.js"></script>
					<script src="../../core/helpers/closeSession.js"></script>
					<script src="../../resources/js/material/jquery.dataTables.min.js"></script>
					<script src="../../resources/js/material/dataTables.material.min.js"></script>
					<script src="../../core/helpers/functions.js"></script>
					<script src="../../resources/js/sweetalert2.min.js"></script>

					<script src="../../core/controllers/dashboard/' . $controller . '.js"></script>
					</body>
			</html>
		');
		}
	}
}
