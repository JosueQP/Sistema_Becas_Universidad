<?php
require_once("../Logica/LNPersonalBusqueda.php");
$objLNPersonalBusqueda = new LNPersonalBusqueda();
//echo "Gestion: ".$_REQUEST['fecha'];
$listaPersonal = $objLNPersonalBusqueda->listaPersonalBusqueda($_REQUEST['fecha']);

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Reporte 1</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Lista Personal</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="ListaEstudiante.php">Estudiante <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ListaPersonal.php">Personal</a>
      </li>
    </ul>
    <?php //echo($datosUsuario['nombreUsuario']);
          //echo '<br>';
          //echo($datosUsuario['departamento']);
    ?>
  </div>
</nav>
<h1>Horas</h1>
<table>
  
</table>

<table border = 1>
  <tr>
    <th>Hora Inicio</th>
    <th>Hora Fin </th>
    <th>Total Horas</th>
    <th>Nombre Completo</th>
  </tr>

  <?php 
     foreach($listaPersonal as $estudiante){
   ?>
  <tr>
  	<td><?php  echo $estudiante['horaInicio']; ?></td>
  	<td><?php  echo $estudiante['horaFin']; ?></td>
      <td><?php  echo $estudiante['totalhora']; ?></td>
      <td><?php  echo $estudiante['nombreCompleto']; ?></td>
  </tr>

  <?php } ?>
</table>

</body>
</html>