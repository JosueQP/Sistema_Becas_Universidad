<?php
require_once("../Modelo/Conexion.php");
class RegistroEntradaSalidaPersistencia
{
    private $conexion;

    function __construct()
    {
        $this->conexion =  new Conexion();
    }

public function registroEntrada($idAsignacionBecaInstitucional,$fecha,$horaInicio) 
    {
       // echo "llego ".$idAsignacionBecaInstitucional."otro".$fecha."hora".$horaInicio;
           $sqlRegistroEntrada= " 
                           INSERT INTO registroEntradaSalida (idAsignacionBecaInstitucional,fecha,horaInicio)  
                           VALUES(:idAsignacionBecaInstitucional,:fecha,:horaInicio);
                         ";    

   try{
           $cmd = $this->conexion->prepare($sqlRegistroEntrada);
           $cmd->bindParam(':idAsignacionBecaInstitucional', $idAsignacionBecaInstitucional);
           $cmd->bindParam(':fecha', $fecha);
           $cmd->bindParam(':horaInicio', $horaInicio);

           if($cmd->execute()){
               //echo $cmd->execute();
               return 1;   
           }else{
               return 0;
           }
   }catch(PDOException $e){
       echo 'ERROR: No se logro realizar la nueva inserción - '.$e->getMessage();
       exit();
       return 0;
   }
}//end function
public function registroSalida($idAsignacionBecaInstitucional,$horaFin,$horaInicio) 
    {
   $sqlRegistroSalida= " 
                           UPDATE registroEntradaSalida
                           SET horaFin = :horaFin,totalHora = TIMEDIFF(:horaFin,:horaInicio)
                           WHERE idAsignacionBecaInstitucional = :idBecaInstitucional;
                         ";    

   try{
           $cmd = $this->conexion->prepare($sqlRegistroSalida);
           $cmd->bindParam(':idAsignacionBecaInstitucional', $idAsignacionBecaInstitucional);
           $cmd->bindParam(':horaFin', $horaFin);
           $cmd->bindParam(':horaInicio', $horaInicio);
           if($cmd->execute()){
               echo "se hizo el update";
               return 1;   
           }else{
               echo "no se hizo el update";
               return 0;
           }
   }catch(PDOException $e){
       echo 'ERROR: No se logro realizar la nueva inserción - '.$e->getMessage();
       exit();
       return 0;
   }
   
}//end function

//public function updateSalida($idAsignacionBecaInstitucional,$horaFin)
  //  {
      

   //}
  
  }
?>