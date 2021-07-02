<?php
	require_once("../Modelo/Conexion.php");
	class busquedaHorarioTrabajo
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}

        public function listaHorarioTrabajo()
        {
        $sqlListaHorarioTrabajo ="call SPlistaHorarioTrabajo();";
         $cmd = $this->conexion->prepare($sqlListaHorarioTrabajo);
         $cmd->execute();
         $listaConsulta = $cmd->fetch();
        return $listaConsulta;
        }



















    }
?>