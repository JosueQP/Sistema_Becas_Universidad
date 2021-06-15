<?php
require_once("../Modelo/BDAsignacionBecaInstitucionalPersistencia.php");
   $objetoAsignarPersistencia = new asignacionBecaInstitucional();

    $exitoRegistro = $objetoAsignarPersistencia->AsignarBecaInstitucional(
                                                         $_REQUEST['becaInstitucional'],
                                                        $_REQUEST['estudiante']
                                                       
                                                     
                                                       
                                                        );
    if($exitoRegistro==1){
    	var_dump($exitoRegistro);
    	
    }else{
      var_dump($exitoRegistro);
    }
?>

<br>
<a href="../Vista/HorarioTrabajo.php">inicio</a>