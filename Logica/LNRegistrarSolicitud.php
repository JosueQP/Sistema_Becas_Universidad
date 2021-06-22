<?php
require_once("../Modelo/BDSolicitudPersistencia.php");
    /*echo $_REQUEST['idGestion'];
    echo $_REQUEST['idArea'];
    echo $_REQUEST['idPrecio'];*/
    $objetoSolicitudPersistencia = new solicitudPersistencia();

    $exitoRegistro = $objetoSolicitudPersistencia->registrarSolicitud(
                                                        $_REQUEST['idGestion'],
                                                         $_REQUEST['idArea'],
                                                        $_REQUEST['idPrecio']
                                                       
                                                       
                                                        );
    if($exitoRegistro==1){
    	echo "exito registro";
      header("Location:../Vista/IUHorarioTrabajo.php");
      
    }else{
      echo "error al registrar";
    }
   
?>


