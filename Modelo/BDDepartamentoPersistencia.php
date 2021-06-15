<?php
	require_once("../Modelo/Conexion.php");
	class departamentoPersistencia
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}
    
        public function registrarPersonalDepartamento($idGestion,$idDepartamento,$idPersonal) 
        {
       $sqlRegistrarPersonalDepartamento= " 
                               INSERT INTO personalDepartamento(idGestion,idDepartamento,idPersonal)  
                               VALUES(:idGestion,:idDepartamento,:idPersonal);
                             ";    

       try{
               $cmd = $this->conexion->prepare($sqlRegistrarPersonalDepartamento);
               $cmd->bindParam(':idGestion', $idGestion);
               $cmd->bindParam(':idDepartamento', $idDepartamento);
               $cmd->bindParam(':idPersonal', $idPersonal);
              
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