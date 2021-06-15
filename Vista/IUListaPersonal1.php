<?php
session_start();
require_once("../Logica/LNListaPersonal.php");
$objLNListaPersonal = new LNListaPersonal();
require ("../Logica/LNPersonalBusqueda.php");
$usuario= new LNPersonalBusqueda();
$datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);
//var_dump ($datosUsuario);
echo($datosUsuario['nombreUsuario']);
echo($datosUsuario['idPersonal']);
echo($datosUsuario['departamento']);
//echo "Id Empleado --> ".$_REQUEST['idPersonal']."<br>";

$estado = $_REQUEST['activo'];
if($estado=="todo"){
    $estado="1 or p.activo = 0";
    $activo=$estado;
}else{
    $activo=$estado;
}

$datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);
$lista=$usuario->listaPersonal();

$Lista = $objLNListaPersonal->busquedaPersonal($_REQUEST['primerNombre'],$_REQUEST['segundoNombre'],$_REQUEST['apellidoPaterno'],$_REQUEST['apellidoMaterno'],$_REQUEST['ci'],$activo);
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<meta charset="UTF-8">
	<title>Personal</title>
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
    .container input{
        background-color: transparent;
        color: white;
    }
    .a-red{
        color: #FFFFFF;
    }
    .bi{
            align-self: right;
            
            text-align: none;
            /*color: red;*/
        }
    .bi-house-fill{
        color: white;
        position: absolute;
        text-align: left;
        transform: translate(-800%, 50%);
    }
    .bi-plus-square-fill{
        color: white;
    }
    .bi-x-square-fill{
            color: red;
        }
        .bi-pencil-square{
            background: blue;
            color: white;
            border-radius: 3px;
        }
        .bi-person-plus-fill{
            color: darkblue;
        }
        .bi-eye-fill{
            /*background: green;*/
            color: #02b845;
        }
</style>
<body>

<header class="default-header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<div class="collapse navbar-collapse justify-content align-items-center" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<li><a  href="ListaPersonal.php?idPersonal=<?php echo $datosUsuario['idPersonal']?>">Personal</a></li>
						<li><a  href="ListaEstudiante.php">Estudiante</a></li>
						
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
					<p>
							    <?php echo($datosUsuario['nombreUsuario'])?>
							<br><?php echo($datosUsuario['departamento'])?>
							<br>
					</p>
                   
 <form action="ListaPersonal1.php" method="post" >
  <div class="form-row">
    <div class="form-group col-md-6">
         Primer Nombre:
      <input type="text" name="primerNombre" id="primerNombre">
    </div>
    <div class="form-group col-md-6">
        Segundo Nombre:
      <input type="text" name="segundoNombre" id="segundoNombre">
    </div>
    <div class="form-group col-md-6">
         Primer Nombre:
      <input type="text" name="primerNombre" id="primerNombre">
    </div>
    <div class="form-group col-md-6">
        Segundo Nombre:
      <input type="text" name="segundoNombre" id="segundoNombre">
    </div>
    <div class="form-group col-md-6">
    Activos <input type="radio" name="activo" value="1">
    </div>
    <div class="form-group col-md-6">
    Inactivos <input type="radio" name="activo" value="0">
    </div>
    <div class="form-group col-md-6">
    Todos <input type="radio" name="activo" value="todo" checked><br><br>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
                    <a href="SolicitudPersonal.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Solicitud</a>
    <div class="main-boxes">
        <div class="main-header">
            <h2>Lista Personal</h2>
        </div>
        <?php if($Lista){?>
        <div class="container"> 
            <table border="1">
                <tr>
                    <th>Nombre</th>
                    <th>Ci</th>
                    <th>Activo</th>
                </tr>
                <?php foreach($Lista as $Listas){?>
                <tr>
                    <td ><?php echo $Listas['nombreCompleto']?></td>
                    <td ><?php echo $Listas['ci']?></td>
                    <td><?php echo $Listas['activo']?></td>
                </tr>
                <?php }?>
            </table>
        </div>

        <?php }?>  
    </div>
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
<META HTTP-EQUIV="REFRESH" CONTENT="100000;URL=../SalirPersonal.php">
</html>
<?php
/*}}else{
	header('Location: ../salirPersonal.php');//Aqui lo redireccionas al lugar que quieras.
		die() ;
		
	   }*/
   ?>