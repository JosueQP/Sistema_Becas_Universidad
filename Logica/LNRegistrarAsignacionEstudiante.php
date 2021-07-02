<?php
require_once("../Modelo/BDAsignacionBecaInstitucionalPersistencia.php");
  echo $_REQUEST['idSolicitudBecaInstitucional'];
    echo $_REQUEST['idEstudiante'];
    $objetoSolicitudPersistencia = new asignacionBecaInstitucional();

   $exitoRegistro = $objetoSolicitudPersistencia->AsignarBecaInstitucional(
                                                        $_REQUEST['idSolicitudBecaInstitucional'],
                                                         $_REQUEST['idEstudiante']
                                                    
                                                        );
    if($exitoRegistro==1){
    	echo "exito registro";
     // header("Location:../Vista/IUHorarioTrabajo.php");
      
    }else{
      echo "error al registrar";
    }
   
?>
