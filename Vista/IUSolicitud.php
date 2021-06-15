<?php
session_start();
    require ("../Logica/LNGestionBusqueda.php");
    $gestion= new LNGestionBusqueda();
    require ("../Logica/LNBusquedaBecaInstitucional.php");
    $becaInstitucional= new LNBusquedaBecaInstitucional();
    require ("../Logica/LNPersonalBusqueda.php");
    $usuario= new LNPersonalBusqueda();
    require_once("../Logica/LNListaPersonal.php");
    $objLNListaPersonal = new LNListaPersonal();
    $datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);
    //echo $_REQUEST['idPersonal'];
    //header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    //session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    //if (isset($_SESSION['usuario'])){
    //$user=$_SESSION['usuario'];
    //if(isset($_SESSION['contrasenia'])){
      //$pass=$_SESSION['contrasenia'];
      $listaBecaInstitucional=$becaInstitucional->LogicaListaBecaInstitucional($_REQUEST['idPersonal']);
      $listaGestion=$gestion->logicaListaGestion();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Lista Solicitud</title>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Lista Solicitud</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="IUAsignacionBecaInstitucional.php?idPersonal=<?php echo $datosUsuario['idPersonal']?>">Solicitar Personal <span class="sr-only">(current)</span></a>
        
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#"></a>
      </li>
    </ul>
    
    <?php echo($datosUsuario['nombreUsuario']);
          echo '<br>';
          echo($datosUsuario['departamento']);
    ?>
  </div>
</nav>
</head>
<body>
<br>
<br>
<tr>
           <center>   
          <th>Gestion</th>
               <td>
                <select name="idGestion" id="idGestion">
                echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                     <?php foreach ($listaGestion as $lista2) {?>
                     <option value="<?php echo($lista2['idGestion'])?>"><?php echo($lista2['nombre'])?></option>
                   <?php } ;
                   echo '</div>';
               ?>
                 </select>
               </td>
           </tr>
           </center> 
<div class="main-boxes">
        <?php if($listaBecaInstitucional){?>
        <div class="container"> 
          <center>
            <table border="1">
                <tr>
                    <th>Area</th>
                    <th>Precio</th>
                    <th>cantidad</th>
                </tr>
                <?php foreach($listaBecaInstitucional as $Listas){?>
                <tr>
                    <td ><?php echo $Listas['area']?></td>
                    <td ><?php echo $Listas['precio']?></td>
                    <td ><?php echo $Listas['cantidad']?></td>
                </tr>
                <?php }?>
                <br>
                <br>
            </table>

            </center>
        </div>

        <?php }?>  
    </div>
</body>
</html>