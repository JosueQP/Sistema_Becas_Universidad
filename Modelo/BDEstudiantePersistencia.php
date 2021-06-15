<?php
	require_once("../Modelo/Conexion.php");
	class estudiantePersistencia
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}

        public function registrarEstudiante($idCarrera,$idRol,$codigoEstudiante,$ci,$primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$genero,$fechaNacimiento,$usuario,$contrasenia,$activo) 
            {
            $sqlRegistrarEstudiante= " 
                               INSERT INTO estudiante(idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,genero,fechaNacimiento,usuario,contrasenia,activo)  
                               VALUES (:idCarrera,:idRol,:codigoEstudiante,:ci,:primerNombre,:segundoNombre,:apellidoPaterno,:apellidoMaterno,:genero,:fechaNacimiento,
                               :usuario,:contrasenia,:activo);
                             ";    

       try{
               $cmd = $this->conexion->prepare($sqlRegistrarEstudiante);
                $cmd->bindParam(':idCarrera', $idRol);
               $cmd->bindParam(':idRol', $idRol);
                $cmd->bindParam(':codigoEstudiante', $codigoEstudiante);
               $cmd->bindParam(':ci', $ci);
               $cmd->bindParam(':primerNombre', $primerNombre);
               $cmd->bindParam(':segundoNombre', $segundoNombre);
               $cmd->bindParam(':apellidoPaterno', $apellidoPaterno);
               $cmd->bindParam(':apellidoMaterno', $apellidoMaterno);
                $cmd->bindParam(':genero', $genero);
               $cmd->bindParam(':fechaNacimiento', $fechaNacimiento);
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
    
    
    
    
    
    }//end class
?>
    