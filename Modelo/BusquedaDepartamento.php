<?php
	require_once("../Modelo/Conexion.php");
	class busquedaDepartamento
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}

        public function listaDepartamento()
        {
        $sqlListaDepartamento ="SELECT  idDepartamento,nombre from departamento ;";
         $cmd = $this->conexion->prepare($sqlListaDepartamento);
         $cmd->execute();
         $listaConsulta = $cmd->fetchAll();
        return $listaConsulta;
        }
        public function listaDepartamentoArea($idDepartamento)
        {
        $sqllistaDepartamentoArea =" SELECT  d.nombre, a.nombre
                                FROM departamento d inner join area a
                                on a.idDepartamento=d.idDepartamento
                                and d.idDepartamento=:idDepartamento;";
         $cmd = $this->conexion->prepare($sqllistaDepartamentoArea);
         $cmd->bindParam(':idDepartamento', $idDepartamento);
         $cmd->execute();
         $listaConsulta = $cmd->fetchAll();
        return $listaConsulta;
        }
       
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    }
    ?>