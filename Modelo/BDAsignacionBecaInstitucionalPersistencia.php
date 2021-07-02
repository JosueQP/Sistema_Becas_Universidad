<?php
	require_once("../Modelo/Conexion.php");
	class asignacionBecaInstitucional
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}
    public function AsignarBecaInstitucional($idSolicitudBecaInstitucional,$idEstudiante) 
         {
        $sqlAsignarBecaInstitucional= " 
                                INSERT INTO asignacionBecaInstitucional (idSolicitudBecaInstitucional,idEstudiante)  
                                VALUES(:idSolicitudBecaInstitucional,:idEstudiante);
                              ";    

        try{
                $cmd = $this->conexion->prepare($sqlAsignarBecaInstitucional);
                $cmd->bindParam(':idSolicitudBecaInstitucional', $idSolicitudBecaInstitucional);
                $cmd->bindParam(':idEstudiante', $idEstudiante);
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