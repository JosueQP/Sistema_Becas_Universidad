<?php
	//require_once("../Modelo/PersonalBusqueda.php");
	//$usuario= new PersonalBusqueda();
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();

    if (isset($_SESSION['usuario'])){
		$user=$_SESSION['usuario'];
		if(isset($_SESSION['contrasenia'])){
			$pass=$_SESSION['contrasenia'];

	//$rolPersonal->rolPersonal($_REQUEST['rol']);		
   			 require ("../Logica/LNPersonalBusqueda.php");
    		$usuario= new LNPersonalBusqueda();
    		$idPersonal=$_SESSION['idPersonal'];
			$datosPersonal = $usuario->LogicaDatoPersonal($idPersonal);
			$datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);
			$lista=$usuario->listaPersonal();
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Vista Personal</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|Roboto:400,500" rel="stylesheet">
	<link rel="stylesheet" href="fondo/css/linearicons.css">
	<link rel="stylesheet" href="fondo/css/font-awesome.min.css">
	<link rel="stylesheet" href="fondo/css/bootstrap.css">
	<link rel="stylesheet" href="fondo/css/owl.carousel.css">
	<link rel="stylesheet" href="fondo/css/magnific-popup.css">
	<link rel="stylesheet" href="fondo/css/nice-select.css">
	<link rel="stylesheet" href="fondo/css/main.css">
</head>

<body>

	<header class="default-header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="fa fa-bars"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<li><a  href="ReporteMensual.php">Reporte Mensual</a></li>
						<li>
						<form action="IUListaPersonal1.php" method="post"> 
						<input type="hidden" name="idPersonal" value="<?php echo $datosUsuario['idPersonal'];?>">
						<input type="hidden" name="primerNombre" value="">
						<input type="hidden" name="segundoNombre" value=""> 
						<input type="hidden" name="apellidoPaterno" value="">
						<input type="hidden" name="apellidoMaterno" value="">
						<input type="hidden" name="ci" value="">
						<input type="hidden" name="activo" value="todo">
						<input type="hidden" name="buscar" value="buscar">
						<input type="submit" value="personal" class="enviar">
						</form>
						</li>
						<li><a href="salirPersonal.php">Cerrar Sesion</a></li>

					</ul>
				</div>
			</div>
		</nav>
	</header>

	<section class="home-banner-area relative" id="home" data-parallax="scroll" data-image-src="img/header-bg.jpg">
		<div class="overlay-bg overlay"></div>
		<h1 class="template-name">UAB</h1>
		<div class="container">
			<div class="row fullscreen">
				<div class="banner-content col-lg-12">
					<h1>
						Bienvenido <br>
						Jefe Gestion Talento Humano
					</h1>
					<p>
							<?php echo($datosUsuario['nombreUsuario'])?>
							<br><?php echo($datosPersonal['departamento'])?>
							<br>
					</p>
				</div>
			</div>
		</div>
	</section>

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/main.js"></script>
</body>
<META HTTP-EQUIV="REFRESH" CONTENT="1000000;URL=../Vista/SalirPersonal.php">
</html>
<?php
}}else{
	header('Location: salirPersonal.php');//Aqui lo redireccionas al lugar que quieras.
		die() ;
		
	  }
   ?>

   