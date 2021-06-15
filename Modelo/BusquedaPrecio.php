<?php
	require_once("../Modelo/Conexion.php");
	class BusquedaPrecio
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}


        public function listaPrecio()
        {
        $sqlListaPrecio ="SELECT  idPrecio,precio from precio order by precio;";
         $cmd = $this->conexion->prepare($sqlListaPrecio);
         $cmd->execute();
         $listaConsulta = $cmd->fetchAll();
        return $listaConsulta;
        }

     
     
     
     
     
     
     
     
     
        }
    ?>