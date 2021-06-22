<?php
	require_once("../Modelo/Conexion.php");
	class GestionBusqueda
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}
        public function gestionActiva()
        {   //realizando la consulta
            $datoGestion = "
            select * from gestion where activo=1;
            ";
            $cmd = $this->conexion->prepare($datoGestion);
            $cmd->execute();
            $gestion = $cmd->fetch();
            //var_dump  ($gestion);
            return $gestion;
        }
        public function gestionActiva1()
        {   //realizando la consulta
            $datoGestion = "
            select * from gestion where activo=1;
            ";
            $cmd = $this->conexion->prepare($datoGestion);
            $cmd->execute();
            $gestion = $cmd->fetchAll();
            //var_dump  ($gestion);
            return $gestion;
        }

        public function Gestiones()
        {   //realizando la consulta
            $datoGestion = "
            select * from gestion ORDER BY idGestion Desc;
            ";
            $cmd = $this->conexion->prepare($datoGestion);
            $cmd->execute();
            $gestion = $cmd->fetchAll();
            //var_dump  ($gestion);
            return $gestion;
        }
        public function verificarEstudianteGestion($idGestion,$idEstudiante){
           
                $VerificarEstudianteGestionsql="
                SELECT g.nombre,d.nombre Departamento, a.nombre Area,
                CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante, 
                e.idEstudiante,e.ci,abi.idAsignacionBecaInstitucional
                FROM gestion g
                INNER JOIN solicitudBecaInstitucional sbi
                ON g.idGestion = sbi.idGestion
                AND g.idGestion = :idGestion
                INNER JOIN asignacionBecaInstitucional abi 
                ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
                INNER JOIN estudiante e
                ON abi.idEstudiante = e.idEstudiante
                AND e.idEstudiante = :idEstudiante
                INNER JOIN area a 
                ON sbi.idArea = a.idArea 
                INNER JOIN departamento d 
                ON a.idDepartamento = d.idDepartamento;
                " ;
            //var_dump ($VerificarEstudianteGestionsql);
            $cmd = $this->conexion->prepare($VerificarEstudianteGestionsql);
            $cmd->bindParam(':idGestion',$idGestion);
            $cmd->bindParam(':idEstudiante',$idEstudiante);
            $cmd->execute();
            //var_dump ($cmd);
            $validado = $cmd->fetch();  
                //var_dump ($validado);
                    return $validado;
                    }

















    }
?>