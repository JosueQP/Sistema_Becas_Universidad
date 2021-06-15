<?php

require_once("../Logica/LNEstudianteBusqueda.php");
$objLNListaEstudiante = new LNEstudianteBusqueda();

$idEstudiante =  $_REQUEST['idEstudiante'];
$horario = $objLNListaEstudiante->HorarioEstudianteTrabajo($idEstudiante);

var_dump($horario);



?>