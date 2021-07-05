<?php
            require ("../Logica/LNBusquedaBecaInstitucional.php");
     $becaInstitucional= new LNBusquedaBecaInstitucional();
       //  echo $_REQUEST['idSolicitudBecaInstitucional'];
      $detalleTrabajo1 =$becaInstitucional-> LogicaDetalleBecaInstitucional($_REQUEST['idSolicitudBecaInstitucional']); 
       // var_dump($detalleTrabajo1);
    $detalleHorario = $becaInstitucional -> LogicaHorarioBecaInstitucional($_REQUEST ['idSolicitudBecaInstitucional'])
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Detalle  Trabajo</h1>
    <p>
    Departamento :  <?php  echo($detalleTrabajo1['nombre'])?>
    <br>
       Area : <?php  echo($detalleTrabajo1['area'])?>
        <br>
       Jefe Departamento : <?php  echo($detalleTrabajo1['personal'])?>
       <br>
       Precio :  <?php  echo($detalleTrabajo1['precio'])?>


    </p>

    <table border="1">
<h1>Horario Trabajo</h1>
<tr>
    <td>Dia</td>
    <td>Hora Inicio</td>
    <td>Hora Fin</td>

</tr>

<?php foreach($detalleHorario as $Listas)
     
{?>

<tr>
    <td><?php  echo $Listas['dia']; ?></a></td>
    <td ><?php echo $Listas['idHoraInicio']?></td>
    <td ><?php echo $Listas['idHoraFin']?></td>
</tr>
<?php }?>
</table>
</body>
</html>