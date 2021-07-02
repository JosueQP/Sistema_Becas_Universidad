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
public function registroSalida($idRegistroEntradaSalida,$horaFin) 
{   //echo "Datos a actualizar:  idAsignacionBecaInstitucional ".$idAsignacionBecaInstitucional."Hora Fin:  " .$horaFin."Hora Inicio:  ".$horaInicio;
    $sqlRegistroSalida= " 
                            UPDATE registroEntradaSalida
                            SET horaFin = :horaFin 
                            WHERE idRegistroEntradaSalida = :idRegistroEntradaSalida;
                        ";
    try{
            $cmd = $this->conexion->prepare($sqlRegistroSalida);
            $cmd->bindParam(':idRegistroEntradaSalida', $idRegistroEntradaSalida);
            $cmd->bindParam(':horaFin', $horaFin);
            if($cmd->execute()){
                echo "se hizo el update";
                return 1;   
            }else{
                return 0;
                echo "No se hizo el update";
            }
    }catch(PDOException $e){
        echo 'ERROR: No se logro realizar la actualización - '.$e->getMessage();
        exit();
        return 0;
    }
}//end function

public function MDLverificarFechaEntradaSalida($idAsignacionBecaInstitucional, $fechaActual){
    $sqlVerificarFecha=" 
        select fecha,idasignacionbecainstitucional,horaInicio,horaFin 
        from registroentradasalida 
        where fecha=:fechaActual and idAsignacionBecaInstitucional=:idAsignacionBecaInstitucional;
        "; 
    $cmd = $this->conexion->prepare($sqlVerificarFecha);
            $cmd->bindParam(':idAsignacionBecaInstitucional', $idAsignacionBecaInstitucional);
            $cmd->bindParam(':fechaActual', $fechaActual);
            $cmd->execute();
            $validado=$cmd->fetchAll();
            return $validado;
}//endfunction
public function actualizarTotalHoras($idRegistroEntradaSalida,$horas){
    $sqlRegistroSalida= " 
    UPDATE registroEntradaSalida
    SET totalHora = :totalHora 
    WHERE idRegistroEntradaSalida = :idRegistroEntradaSalida;
                ";
        try{
        $cmd = $this->conexion->prepare($sqlRegistroSalida);
        $cmd->bindParam(':idRegistroEntradaSalida', $idRegistroEntradaSalida);
        $cmd->bindParam(':totalHora', $horas);
        if($cmd->execute()){
        echo "se hizo el update";
        return 1;   
        }else{
        return 0;
        echo "No se hizo el update";
        }
        }catch(PDOException $e){
        echo 'ERROR: No se logro realizar la actualización - '.$e->getMessage();
        exit();
        return 0;
        }
}







  }
?>