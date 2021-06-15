<?php 
require_once("../LogicaFinanza/LNEstudianteBusquedaFinanza.php");
$ObjEstudianteBusquedaFinanza = new LNBusquedaEstudianteFinanza();
//$_REQUEST['codigoEstudiante'];
$codigoEstudiante =  $_REQUEST['codigoEstudiante'];
echo $codigoEstudiante;
$lista=$ObjEstudianteBusquedaFinanza->EstadoCuenta($codigoEstudiante );
$listaCuenta=$ObjEstudianteBusquedaFinanza->EstadoCuentaEstudiante($codigoEstudiante );

//var_dump($lista);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header class="default-header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="fa fa-bars"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<li><a href="ReporteMensual.php">Atras</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
<body>
<p>
							 <for>Facultad :</for> <?php echo($listaCuenta['facultad'])?>
							 <br> <for>Carrera :</for>  <?php echo($listaCuenta['carrera'])?>
                             <br><for>Monto Total :</for>   <?php echo($listaCuenta['montoTotal'])?>
                             <br> <for>Saldo :</for>  <?php echo($listaCuenta['saldo'])?>
                            
							<br>
					</p>
                    <form>

<table border="1">

       <tr>
           <th>fecha</th>
           <th>Monto Parcial</th>
           <th>Tipo Pago</th>
       </tr>

       <?php foreach($lista as $Listas)
            
       {?>

       <tr>
           <td ><?php echo $Listas['fecha']?></td>
           <td ><?php echo $Listas['montoParcial']?></td>
           <td ><?php echo $Listas['tipoPago']?></td>
       </tr>
       <?php }?>
</table>

</form>
</body>
</html>