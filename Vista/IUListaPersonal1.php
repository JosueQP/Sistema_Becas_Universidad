<?php
session_start();
require_once("../Logica/LNListaPersonal.php");
$objLNListaPersonal = new LNListaPersonal();
require ("../Logica/LNPersonalBusqueda.php");
$usuario= new LNPersonalBusqueda();
$idPersonal=$_SESSION['idPersonal'];
$datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);
//var_dump ($datosUsuario);
//echo "Id Empleado --> ".$_REQUEST['idPersonal']."<br>";
$primerNombre=$_REQUEST['primerNombre'];
$segundoNombre=$_REQUEST['segundoNombre'];
$apellidoPaterno=$_REQUEST['apellidoPaterno'];
$apellidoMaterno=$_REQUEST['apellidoMaterno'];
$ci=$_REQUEST['ci'];

//var_dump($_REQUEST);


$estado = $_REQUEST['activo'];
if($estado=="todo"){
    $estado="1 or p.activo = 0";
    $activo=$estado;
}else{
    $activo=$estado;
}


$Lista = $objLNListaPersonal->busquedaPersonal($primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$ci,$activo);
/*$post = (isset($_POST['primerNombre']) && !empty($_POST['primerNombre'])) &&
        (isset($_POST['segundoNombre']) && !empty($_POST['segundoNombre'])) &&
        (isset($_POST['apellidoPaterno']) && !empty($_POST['apellidoPaterno'])) &&
        (isset($_POST['apellidoMaterno']) && !empty($_POST['apellidoMaterno']));
        (isset($_POST['ci']) && !empty($_POST['ci']));


// Si $post es true (verdadero), entonces se mostrarán los resultados:
if ( $post ) {
    $nombre = htmlspecialchars($_POST["primerNombre"]);
    $sexo = htmlspecialchars($_POST["segundoNombre"]);
    $year = htmlspecialchars($_POST["apellidoPaterno"]);
    $terminos = htmlspecialchars($_POST["apellidoMaterno"]);
    $terminos = htmlspecialchars($_POST["ci"]);

}else {
 
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/estilos1.css">
    <link rel="stylesheet" href="../css/datatables.css">
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
        <a class="nav-link" href="IURegistrarPersonal.php">Registrar <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <?php echo($datosUsuario['nombreUsuario']);
          echo '<br>';
          echo($datosUsuario['departamento']);
    ?>
  </div>
</nav>
     
  </head>
  <!-- <div class="row">
    <div class="col-md-3">
      <div class="input-group">
        <span class="input-group-addon"><span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span></span>
                <input type="text" name="primerNombre" id="primerNombre" placeholder="primerNombre" >
                 <input type="text" name="segundoNombre" id="segundoNombre" placeholder="Segundo Nombre:">
                 <input type="text" name="apellidoPaterno" id="apellidoPaterno"placeholder="Apellido Paterno:">
                 <input type="text" name="apellidoMaterno" id="apellidoMaterno"placeholder="Apellido Materno:">
                 <input type="text" name="ci" id="ci"placeholder="Ci:">
                Activos <input type="radio" name="activo" value="1">
                Inactivos <input type="radio" name="activo" value="0">
                Todos <input type="radio" name="activo" value="todo" checked><br><br>
      </div>
    </div>
            <br>
            <br>
            <div class="col-md-3 col-md-offset-3" id="result">
   
    
    </div> -->
    <div class="main-boxes" >
        <div class="main-header" >
            <h2>Lista Personal</h2>
        </div>
        <?php if($Lista){?>
        <div class="container"> 
            <table border="1" id="tabla" >
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Ci</th>
                    <th>Activo</th>
                </tr>
             </thead>
             <tbody>
                <?php foreach($Lista as $Listas){?>
                <tr>
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