<?php
	require_once("../Modelo/Conexion.php");
	class personalBusqueda
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}

	
     
           public function verificarUsuarioPersonal($usuario)
        {   
            $sqlverificarUsuarioPersonal = "SELECT *,CONCAT_WS(' ',primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno) AS nombreUsuario FROM personal where usuario=:usuario;";
                    $cmd = $this->conexion->prepare($sqlverificarUsuarioPersonal);
                    $cmd->bindParam(':usuario',$usuario);
                    $cmd->execute();
            $verificarUsuarioPersonal= $cmd->fetch();
            if($verificarUsuarioPersonal){
                echo "usuario llego";
               return $verificarUsuarioPersonal;
            }else{
                return 0;
            }
        }
        public function verificarContraseniaPersonal($contrasenia)
        {  
            //echo $contrasenia;              
            $sqlverificarContraseniaPersonal = " SELECT * FROM personal WHERE contrasenia=:contrasenia ;";
            $cmd = $this->conexion->prepare($sqlverificarContraseniaPersonal);
                
                $cmd->bindParam(':contrasenia',$contrasenia);
                $cmd->execute();
                $verificarContraseniaPersonal= $cmd->fetch();
            
            if($verificarContraseniaPersonal){
                echo "contrasenia llego";
               return 1;
            }else{
                return 0;
            }
        }
               

       
    public function rolPersonal($usuario)
        { 
            $sqlrolPersonal = "
            SELECT *,CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) AS nombreUsuario,p.idPersonal,d.nombre as departamento,d.idDepartamento
            FROM departamento d inner join personalDepartamento dp
            on dp.idDepartamento = d.idDepartamento
            INNER JOIN personal p
            on dp.idPersonal=p.idPersonal
            and p.usuario=:usuario
            inner join area a
            on a.idDepartamento=d.idDepartamento
            ;";
                    $cmd = $this->conexion->prepare($sqlrolPersonal);
                    $cmd->bindParam(':usuario',$usuario);
                    $cmd->execute();
                    $rolPersonal= $cmd->fetch();
            if($rolPersonal){
               return $rolPersonal;
            }else{
                return 0;
            }
        }
    
        public function verificarCi($ci)
        {   
            $sqlverificarCi = "SELECT * FROM personal WHERE ci=:ci;";
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
      
           public function datosPersonal($usuario)
        {   
            $sqlDatosPersonal = "SELECT * FROM personal WHERE usuario=:usuario ;";
                    $cmd = $this->conexion->prepare($sqlDatosPersonal);
                    $cmd->bindParam(':usuario',$usuario);
                    $cmd->execute();
            $DatosPersonal= $cmd->fetch();
                        if($DatosPersonal){
               return $DatosPersonal;
            }else{
                return 0;
            }
        }
        public function listaPersonal(){
            $sqlListaPersonal = "SELECT * idPersonal FROM personal;";
            $cmd = $this->conexion->prepare($sqlListaPersonal);
            $cmd->execute();
            $listaPersonal = $cmd->fetchAll();
            if($listaPersonal){
                return $listaPersonal;
            }else{
                return NULL;
            }
        }
       
        
        public function listaPersonalBusqueda($fecha)
        {   //realizando la consulta
            $sqlListaPersonalBusqueda = "
            SELECT re.horaInicio,re.horaFin,re.totalhora,CONCAT_WS(' ',e.primerNombre,e.segundoNombre,e.apellidoPaterno,e.apellidoMaterno) AS nombreCompleto
            FROM gestion g INNER JOIN becaInstitucional bi
            ON g.idGestion=bi.idGestion
            INNER JOIN asignacionBecaInstitucional abi
            ON bi.idBecaInstitucional=abi.idBecaInstitucional
            INNER JOIN estudiante e 
            ON e.idEstudiante=abi.idEstudiante
            INNER JOIN registroEntradaSalida re 
            ON abi.idAsignacionBecaInstitucional=re.idAsignacionBecaInstitucional
            and re.fecha=:fecha;

            ";
            $cmd = $this->conexion->prepare($sqlListaPersonalBusqueda);
            $cmd->bindParam(':fecha', $fecha);
            $cmd->execute();
            $listaPersonalBusqueda = $cmd->fetchAll();
            return $listaPersonalBusqueda;
        }
         public function listaReporte2($idGestion)
        {  
            $sqlListaReporte2 = "
                SELECT  g.nombre as gestion  ,tb.nombre as tipoBeca ,count(e.idEstudiante)   as  estudiante 
                from carrera c inner join estudiante e 
                on e.idCarrera =c.idCarrera
                inner JOIN  becaNoInstitucional bni 
                on e.idEstudiante=bni.idEstudiante
                inner join gestion g
                on g.idGestion =bni.idGestion
                AND g.idGestion=:idGestion
                inner join tipoBeca tb
                on tb.idTipoBeca=bni.idTipoBeca
                group by  g.idGestion
                having count(e.idEstudiante)>=2;

            ";
            $cmd = $this->conexion->prepare($sqlListaReporte2);
            $cmd->bindParam(':idGestion', $idGestion);
            $cmd->execute();
            $listaReporte1Consulta = $cmd->fetchAll();
            return $listaReporte1Consulta;
        }   

     

            public function datoPersonal($idPersonal)
            {
            $sqlDatoPersonal ="     SELECT  CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) AS nombreCompleto,d.nombre as departamento,a.nombre
                                    FROM departamento d inner join personalDepartamento dp
                                    on dp.idDepartamento = d.idDepartamento
                                    INNER JOIN personal p
                                    on dp.idPersonal=p.idPersonal
                                    inner join area a
                                    on a.idDepartamento=d.idDepartamento
                                    and dp.idPersonal=:idPersonal;";
            $cmd = $this->conexion->prepare($sqlDatoPersonal);
            $cmd->bindParam(':idPersonal', $idPersonal);
            $cmd->execute();
            $listaConsulta = $cmd->fetch();
            return $listaConsulta;
            }
            public function listaHorarioTrabajo()
            {
            $sqlListaHorarioTrabajo ="SELECT  a.nombre as nombreArea ,g.nombre as nombreGestion,p.precio as precio
                                        FROM becainstitucional bi INNER JOIN area a 
                                         ON bi.idArea = a.idArea 
                                         INNER join gestion g 
                                         on bi.idGestion=g.idGestion
                                         INNER JOIN precio p
                                         on bi.idPrecio=p.idPrecio
                                         WHERE idBecaInstitucional = (SELECT MAX(idBecaInstitucional) as maxid FROM becainstitucional);";
             $cmd = $this->conexion->prepare($sqlListaHorarioTrabajo);
             $cmd->execute();
             $listaConsulta = $cmd->fetch();
            return $listaConsulta;
            }
   

  
   
    public function listaRol()
    {
    $sqlListaRol ="SELECT  * from rol where idRol !=3 ;";
     $cmd = $this->conexion->prepare($sqlListaRol);
     $cmd->execute();
     $listaConsulta = $cmd->fetchAll();
    return $listaConsulta;
    }
   

    public function listaPersonalU()
    {
    $sqlListaPersonalU =" SELECT CONCAT_WS(' ',apellidoPaterno,apellidoMaterno,primerNombre,segundoNombre) AS nombreCompleto,idPersonal
                            FROM personal
                            WHERE idPersonal = (SELECT MAX(idPersonal) as maxid FROM personal);";
     $cmd = $this->conexion->prepare($sqlListaPersonalU);
     $cmd->execute();
     $listaConsulta = $cmd->fetch();
    return $listaConsulta;
    }

public function busquedaPersonal($primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$ci,$activo){
        $sqlBusquedaPersonal = "SELECT  CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) AS nombreCompleto,p.ci,
                            IF(p.activo=1,'Si','No') AS activo, p.idPersonal
                            FROM rol r INNER JOIN personal p
                            ON r.idRol = p.idrol
                            WHERE p.primerNombre LIKE '%".$primerNombre."%'
                            AND p.segundoNombre LIKE '%".$segundoNombre."%'
                            AND p.apellidoPaterno LIKE '%".$apellidoPaterno."%'
                            AND p.apellidoMaterno LIKE '%".$apellidoMaterno."%'
                            AND p.ci LIKE '%".$ci."%'
                            AND p.activo = ".$activo."
                            GROUP BY p.idPersonal
                            ORDER BY p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre;";
        $cmd = $this->conexion->prepare($sqlBusquedaPersonal);
        $cmd->execute();
        $BusquedaPersonal = $cmd->fetchAll();
        if($BusquedaPersonal){
            return $BusquedaPersonal;
        }else{
            return NULL;
        }
    }

    public function listaBecaInstitucional($idPersonal)
    {  
        $sqlListaBecaInstitucional = "
        SELECT  bi.idSolicitudBecaInstitucional,a.nombre as area, p.precio,count(a.idArea) as cantidad,d.nombre
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



    }
?>