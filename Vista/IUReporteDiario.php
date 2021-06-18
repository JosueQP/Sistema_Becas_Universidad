<?php 
require_once("../Logica/LNBusquedaRegistroEntradaSalida.php");
$ObjListaRegistroEntradaSalida = new LNBusquedaRegistroEntradaSalida();

/*echo "ID: ".$_REQUEST['idABI'];
echo "Fecha: ".$_REQUEST['fecha'];*/
 
$ReporteDiario = $ObjListaRegistroEntradaSalida->ListaReporteDiario($_REQUEST['idABI'],$_REQUEST['fecha']);
$Reporte = $ObjListaRegistroEntradaSalida->ListaReporteDiarioDetalle($_REQUEST['idABI'],$_REQUEST['fecha']);
//var_dump ($Reporte);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Reporte Diario</h1>
<body>
                <p>
							 <for>Gestion :</for> <?php echo($Reporte['gestion'])?>
							 <br> <for>Estudiante :</for>  <?php echo($Reporte['Estudiante'])?>
                             <br><for>Area :</for>   <?php echo($Reporte['area'])?>
                             <br> <for>Departamento :</for>  <?php echo($Reporte['departamento'])?>
                             <br><for>Total :</for>   <?php echo($Reporte['Total'])?>
                             <br><for>Fecha :</for>   <?php echo($Reporte['fecha'])?>
                             
							<br>
					</p>
<form>

<table border="1">

       <tr>
           <th>fecha</th>
           <th>Hora Inicio</th>
           <th>Hora Fin</th>
           <th>Total Horas </th>
       </tr>

       <?php foreach($ReporteDiario as $Listas)
            
       {?>

       <tr>
           <td ><?php echo $Listas['fecha']?></td>
           <td ><?php echo $Listas['horaInicio']?></td>
           <td ><?php echo $Listas['horaFin']?></td>
           <td ><?php echo $Listas['totalHora']?></td>
       </tr>
       <?php }?>
</table>

</form>
</body>
</html>