<?php
	require_once("../Modelo/Conexion.php");
	class BusquedaArea
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}


            public function listaAreas($idPersonal)
            {
            $sqlListaArea ="  
            SELECT a.nombre,a.idArea
            FROM personal p INNER JOIN personalDepartamento pd
            ON p.idPersonal = pd.idPersonal
              AND p.idPersonal=:idPersonal
            INNER JOIN departamento d 
            ON d.idDepartamento = pd.idDepartamento
            INNER JOIN area a 
            ON d.idDepartamento = a.idDepartamento ;";
            $cmd = $this->conexion->prepare($sqlListaArea);
            $cmd->bindParam(':idPersonal', $idPersonal);
            $cmd->execute();
            $listaConsulta = $cmd->fetchAll();
            return $listaConsulta;
            }


     
     
     
     
     
     
     
     
     
        }
    ?>