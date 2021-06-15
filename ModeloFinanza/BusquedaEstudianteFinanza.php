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
       


















    }

?>