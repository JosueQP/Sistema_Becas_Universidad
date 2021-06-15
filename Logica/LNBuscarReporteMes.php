<?php
require ("../Logica/LNEstudianteBusqueda.php");
$estudiante= new LNEstudianteBusqueda();

$reporteMes= $estudiante->ReporteMesConsulta($_REQUEST['fechaInicio'],$_REQUEST['fechaFin']);


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
    
</body>
</html>