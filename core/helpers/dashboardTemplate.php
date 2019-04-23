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
			}else if ($filename == 'main.php'){
				print ('<!DOCTYPE html>
						<html lang="es">						
						<head>
							<!-- Required meta tags -->
							<meta charset="utf-8">
							<meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
							<title>Dashboard - '.$title.'</title>
							<!-- CSS -->
							<!-- Add Material font (Roboto) and Material icon as needed -->
							<link
								href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700"
								rel="stylesheet">
							<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
							<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
							<!-- Add Material CSS, replace Bootstrap CSS -->
							<link href="../../resources/css/sweetalert2.min.css" rel="stylesheet">
							<link rel="stylesheet" href="../../resources/css/material/material.min.css">
							<link rel="stylesheet" href="../../resources/css/material/dataTables.material.min.css">
						
						
							<link href="../../resources/css/material/material.css" rel="stylesheet">
						
							<link rel="stylesheet" href="../../resources/css/dashboardIndex/style.css">
						
						</head>
						<body>
						<header class="navbar navbar-dark navbar-full bg-primary doc-navbar-default sticky-top">
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
								<p class="nav-link active"><i class="material-icons mr-3" style="font-size: 30px;">account_circle</i>'.$_SESSION['correoUsuario'].'</p>
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
						
				');
			} else if ($filename == 'noticias.php'){
				print('
				<!DOCTYPE html>
				<html lang="es">		
				<head>
					<!-- Required meta tags -->
					<meta charset="utf-8">
					<meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
					<title>Dashboard - '.$title.'</title>
					<!-- CSS -->
					<!-- Add Material font (Roboto) and Material icon as needed -->
					<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
					<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
					<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
					<!-- Add Material CSS, replace Bootstrap CSS -->
					<link href="../../resources/css/sweetalert2.min.css" rel="stylesheet">
					<link rel="stylesheet" href="../../resources/css/material/material.min.css">
					<link rel="stylesheet" href="../../resources/css/material/dataTables.material.min.css">
				
					<!-- Froala text editor -->
					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/froala_editor.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/froala_style.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/code_view.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/image_manager.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/image.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/table.css">
					<link rel="stylesheet" href="../../resources/css/froala-text-editor/plugins/video.css">
					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
				
					<link href="../../resources/css/material/material.css" rel="stylesheet">
				
					<link rel="stylesheet" href="../../resources/css/dashboardBasic/style.css">
				
				</head>
				<body>
				<header class="navbar navbar-dark navbar-full bg-primary doc-navbar-default sticky-top">
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
						<p class="nav-link active"><i class="material-icons mr-3" style="font-size: 30px;">account_circle</i>'.$_SESSION['correoUsuario'].'</p>
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
				');
			}
			else{
				print('
				<!DOCTYPE html>
				<html lang="es">			
				<head>
					<!-- Required meta tags -->
					<meta charset="utf-8">
					<meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
					<title>Dashboard - '.$title.'</title>
					<!-- CSS -->
					<!-- Add Material font (Roboto) and Material icon as needed -->
					<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
					<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
					<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
					<!-- Add Material CSS, replace Bootstrap CSS -->
					<link href="../../resources/css/sweetalert2.min.css" rel="stylesheet">
					<link rel="stylesheet" href="../../resources/css/material/material.min.css">
					<link rel="stylesheet" href="../../resources/css/material/dataTables.material.min.css">
				
					<link href="../../resources/css/material/material.css" rel="stylesheet">
				
					<link rel="stylesheet" href="../../resources/css/dashboardBasic/style.css">
				
				</head>
				<body>
				<header class="navbar navbar-dark navbar-full bg-primary doc-navbar-default sticky-top">
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
						<p class="nav-link active"><i class="material-icons mr-3" style="font-size: 30px;">account_circle</i>'.$_SESSION['correoUsuario'].'</p>
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
					<title>Dashboard - '.$title.'</title>
					<!-- CSS -->
					<!-- Add Material font (Roboto) and Material icon as needed -->
					<link
						href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700"
						rel="stylesheet">
					<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
					<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
					<!-- Add Material CSS, replace Bootstrap CSS -->
					<link href="../../resources/css/sweetalert2.min.css" rel="stylesheet">
					<link rel="stylesheet" href="../../resources/css/material/material.min.css">
				
					<link href="../../resources/css/material/material.css" rel="stylesheet">        
				
				</head>
				<body>
			');
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'register.php') {
				header('location: index.php');
			}
		}
	}

	public static function footerTemplate($controller)
	{
		print('
					</main>
					<footer class="page-footer teal">
						<div class="container">
							<div class="row">
								<div class="col s12 m6 l6">
									<h5 class="white-text">Dashboard</h5>
									<a class="white-text" href="mailto:dacasoft@outlook.com"><i class="material-icons left">email</i>Ayuda</a>
								</div>
								<div class="col s12 m6 l6">
									<h5 class="white-text">Enlaces</h5>
									<a class="white-text" href="http://localhost/phpmyadmin/" target="_blank"><i class="material-icons left">cloud</i>phpMyAdmin</a>
								</div>
							</div>
						</div>
						<div class="footer-copyright">
							<div class="container">
								<span>© Coffeeshop, todos los derechos reservados.</span>
								<span class="white-text right">Diseñado con <a class="red-text text-accent-1" href="http://materializecss.com/" target="_blank"><b>Materialize</b></a></span>
							</div>
						</div>
					</footer>
					<script type="text/javascript" src="../../libraries/jquery-3.2.1.min.js"></script>
					<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
					<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
					<script type="text/javascript" src="../../resources/js/dashboard.js"></script>
					<script type="text/javascript" src="../../core/helpers/functions.js"></script>
					<script type="text/javascript" src="../../core/controllers/dashboard/account.js"></script>
					<script type="text/javascript" src="../../core/controllers/dashboard/'.$controller.'"></script>
				</body>
			</html>
		');
	}
}
?>