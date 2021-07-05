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

   public function detalleTrabajo($idSolicitudBecaInstitucional)
   {  
       $sql = "
       SELECT  CONCAT_WS(' ',pe.apellidoPaterno,pe.apellidoMaterno,pe.primerNombre,pe.segundoNombre) personal,bi.idSolicitudBecaInstitucional,a.nombre as area, p.precio,d.nombre
       from area a INNER JOIN solicitudBecaInstitucional bi
       ON a.idArea = bi.idArea
       AND bi.idSolicitudBecaInstitucional= :idSolicitudBecaInstitucional
       INNER JOIN departamento d 
       ON d.idDepartamento=a.idDepartamento
       INNER JOIN  personalDepartamento pd 
       ON d.idDepartamento=pd.idDepartamento
       INNER JOIN Personal pe
       ON pe.idPersonal=pd.idPersonal
       INNER JOIN precio p
       ON p.idPrecio=bi.idPrecio; ";
       $cmd = $this->conexion->prepare($sql);
       $cmd->bindParam(':idSolicitudBecaInstitucional', $idSolicitudBecaInstitucional);
       $cmd->execute();
       $listaConsulta = $cmd->fetch();
       return $listaConsulta;
   }   
   public function HorarioSolicitud($idSolicitudBecaInstitucional)
        {   //realizando la consulta
        $sql = "
        SELECT   d.dia,ht.idHoraInicio,ht.idHoraFin
        from area a INNER JOIN solicitudBecaInstitucional bi
        ON a.idArea = bi.idArea
        AND bi.idSolicitudBecaInstitucional= :idSolicitudBecaInstitucional
        INNER JOIN horarioTrabajo ht 
        ON ht.idSolicitudBecaInstitucional=bi.idSolicitudBecaInstitucional
        INNER JOIN dia d 
        ON d.idDia = ht.idDia;

            ";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':idSolicitudBecaInstitucional', $idSolicitudBecaInstitucional);
            $cmd->execute();
            $Horario= $cmd->fetchAll();
            return $Horario;
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