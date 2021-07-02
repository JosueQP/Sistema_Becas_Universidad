<?php
	require_once("../Modelo/Conexion.php");
	class horarioTrabajoPersistencia
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}
     public function registrarHorario($idSolicitudBecaInstitucional,$idDia,$idHoraInicio,$idHoraFin) 
         {
        $sqlRegistrarHorario= " 
                                INSERT INTO horarioTrabajo (idSolicitudBecaInstitucional,idDia,idHoraInicio,idHoraFin)  
                                VALUES(:idSolicitudBecaInstitucional,:idDia,:idHoraInicio,:idHoraFin);
                              ";    

        try{
                $cmd = $this->conexion->prepare($sqlRegistrarHorario);
                $cmd->bindParam(':idSolicitudBecaInstitucional', $idSolicitudBecaInstitucional);
                $cmd->bindParam(':idDia', $idDia);
                $cmd->bindParam(':idHoraInicio', $idHoraInicio);
                $cmd->bindParam(':idHoraFin', $idHoraFin);
                if($cmd->execute()){
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
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    }


?>