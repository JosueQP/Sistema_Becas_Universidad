<?php
	require_once("../Modelo/Conexion.php");
	class busquedaEstudiante
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}

        public function verificarCi($ci)
        {   
            $sqlverificarCi = "SELECT * FROM estudiante WHERE ci=:ci;";
            $cmd = $this->conexion->prepare($sqlverificarCi);
             $cmd->bindParam(':ci',$ci);
            $cmd->execute();
            $verificarCi= $cmd->fetch();
            if($verificarCi){
                return $verificarCi;
            }else{
                return NULL;
            }
        }//end function
        public function verificarUsuarioEstudiante($usuario)
        {   
            $sqlverificarUsuarioEstudiante = "SELECT * FROM estudiante WHERE usuario=:usuario ;";
		            $cmd = $this->conexion->prepare($sqlverificarUsuarioEstudiante);
		            $cmd->bindParam(':usuario',$usuario);
		            $cmd->execute();
            $verificarUsuarioEstudiante= $cmd->fetch();
                        if($verificarUsuarioEstudiante){
               return $verificarUsuarioEstudiante;
            }else{
                return 0;
            }
        }

        public function verificarContraseniaEstudiante($contrasenia)
        {  
            
            $sqlverificarContraseniaEstudiante = "SELECT * FROM estudiante WHERE contrasenia=:contrasenia ;";
            $cmd = $this->conexion->prepare($sqlverificarContraseniaEstudiante);
                
                $cmd->bindParam(':contrasenia',$contrasenia);
                $cmd->execute();
                $verificarContraseniaEstudiante= $cmd->fetch();
            
            if($verificarContraseniaEstudiante){
               return $verificarContraseniaEstudiante;
            }else{
                return 0;
            }
        }
        public function rolEstudiante($usuario)
        { 
            $sqlrolEstudiante = "SELECT *,CONCAT_WS(' ',primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno) AS nombreUsuario FROM estudiante where usuario=:usuario;";
                    $cmd = $this->conexion->prepare($sqlrolEstudiante);
                    $cmd->bindParam(':usuario',$usuario);
                    $cmd->execute();
                    $rolEstudiante= $cmd->fetch();
            if($rolEstudiante){
               return $rolEstudiante;
            }else{
                return 0;
            }
        }

        public function datosEstudiante($usuario)
        {   
            $sqlDatosEstudiante = "SELECT * FROM estudiante WHERE usuario=:usuario ;";
                    $cmd = $this->conexion->prepare($sqlDatosEstudiante);
                    $cmd->bindParam(':usuario',$usuario);
                    $cmd->execute();
            $DatosEstudiante= $cmd->fetch();
                        if($DatosEstudiante){
               return $DatosEstudiante;
            }else{
                return 0;
            }
        }
        
        public function listaEstudiantesBecasGestion($idGestion)
        {   //realizando la consulta
            $sqlListaEstudianteBecasGestion = "
                SELECT g.nombre as gestion,count(e.idEstudiante) as cantEstudiantes
                from estudiante e inner join becaNoInstitucional bni
                on bni.idEstudiante= e.idEstudiante
                inner join gestion g
                on g.idGestion=bni.idGestion
                AND g.idGestion=:idGestion
                inner join tipoBeca tb
                on tb.idTipoBeca=bni.idTipoBeca
                group by g.nombre;

            ";
            $cmd = $this->conexion->prepare($sqlListaEstudianteBecasGestion);
            $cmd->bindParam(':idGestion', $idGestion);
            $cmd->execute();
            $listaEstudiantesConsulta = $cmd->fetchAll();
            return $listaEstudiantesConsulta;
        }
        public function ReporteMensual($idEstudiante)
        {   //realizando la consulta
        $sqlReporteMensual = "
                        SELECT  CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,
                        e.segundoNombre) estudiante,e.idEstudiante,g.nombre as gestion,d.nombre as departamento,a.nombre as area,pre.precio, CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,
                        p.segundoNombre) personal,abi.idAsignacionBecaInstitucional,e.codigoEstudiante
                        FROM rol r INNER JOIN personal p 
                        ON r.idRol = P.idRol
                        INNER JOIN personalDepartamento pd 
                        ON p.idPersonal = pd.idPersonal 
                        INNER JOIN departamento d 
                        ON d.idDepartamento = pd.idDepartamento
                        INNER JOIN Area a 
                        ON d.idDepartamento = a.idDepartamento
                        INNER JOIN solicitudBecaInstitucional sbi 
                        ON a.idArea = sbi.idArea
                        INNER JOIN asignacionBecaInstitucional abi 
                        ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
                        INNER JOIN  estudiante e 
                        on e.idEstudiante = abi.idEstudiante
                        AND e.idEstudiante = :idEstudiante
                        INNER JOIN gestion g 
                        ON g.idGestion = sbi.idGestion
                        INNER JOIN precio pre 
                        ON pre.idPrecio = sbi.idPrecio;

            ";
            $cmd = $this->conexion->prepare($sqlReporteMensual);
            $cmd->bindParam(':idEstudiante', $idEstudiante);
            $cmd->execute();
            $ReporteMensual = $cmd->fetch();
            return $ReporteMensual;
        }
        public function HorarioEstudiante($idEstudiante)
        {   //realizando la consulta
        $sql = "
                SELECT d.dia,CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante,ht.idHoraInicio,ht.idHoraFin
                FROM estudiante e INNER JOIN asignacionBecaInstitucional abi 
                ON e.idEstudiante = abi.idEstudiante
                AND abi.idEstudiante= :idEstudiante
                INNER JOIN solicitudBecaInstitucional sbi
                ON abi.idSolicitudBecaInstitucional = sbi.idSolicitudBecaInstitucional
                INNER JOIN horarioTrabajo ht 
                ON ht.idSolicitudBecaInstitucional=sbi.idSolicitudBecaInstitucional
                INNER JOIN dia d 
                ON d.idDia = ht.idDia;

            ";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':idEstudiante', $idEstudiante);
            $cmd->execute();
            $Horario= $cmd->fetchAll();
            return $Horario;
        }
        public function listaEstudiante()
        {
        $sqlListaEstudiante ="SELECT  idEstudiante,CONCAT_WS(' ',apellidoPaterno,apellidoMaterno,primerNombre,segundoNombre) AS nombreCompleto from estudiante ;";
         $cmd = $this->conexion->prepare($sqlListaEstudiante);
         $cmd->execute();
         $listaConsulta = $cmd->fetchAll();
        return $listaConsulta;
        }

        
        public function ReporteMes($fechaInicio,$fechaFin)
        {
            $ReporteMes = "
            select * from estudiante where fechaInicio = :fechaInicio 
            AND fechaFin= :fechaFin;
            ";
            $cmd = $this->conexion->prepare($ReporteMes);
            $cmd->bindParam(':fechaInicio', $fechaInicio);
            $cmd->bindParam(':fechaFin', $fechaFin);
            $cmd->execute();
            $estudiante = $cmd->fetch();
            return $estudiante;
        }


        public function listaEstudiantesAsignacion()
        {
        $sql ="
        call SPlistaEstudiantesAsignacion(); ";

         $cmd = $this->conexion->prepare($sql);
         $cmd->execute();
         $listaConsulta = $cmd->fetchAll();
        return $listaConsulta;
        }

        public function listaEstudiantes()
        {
        $sql ="
        call SPListaEstudiante(); ";

         $cmd = $this->conexion->prepare($sql);
         $cmd->execute();
         $listaConsulta = $cmd->fetchAll();
        return $listaConsulta;
        }

        public function listaEstudiantesNoAsignados()
        {
        $sql ="
        call SPlistaEstudiantesNoAsignados(); ";

         $cmd = $this->conexion->prepare($sql);
         $cmd->execute();
         $listaConsulta = $cmd->fetchAll();
        return $listaConsulta;
        }

        public function listaEstudiantesAsignacion1($idPersonal)
        {
        $sql ="
        SELECT abi.idAsignacionBecaInstitucional,a.nombre,CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante,e.idEstudiante,e.codigoEstudiante
        FROM personal p INNER JOIN personalDepartamento pd
        ON p.idPersonal = pd.idPersonal
          AND p.idPersonal= :idPersonal
        INNER JOIN departamento d 
        ON d.idDepartamento = pd.idDepartamento
        INNER JOIN area a 
        ON d.idDepartamento = a.idDepartamento 
        INNER JOIN solicitudBecaInstitucional sbi 
        ON a.idArea= sbi.idArea
        INNER JOIN asignacionBecaInstitucional abi
        ON abi.idSolicitudBecaInstitucional = sbi.idSolicitudBecaInstitucional
        INNER JOIN estudiante e 
        ON e.idEstudiante = abi.idSolicitudBecaInstitucional; ";

         $cmd = $this->conexion->prepare($sql);
         $cmd->bindParam(':idPersonal', $idPersonal);
         $cmd->execute();
         $listaConsulta = $cmd->fetchAll();
        return $listaConsulta;
        }
        
        public function busquedaEstudiante($nombre,$primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$ci,$activo){
            $sqlBusquedaEstudiante = " SELECT  c.nombre,CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) AS nombreCompleto,e.ci,
                                                IF(e.activo=1,'Si','No') AS activo, e.idEstudiante
                                                FROM rol r INNER JOIN estudiante e
                                                ON r.idRol = e.idrol
                                                INNER JOIN carrera c
                                                ON c.idCarrera=e.idCarrera
                                                WHERE c.nombre LIKE '%".$nombre."%' 
                                                AND e.primerNombre LIKE '%".$primerNombre."%'
                                                AND e.segundoNombre LIKE '%".$segundoNombre."%'
                                                AND e.apellidoPaterno LIKE '%".$apellidoPaterno."%'
                                                AND e.apellidoMaterno LIKE '%".$apellidoMaterno."%'
                                                AND e.ci LIKE '%".$ci."%'
                                                AND e.activo = ".$activo."
                                                GROUP BY e.idEstudiante
                                                ORDER BY e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre;";
            $cmd = $this->conexion->prepare($sqlBusquedaEstudiante);
            $cmd->execute();
            $BusquedaEstudiante = $cmd->fetchAll();
            if($BusquedaEstudiante){
                return $BusquedaEstudiante;
            }else{
                return NULL;
            }
        }

        public function buscarCI($ci)
        {   //realizando la consulta
            $datoEstudiante = "
            select * from estudiante where ci = :ci;
            ";
            $cmd = $this->conexion->prepare($datoEstudiante);
            $cmd->bindParam(':ci', $ci);
            $cmd->execute();
            $estudiante = $cmd->fetch();
            return $estudiante;
            /*if($cmd->fetch()){
                return 1;
            }
            else {
                return 0;
            }*/
        }


























    }
?>