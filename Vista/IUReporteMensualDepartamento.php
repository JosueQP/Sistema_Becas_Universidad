<?php
 	
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
   /* if (isset($_SESSION['usuario'])){
		$user=$_SESSION['usuario'];
		if(isset($_SESSION['contrasenia'])){
			$pass=$_SESSION['contrasenia'];*/

			require ("../Logica/LNPersonalBusqueda.php");
            require ("../Logica/LNEstudianteBusqueda.php");
    		$usuario= new LNPersonalBusqueda();
            $estudiante = new LNEstudianteBusqueda();
    		//$idPersonal=$_REQUEST['idPersonal'];
			//$datosPersonal = $usuario->LogicaDatoPersonal($idPersonal);
			$datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);
			$lista=$usuario->listaPersonal();
     // $listaEstudiante=$estudiante->ReporteMensual1($_REQUEST['idEstudiante']);

      $listaEstudianteAsignacion=$estudiante->LogicaEstudianteAsignacionDepartamento($_REQUEST['idPersonal']);
      //var_dump($listaEstudianteAsignacion);
			//$dato=$_POST['usuario'];
			//echo  $idPersonal;
			//var_dump($idPersonal)
      //var_dump($listaEstudianteAsignacion);
      require ("../Logica/LNGestionBusqueda.php");
      $gestion= new LNGestionBusqueda();
      $gestiones = $gestion->logicaGestiones();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Estudiante Asignacion </title>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#"></a>
      </li>
    </ul>
    
   <!-- <p>
                <?//php echo($datosUsuario['nombreUsuario'])?>
            <br><?//php echo($datosPersonal['departamento'])?>
            <br>
    </p>-->
  </div>
</nav>
</head>
<body>
<form>
<div class="main-boxes">
        <div class="main-header">
            <h2>Estudiante Beca Institucional </h2>
        </div>
        <p>
        <th>Gestion</th>
                            <td>
                            
                                <select name="idGestion" id="idGestion">
                                <?php foreach ($gestiones as $lista): ?>
                                <option value="<?php echo($lista['idGestion'])?>"><?php echo($lista['nombre'])?></option>
                                <?php endforeach ;

                            ?>
                            </select>
        </p>
        <div class="container"> 
            <table border="1">
                <tr>
                    <th>area</th>
                    <th>estudiante</th>
                    <th>Ver</th>
                    <th>Estado De Cuentas</th>
           
                </tr>

                <?php foreach($listaEstudianteAsignacion as $Listas)
                {?>

                <tr>
                    <td ><?php echo $Listas['nombre']?></td>
                    <td ><?php echo $Listas['Estudiante']?></td>
                    <td><a href="../Vista/IUBuscarReporteMensualEstudianteDepartamento.php?idEstudiante=<?php  echo $Listas['idEstudiante']; ?>">Ver</a></td>
                    <td><a href="../Vista/IUDescargo.php?codigoEstudiante=<?php  echo $Listas['codigoEstudiante']; ?>">EstadoDeCuenta</a></td>
                </tr>
                <?php }?>
            </table>
        </div>

    </div>
  </form>
</body>
</html>