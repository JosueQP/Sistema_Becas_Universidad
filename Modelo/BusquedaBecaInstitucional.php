<?php
	require_once("../Modelo/Conexion.php");
	class becaInstitucionalBusqueda
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}
    public function listaBecaInstitucional($idPersonal)
   {  
       $sqlListaBecaInstitucional = "
       SELECT  pe.idPersonal,bi.idSolicitudBecaInstitucional,a.nombre as area, p.precio,count(a.idArea) as cantidad,d.nombre
       from area a INNER JOIN solicitudBecaInstitucional bi
       ON a.idArea = bi.idArea
       INNER JOIN departamento d 
       ON d.idDepartamento=a.idDepartamento
       INNER JOIN  personalDepartamento pd 
       ON d.idDepartamento=pd.idDepartamento
       INNER JOIN Personal pe
       ON pe.idPersonal=pd.idPersonal
       AND pe.idPersonal=:idPersonal
       INNER JOIN precio p
       ON p.idPrecio=bi.idPrecio
       WHERE bi.idSolicitudBecaInstitucional NOT IN (SELECT idSolicitudBecaInstitucional FROM asignacionBecaInstitucional)
       group by a.idArea;";
       $cmd = $this->conexion->prepare($sqlListaBecaInstitucional);
       $cmd->bindParam(':idPersonal', $idPersonal);
       $cmd->execute();
       $listaConsulta = $cmd->fetchAll();
       return $listaConsulta;
   }   
   public function listaBecaInstitucionalMax()
   {
   $sqlListaBecaInstitucionalMax ="
   call SPlistaBecaInstitucionalMax();      
   ";
    $cmd = $this->conexion->prepare($sqlListaBecaInstitucionalMax);
    $cmd->execute();
    $listaConsulta = $cmd->fetchAll();
   return $listaConsulta;
   }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    }
?>