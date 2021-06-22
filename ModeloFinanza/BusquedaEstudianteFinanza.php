<?php
	require_once("../ModeloFinanza/ConexionFinanza.php");
	class BusquedaEstudianteFinanza
	{
		private $conexionFinanza;

		function __construct()
		{
			$this->conexionFinanza =  new ConexionFinanza();
		}
        public function EstudianteFinanza($codigoEstudiante)
 
        { 
            //echo $codigoEstudiante;
            $sql = "
            SELECT f.nombre as facultad,ca.nombre as carrera ,c.montoTotal,c.saldo,s.fecha,s.tipoPago,s.montoParcial
            FROM estudiante e INNER JOIN contrato c 
            ON c.idEstudiante = e.idEstudiante
            AND e.codigoEstudiante= :codigoEstudiante
            INNER JOIN saldo s 
            ON s.idContrato=c.idContrato
            INNER JOIN carrera ca 
            ON ca.idCarrera=c.idCarrera
            INNER JOIN facultad f 
            ON f.idFacultad=ca.idFacultad;";

                    $cmd = $this->conexionFinanza->prepare($sql);
                    $cmd->bindParam(':codigoEstudiante',$codigoEstudiante);
                    $cmd->execute();
                    $listaEstudiante= $cmd->fetchAll();
                    return $listaEstudiante;
        }
        public function EstudianteContrado($idContrato)
 
        { 
            //echo $codigoEstudiante;
            $sql = "
                SELECT f.nombre,ca.nombre,c.montoTotal,c.saldo,s.fecha,s.tipoPago,s.montoParcial,c.idContrato
                FROM estudiante e INNER JOIN contrato c 
                ON c.idEstudiante = e.idEstudiante
                AND c.idContrato = :idContrato
                INNER JOIN saldo s 
                ON s.idContrato=c.idContrato
                INNER JOIN carrera ca 
                ON ca.idCarrera=c.idCarrera
                INNER JOIN facultad f 
                ON f.idFacultad=ca.idFacultad;";

                    $cmd = $this->conexionFinanza->prepare($sql);
                    $cmd->bindParam(':idContrato',$idContrato);
                    $cmd->execute();
                    $listaEstudiante= $cmd->fetch();
            if($listaEstudiante){
               return $listaEstudiante;
            }else{
                return 0;
            }
        }

        public function DatosEstudianteSaldo($codigoEstudiante)
 
        { 
            //echo $codigoEstudiante;
            $sql = "
            SELECT f.nombre as facultad,ca.nombre as carrera ,c.montoTotal,c.saldo,s.fecha,s.tipoPago,s.montoParcial
            FROM estudiante e INNER JOIN contrato c 
            ON c.idEstudiante = e.idEstudiante
            AND e.codigoEstudiante= :codigoEstudiante
            INNER JOIN saldo s 
            ON s.idContrato=c.idContrato
            INNER JOIN carrera ca 
            ON ca.idCarrera=c.idCarrera
            INNER JOIN facultad f 
            ON f.idFacultad=ca.idFacultad;";

                    $cmd = $this->conexionFinanza->prepare($sql);
                    $cmd->bindParam(':codigoEstudiante',$codigoEstudiante);
                    $cmd->execute();
                    $listaEstudiante= $cmd->fetch();
            if($listaEstudiante){
               return $listaEstudiante;
            }else{
                return 0;
            }
        }
       
        public function updateSaldo($idContrato,$montoPagar) 
        {  // echo "Datos a actualizar:  idAsignacionBecaInstitucional ".$idAsignacionBecaInstitucional."Hora Fin:  " .$horaFin."Hora Inicio:  ".$horaInicio;
            $sqlupdateSaldo= " 
                                    UPDATE contrato
                                    SET saldo = :montoPagar 
                                    WHERE idContrato = :idContrato;
                                ";
       
                    $cmd = $this->conexionFinanza->prepare($sqlupdateSaldo);
                    $cmd->bindParam(':montoPagar', $montoPagar);
                    $cmd->bindParam(':idContrato', $idContrato);
                    $cmd->execute();
                    $enviar =$cmd->fetch();
                    return $enviar;

        }//end function

        public function InsertSaldo($idContrato,$fechaActual,$ganancia) 
        {  //echo "Datos a actualizar:  idAsignacionBecaInstitucional ".$idContrato."Hora Fin:  " .$fechaActual."Hora Inicio:  ".$ganancia;
            $sqlupdateSaldo= " 
                                 INSERT INTO saldo(idContrato,fecha,montoParcial,tipoPago)
                                 VALUES(:idContrato , :fechaActual , :ganancia, 'becaInstitucional');
                                ";
       
                    $cmd = $this->conexionFinanza->prepare($sqlupdateSaldo);
                    $cmd->bindParam(':idContrato', $idContrato);
                    $cmd->bindParam(':fechaActual', $fechaActual);
                    $cmd->bindParam(':ganancia', $ganancia);
                    $cmd->execute();
                    $enviarDatos =$cmd->fetch();
                    return $enviarDatos;

        }//end function
        
















    }

?>