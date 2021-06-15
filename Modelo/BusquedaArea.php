<?php
	require_once("../Modelo/Conexion.php");
	class BusquedaArea
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}


            public function listaAreas()
            {
            $sqlListaArea ="SELECT  idArea,nombre from area order by nombre;";
            $cmd = $this->conexion->prepare($sqlListaArea);
            $cmd->execute();
            $listaConsulta = $cmd->fetchAll();
            return $listaConsulta;
            }


     
     
     
     
     
     
     
     
     
        }
    ?>