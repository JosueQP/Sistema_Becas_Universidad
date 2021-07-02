<?php
	require_once("../Modelo/Conexion.php");
	class busquedaCarrera
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}
    
        public function listaCarrera()
        {
        $sqlListaCarrera ="call SPlistaCarrera();";
         $cmd = $this->conexion->prepare($sqlListaCarrera);
         $cmd->execute();
         $listaConsulta = $cmd->fetchAll();
        return $listaConsulta;
       }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    }
    ?>