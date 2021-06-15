<?php
	require_once("../Modelo/Conexion.php");
	class busquedaHorarioTrabajo
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}

        public function listaHorarioTrabajo()
        {
        $sqlListaHorarioTrabajo ="SELECT  bi.idSolicitudBecaInstitucional,a.nombre as nombreArea ,g.nombre as nombreGestion,p.precio as precio
                                    FROM solicitudBecainstitucional bi INNER JOIN area a 
                                     ON bi.idArea = a.idArea 
                                     INNER join gestion g 
                                     on bi.idGestion=g.idGestion
                                     INNER JOIN precio p
                                     on bi.idPrecio=p.idPrecio
                                     WHERE idSolicitudBecaInstitucional = (SELECT MAX(idSolicitudBecaInstitucional) as maxid FROM solicitudBecainstitucional);";
         $cmd = $this->conexion->prepare($sqlListaHorarioTrabajo);
         $cmd->execute();
         $listaConsulta = $cmd->fetch();
        return $listaConsulta;
        }



















    }
?>