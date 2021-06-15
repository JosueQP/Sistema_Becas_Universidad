<?php
require_once("../Modelo/BDHorarioTrabajoPersistencia.php");
    
$objetoHorarioTrabajo = new horarioTrabajoPersistencia();

var_dump($_POST);

$c=0;
foreach ($_POST['dia'] as $dia ){
    echo $dia.' '.$_REQUEST['HoraInicio'][0]." ".$_REQUEST['HoraFin'][0];
    $exitoRegistro = $objetoHorarioTrabajo->registrarHorario(
                                                    $_REQUEST['idSolicitudBecaInstitucional'],
                                                    $dia[0],
                                                    $_REQUEST['HoraInicio'][0],
                                                    $_REQUEST['HoraFin'][0]
                                                
                                                
                                                    );
if($exitoRegistro==1){
echo "exito registro";;

}else{
echo "error al registrar";
}
    $c++;

}
?>