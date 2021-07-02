<?php
/*require_once("../Logica/LNEstudianteBusqueda.php");
$objLNListaPersonal = new LNEstudianteBusqueda();
*/

require_once("../Logica/LNEstudianteBusqueda.php");
require_once("../Logica/LNBusquedaRegistroEntradaSalida.php");
require_once("../LogicaFinanza/LNEstudianteBusquedaFinanza.php");
$ObjListaRegistroEntradaSalida = new LNBusquedaRegistroEntradaSalida();
$objLNListaPersonal = new LNEstudianteBusqueda();
$estudianteFinanza = new LNBusquedaEstudianteFinanza();

/*echo $_REQUEST['idAsignacionBecaInstitucional'];
echo $_REQUEST['fechaInicio'];
echo $_REQUEST['fechaFin'];*/
$listaRegistroEntradaSalidaABI = $ObjListaRegistroEntradaSalida ->ListaEntradaSalida($_REQUEST['idAsignacionBecaInstitucional'],$_REQUEST['fechaInicio'],$_REQUEST['fechaFin']);
//var_dump($listaRegistroEntradaSalidaABI);
//$fechaInicio = $_REQUEST['fechaInicio'];
//$fechaFin = $_REQUEST['fechaFin'];
$listaRegistroEntradaSalidaSaldo = $ObjListaRegistroEntradaSalida->ListaEntradaSalidaSaldo($_REQUEST['idAsignacionBecaInstitucional'],$_REQUEST['fechaInicio'],$_REQUEST['fechaFin']);
//var_dump($listaRegistroEntradaSalidaSaldo);
$Reporte = $objLNListaPersonal -> ReporteMensual1($_REQUEST['idEstudiante']);
var_dump($Reporte);
$listaEstudianteAsignacion=$objLNListaPersonal->LogicaEstudianteAsignacion();
//var_dump($listaEstudianteAsignacion);

$idContrato = $estudianteFinanza->contratoEstudiante($_REQUEST['idEstudiante']);
//var_dump($idContrato);
$envioId = $idContrato['idContrato'];
//echo $envioId;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Reporte Mensual</h1>
<p>
							 <for>Gestion :</for> <?php echo($Reporte['gestion'])?>
							 <br> <for>Estudiante :</for>  <?php echo($Reporte['estudiante'])?>
                             <br> <for>Departamento :</for>  <?php echo($Reporte['departamento'])?>
                             <br><for>Area :</for>   <?php echo($Reporte['area'])?>
                             <br> <for>Precio Hora :</for>  <?php echo($Reporte['precio'])?>
                             <br><for>Jefe Departamento :</for>   <?php echo($Reporte['personal'])?>
                             <br><for>Horario :</for> <a href="../Vista/IUHorarioEstudiante.php?idEstudiante=<?php  echo $Reporte['idEstudiante']; ?>">Ver</a>
                           
                             <br><for>Reporte Mensual :</for>   <?php echo($_REQUEST['fechaInicio'])?><for>----</for>   <?php echo($_REQUEST['fechaFin'])?>
							<br>
					</p>	
<body>
    <?php echo "Monto Total:   ".$listaRegistroEntradaSalidaSaldo['pago'];?>
 <table border="1">

        <tr>
            <th>fecha</th>
            <th>Tiempo</th>
            <th>Costo Fecha</th>

        </tr>

        <?php foreach($listaRegistroEntradaSalidaABI as $Listas)
             
        {?>

        <tr>
        <td><a href="../Vista/IUReporteDiario.php?idABI=<?php  echo $Listas['idAsignacionBecaInstitucional']; ?>&fecha=<?php  echo $Listas['fecha'];?>">
            <?php  echo $Listas['fecha']; ?></a></td>
            <td><?php  echo $Listas['totalHora']; ?></a></td>
            <td ><?php echo $Listas['Total']?></td>
        </tr>
        <?php }?>
</table>

</body>
</html>