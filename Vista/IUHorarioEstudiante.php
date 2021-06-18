<?php

require_once("../Logica/LNEstudianteBusqueda.php");
$objLNListaEstudiante = new LNEstudianteBusqueda();

$idEstudiante =  $_REQUEST['idEstudiante'];
$horario = $objLNListaEstudiante->HorarioEstudianteTrabajo($idEstudiante);

//var_dump($horario);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario Estudiante</title>
</head>
<body>
<table border="1">
<h1>Horario Estudiante</h1>
<tr>
    <td>Dia</td>
    <td>Hora Inicio</td>
    <td>Hora Fin</td>

</tr>

<?php foreach($horario as $Listas)
     
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