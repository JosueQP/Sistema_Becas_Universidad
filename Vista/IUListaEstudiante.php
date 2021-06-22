<?php
session_start();
require_once("../Logica/LNEstudianteBusqueda.php");
$objLNListaPersonal = new LNEstudianteBusqueda();
$estado = $_REQUEST['activo'];
if($estado=="todo"){
    $estado="1 or e.activo = 0";
    $activo=$estado;
}else{
    $activo=$estado;
}
require ("../Logica/LNPersonalBusqueda.php");
$usuario= new LNPersonalBusqueda();
$datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);
$Listado = $objLNListaPersonal->busquedaEstudiante($_REQUEST['nombre'],$_REQUEST['primerNombre'],$_REQUEST['segundoNombre'],$_REQUEST['apellidoPaterno'],$_REQUEST['apellidoMaterno'],$_REQUEST['ci'],$activo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/estilos1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Estudiante</title>
  
</head>

<body>
  <head>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Lista Estudiantes</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li>
						<form action="IUListaEstudiante.php" method="post"> 
						<input type="hidden" name="idPersonal" value="<?php echo $datosUsuario['idPersonal']?>">
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
  		<li>
						<form action="IUListaPersonal.php" method="post"> 
						<input type="hidden" name="idPersonal" value="<?php echo $datosUsuario['idPersonal']?>">
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
    </ul>
        <?php echo($datosUsuario['nombreUsuario']);
          echo '<br>';
          echo($datosUsuario['departamento']);
    ?>
  </div>
</nav>
  </head>

        <form action="IUListaEstudiante.php" method="post">
            Primer Nombre: <input type="text" name="primerNombre" id="primerNombre">
            Segundo Nombre: <input type="text" name="segundoNombre" id="segundoNombre">
            Apellido Paterno: <input type="text" name="apellidoPaterno" id="apellidoPaterno">
            Apellido Materno: <input type="text" name="apellidoMaterno" id="apellidoMaterno"><br><br>
            Ci: <input type="text" name="ci" id="ci"><br><br>
            Carrera: <input type="text" name="nombre" id="nombre"><br><br>
            Activos <input type="radio" name="activo" value="1">
            Inactivos <input type="radio" name="activo" value="0">
            Todos <input type="radio" name="activo" value="todo" checked><br><br>
            <input type="submit" name="buscar" id="buscar" value="BUSCAR">
        </form>
    
    </div>
    <button><a href="IURegistrarEstudiante.php">RegistrarEstudiante</a></button>
    <div class="main-boxes">
        <div class="main-header">
            <h2>Lista Estudiante</h2>
        </div>
        <?php if($Listado){?>
        <div class="container"> 
            <table border="1">
                <tr>
                <th>Carrera</th>
                    <th>Nombre</th>
                    <th>Ci</th>
                    <th>Activo</th>
                    <th>Ver</th>
                </tr>
                <?php foreach($Listado as $Listas){?>
                <tr>
                <td ><?php echo $Listas['nombre']?></td>
                    <td ><?php echo $Listas['nombreCompleto']?></td>
                    <td ><?php echo $Listas['ci']?></td>
                    <td><?php echo $Listas['activo']?></td>
                    <td><a href="../Vista/ReporteMensual.php?idEstudiante=<?php  echo $Listas['idEstudiante']; ?>">Ver</a></td>
                </tr>
                <?php }?>
            </table>
        </div>

        <?php }?>  
    </div>
</body>
</body>
</html>