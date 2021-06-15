<?php
require_once("../Modelo/BDSolicitudPersistencia.php");
    
    $objetoSolicitudPersistencia = new solicitudPersistencia();

    $exitoRegistro = $objetoSolicitudPersistencia->registrarSolicitud(
                                                        $_REQUEST['idGestion'],
                                                         $_REQUEST['idArea'],
                                                        $_REQUEST['idPrecio']
                                                       
                                                       
                                                        );
    if($exitoRegistro==1){
    	echo "exito registro";;
      
    }else{
      echo "error al registrar";
    }
   
?>

<br>
<?php

header('Location:../Vista/iuHorarioTrabajo.php')?>

