<?php
require_once("../Modelo/Conexion.php");
class solicitudPersistencia
{
    private $conexion;

    function __construct()
    {
        $this->conexion =  new Conexion();
    }

    public function registrarSolicitud($idGestion,$idArea,$idPrecio) 
    
    {
   $sqlRegistrarSolicitud= " 
                           INSERT INTO solicitudBecaInstitucional(idGestion,idArea,idPrecio)  
                           VALUES(:idGestion,:idArea,:idPrecio);
                         ";    

   try{
           $cmd = $this->conexion->prepare($sqlRegistrarSolicitud);
           $cmd->bindParam(':idGestion', $idGestion);
           $cmd->bindParam(':idArea', $idArea);
           $cmd->bindParam(':idPrecio', $idPrecio);
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