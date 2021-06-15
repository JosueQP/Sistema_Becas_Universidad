<?php
	require_once("../Modelo/Conexion.php");
	class personalPersistencia
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}

	
    public function registrarPersonal($idRol,$ci,$primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$usuario,$contrasenia,$activo) 
         {
        $sqlRegistrarPersonal= " 
                                INSERT INTO personal(idRol,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,usuario,contrasenia,activo)  
                                VALUES (:idRol,:ci,:primerNombre,:segundoNombre,:apellidoPaterno,:apellidoMaterno,:usuario,
                                :contrasenia,:activo);
                              ";    

        try{
                $cmd = $this->conexion->prepare($sqlRegistrarPersonal);
                $cmd->bindParam(':idRol', $idRol);
                $cmd->bindParam(':ci', $ci);
                $cmd->bindParam(':primerNombre', $primerNombre);
                $cmd->bindParam(':segundoNombre', $segundoNombre);
                $cmd->bindParam(':apellidoPaterno', $apellidoPaterno);
                $cmd->bindParam(':apellidoMaterno', $apellidoMaterno);
                $cmd->bindParam(':usuario', $usuario);
                $cmd->bindParam(':contrasenia', $contrasenia);
                 $cmd->bindParam(':activo', $activo);
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

