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
									<a class="navbar-brand px-0" href="#">Libreria Maquilishuat</a>
								</div>
								<nav class="navdrawer-nav">
								<p class="nav-link active"><i class="material-icons mr-3" style="font-size: 30px;">account_circle</i>'.$_SESSION['correoUsuario'].'</p>
								<p class="nav-link"><i class="material-icons mr-3" style="font-size: 30px;">settings</i>Editar datos</p>
								<p class="nav-link" onclick="signOff()"><i class="material-icons mr-3" style="font-size: 30px;">power_settings_new</i>Cerrar sesión</p>
								</nav>
								<div class="navdrawer-divider"></div>
								<p class="navdrawer-subheader">Navdrawer subheader</p>
								<ul class="navdrawer-nav">
									<li class="nav-item">
										<a class="nav-link active" href="#"><i class="material-icons mr-3">alarm_on</i> Active with icon</a>
									</li>
									<li class="nav-item">
										<a class="nav-link disabled" href="#"><i class="material-icons mr-3">alarm_off</i> Disabled with
											icon</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#"><i class="material-icons mr-3">link</i> Link with icon</a>
									</li>
								</ul>
							</div>
						</div>
						
				');
			}else{}
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