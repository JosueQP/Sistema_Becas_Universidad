<?php
	require_once("../Modelo/Conexion.php");
	class BusquedaDia
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}
  
        public function listaDia()
        {
        $sqlListaDia ="call SPlistaDia();";
         $cmd = $this->conexion->prepare($sqlListaDia);
         $cmd->execute();
         $listaConsulta = $cmd->fetchAll();
        return $listaConsulta;
        }

















    }
?>