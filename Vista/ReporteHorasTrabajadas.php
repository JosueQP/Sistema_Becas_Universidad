<?php
session_start();
/*require_once("../Logica/LNListaPersonal.php");
$objLNListaPersonal = new LNListaPersonal();
require ("../Logica/LNPersonalBusqueda.php");
$usuario= new LNPersonalBusqueda();
$datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);*/
//var_dump ($datosUsuario);
//echo "Id Empleado --> ".$_REQUEST['idPersonal']."<br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/estilos1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Personal</title>
</head>
<body>
      <head>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Lista Personal</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="../ListaEstudiante.php">Estudiante <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../ListaPersonal.php">Personal</a>
      </li>
    </ul>
    
  </div>
</nav>
<form action="../Vista/IUListaHorasTrabajadas.php" method="post" name="">
    <table border = 1>
      <tr>
        <td>Fecha</td>
        <td><input type="date" name="fecha" id="fecha"  ></td>
      </tr>
      <br>
    <table>
    <button type="submit">Buscar</button>
    <button type="reset">Cancelar</button>
</form>
</body>
</body>
</html>