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
    <link rel="stylesheet" href="../css/datatables.css">
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
  <li><a href="IURegistrarEstudiante.php">RegistrarEstudiante</a></li>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    </ul>
        <?php echo($datosUsuario['nombreUsuario']);
          echo '<br>';
          echo($datosUsuario['departamento']);
    ?>
  </div>
</nav>
  </head>
    <div class="main-boxes">
        <div class="main-header">
        </div>
        <?php if($Listado){?>
        <div class="container"> 
            <table border="1" id="tabla">
            <thead>
                <tr>
                <th>Carrera</th>
                    <th>Nombre</th>
                    <th>Ci</th>
                    <th>Activo</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($Listado as $Listas){?>
                <tr>
                <td ><?php echo $Listas['nombre']?></td>
                    <td ><?php echo $Listas['nombreCompleto']?></td>
                    <td ><?php echo $Listas['ci']?></td>
                    <td><?php echo $Listas['activo']?></td>
                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>

        <?php }?>  
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <script type="text/javascript" src="../ArchivosJs/datatables.js"></script>
    <script type="text/javascript" src="../ArchivosJs/Busqueda.js"></script>
</body>
</html>