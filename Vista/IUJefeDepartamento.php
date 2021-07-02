<?php
 	
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (isset($_SESSION['usuario'])){
		$user=$_SESSION['usuario'];
		if(isset($_SESSION['contrasenia'])){
			$pass=$_SESSION['contrasenia'];

			require ("../Logica/LNPersonalBusqueda.php");
    		$usuario= new LNPersonalBusqueda();
    		$idPersonal=$_SESSION['idPersonal'];
			//echo $idPersonal;
			$datosPersonal = $usuario->LogicaDatoPersonal($idPersonal);
			$datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);
			//var_dump($datosUsuario);
			$lista=$usuario->listaPersonal();
			//$dato=$_POST['usuario'];
			//echo  $idPersonal;
			//var_dump($idPersonal)

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<meta charset="UTF-8">
	<title>Menu Jefe Departamento</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|Roboto:400,500" rel="stylesheet">
	<link rel="stylesheet" href="fondo/css/linearicons.css">
	<link rel="stylesheet" href="fondo/css/font-awesome.min.css">
	<link rel="stylesheet" href="fondo/css/bootstrap.css">
	<link rel="stylesheet" href="fondo/css/owl.carousel.css">
	<link rel="stylesheet" href="fondo/css/magnific-popup.css">
	<link rel="stylesheet" href="fondo/css/nice-select.css">
	<link rel="stylesheet" href="fondo/css/main.css">
</head>
<style>
	input [type=submit]{
		display:flex;
		flex-direction:column;
		padding-left:0;
		margin-bottom:0;
		list-style:none
	}
	.enviar{
		background:'#00000000';
		color:'white';
		padding-right:0;
		padding-left:0
	}

</style>
<body>

<header class="default-header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<div class="collapse navbar-collapse justify-content align-items-center" id="navbarSupportedContent">
					<ul class="navbar-nav">
					
						
						<li><a  href="ReporteHorasTrabajadas.php?idPersonal=<?php echo $datosUsuario['idPersonal']?>">reporteHoras</a></li>
						<li><a  href="IUReporteMensualDepartamento.php?idPersonal=<?php echo $datosUsuario['idPersonal']?>">Reporte Mensual</a></li>
						<li><a  href="IUSolicitud.php?idPersonal=<?php echo $datosUsuario['idPersonal']?>">Solicitud</a></li>
						<li>
						<form action="IUListaEstudiante1.php" method="post"> 
						<input type="hidden" name="idPersonal" value="<?php echo $datosUsuario['idPersonal'];?>">
						<input type="hidden" name="primerNombre" value="">
						<input type="hidden" name="segundoNombre" value=""> 
						<input type="hidden" name="apellidoPaterno" value="">
						<input type="hidden" name="apellidoMaterno" value="">
						<input type="hidden" name="carrera" value="">
						<input type="hidden" name="nombre" value="">
						<input type="hidden" name="ci" value="">
						<input type="hidden" name="activo" value="todo">
						<input type="hidden" name="buscar" value="buscar">
						<input type="submit" value="Estudiante" class="enviar">
						</form>
						</li>
					</ul>
					
				</div>
			</div>
				<li class="navbar-nav"><a  href="salirPersonal.php">Cerrar Sesion</a></li>
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
						Jefe Departamento
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