<?php
    require_once("../Modelo/Conexion.php");
    class BusquedaRegistroEntradaSalida
    {
        private $conexion;

        function __construct()
        {
            $this->conexion =  new Conexion();
        }

        public function verifyEstudianteSalidaEstudianteFechaActual($idAsignacionBecaInstitucional, $fecha){
         //echo "idAsignacion".$idAsignacionBecaInstitucional, $fecha;
          $sqlVerificarFecha=" 
          SELECT idRegitroEntradaSalida,idAsignacionBecaInstitucional,fecha,horaInicio,horaFin,totalHora
          FROM registroEntradaSalida
          WHERE idAsignacionBecaInstitucional = :idAsignacionBecaInstitucional
          AND fecha = :fecha
          AND horaFin is NULL;
        "; 
                $cmd = $this->conexion->prepare($sqlVerificarFecha);
                 $cmd->bindParam(':idAsignacionBecaInstitucional', $idAsignacionBecaInstitucional);
                 $cmd->bindParam(':fecha', $fecha);
                 $cmd->execute();
                 $validado=$cmd->fetch();
                 //var_dump ($validado);
                 return $validado;
                  
      }

      public function ListaEntradaSalidaIABI($idAsignacionBecaInstitucional,$fechaInicio,$fechaFin){
        //echo "valor asignacion Beca Institucional".$idAsignacionBecaInstitucional."fechaIinicio".$fechaInicio."fecha Fin".$fechaFin;
         $sql=" 
         SELECT res.fecha,res.idAsignacionBecaInstitucional,(res.totalHora*pre.precio) as Total
         FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
         ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
         AND res.fecha BETWEEN :fechaInicio  AND  :fechaFin
         AND res.idAsignacionBecaInstitucional= :idAsignacionBecaInstitucional
         INNER JOIN solicitudBecaInstitucional sbi 
         ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
         INNER JOIN precio pre 
         ON pre.idPrecio = sbi.idPrecio ;
       "; 
               $cmd = $this->conexion->prepare($sql);
                $cmd->bindParam(':idAsignacionBecaInstitucional', $idAsignacionBecaInstitucional);
                $cmd->bindParam(':fechaInicio', $fechaInicio);
                $cmd->bindParam(':fechaFin', $fechaFin);
                $cmd->execute();
                $Lista=$cmd->fetchAll();
                //var_dump ($Lista);
                return $Lista;
                 
     }
     public function ListaEntradaSalidaSaldoTotal($idAsignacionBecaInstitucional,$fechaInicio,$fechaFin){
      //echo "valor asignacion Beca Institucional".$idAsignacionBecaInstitucional."fechaIinicio".$fechaInicio."fecha Fin".$fechaFin;
       $sql=" 
       SELECT res.fecha,res.idAsignacionBecaInstitucional,Sum(res.totalHora*pre.precio) as pago
       FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
       ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
       AND res.fecha BETWEEN :fechaInicio  AND  :fechaFin
       AND res.idAsignacionBecaInstitucional= :idAsignacionBecaInstitucional
       INNER JOIN solicitudBecaInstitucional sbi 
       ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
       INNER JOIN precio pre 
       ON pre.idPrecio = sbi.idPrecio ;
     "; 
             $cmd = $this->conexion->prepare($sql);
              $cmd->bindParam(':idAsignacionBecaInstitucional', $idAsignacionBecaInstitucional);
              $cmd->bindParam(':fechaInicio', $fechaInicio);
              $cmd->bindParam(':fechaFin', $fechaFin);
              $cmd->execute();
              $Lista=$cmd->fetch();
              //var_dump ($Lista);
              return $Lista;
               
   }
     public function ListaFecha($idAsignacionBecaInstitucional,$fecha){
       // echo "valor asignacion Beca Institucional".$idAsignacionBecaInstitucional."fechaIinicio".$fechaInicio."fecha Fin".$fechaFin;
         $sql=" 
         SELECT CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante,
         dep.nombre as departamento,a.nombre as area,res.fecha,res.horaInicio,res.horaFin,(res.totalHora*pre.precio) as Total,res.totalHora,
         res.fecha
         FROM gestion g INNER JOIN solicitudBecaInstitucional sbi
         ON g.idgestion = sbi.idgestion
         INNER JOIN asignacionBecaInstitucional abi 
         ON abi.idSolicitudBecaInstitucional = sbi.idSolicitudBecaInstitucional
         AND abi.idAsignacionBecaInstitucional= :idAsignacionBecaInstitucional
         INNER JOIN  estudiante e 
         ON e.idEstudiante = abi.idEstudiante
         INNER JOIN area a 
         ON sbi.idArea = a.idArea
         INNER JOIN departamento dep 
         ON a.idDepartamento = dep.idDepartamento
         INNER JOIN registroEntradaSalida res
         ON abi.idAsignacionBecaInstitucional= res.idAsignacionBecaInstitucional
         AND res.fecha= :fecha
         INNER JOIN precio pre 
         ON pre.idPrecio = sbi.idPrecio; 
       
       "; 
               $cmd = $this->conexion->prepare($sql);
                $cmd->bindParam(':idAsignacionBecaInstitucional', $idAsignacionBecaInstitucional);
                $cmd->bindParam(':fecha', $fecha);
                $cmd->execute();
                $Lista=$cmd->fetchAll();
                var_dump ($Lista);
                return $Lista;
                 
     }
     public function ListaFechaDetalle($idAsignacionBecaInstitucional,$fecha){
      // echo "valor asignacion Beca Institucional".$idAsignacionBecaInstitucional."fechaIinicio".$fechaInicio."fecha Fin".$fechaFin;
        $sql=" 
        SELECT CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante,
        dep.nombre as departamento,a.nombre as area,res.fecha,res.horaInicio,res.horaFin,(res.totalHora*pre.precio) as Total,
        g.nombre as gestion
        FROM gestion g INNER JOIN solicitudBecaInstitucional sbi
        ON g.idgestion = sbi.idgestion
        INNER JOIN asignacionBecaInstitucional abi 
        ON abi.idSolicitudBecaInstitucional = sbi.idSolicitudBecaInstitucional
        AND abi.idAsignacionBecaInstitucional= :idAsignacionBecaInstitucional
        INNER JOIN  estudiante e 
        ON e.idEstudiante = abi.idEstudiante
        INNER JOIN area a 
        ON sbi.idArea = a.idArea
        INNER JOIN departamento dep 
        ON a.idDepartamento = dep.idDepartamento
        INNER JOIN registroEntradaSalida res
        ON abi.idAsignacionBecaInstitucional= res.idAsignacionBecaInstitucional
        AND res.fecha= :fecha
        INNER JOIN precio pre 
        ON pre.idPrecio = sbi.idPrecio; 
      
      "; 
              $cmd = $this->conexion->prepare($sql);
               $cmd->bindParam(':idAsignacionBecaInstitucional', $idAsignacionBecaInstitucional);
               $cmd->bindParam(':fecha', $fecha);
               $cmd->execute();
               $Lista=$cmd->fetch();
               //var_dump ($validado);
               return $Lista;
                
    }



}
?>