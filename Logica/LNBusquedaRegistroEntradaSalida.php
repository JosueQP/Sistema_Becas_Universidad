<?php
    require_once("../Modelo/BusquedaRegistroEntradaSalida.php");
    class LNBusquedaRegistroEntradaSalida
	{ 
		private $objBusquedaRegistroEntradaSalida;


		function __construct()
		{
			$this->objBusquedaRegistroEntradaSalida = new BusquedaRegistroEntradaSalida();
        }

    public function verifyEstudianteSalidaFechaActual($idAsignacionBecaInstitucional,$fecha){
        $listaEntradaSalidaEstudiante = $this ->objBusquedaRegistroEntradaSalida->verifyEstudianteSalidaEstudianteFechaActual($idAsignacionBecaInstitucional,$fecha);
        return $listaEntradaSalidaEstudiante;
    }
    public function ListaEntradaSalida($idAsignacionBecaInstitucional,$fechaInicio,$fechaFin){
        $ListaEntradaSalida = $this ->objBusquedaRegistroEntradaSalida->ListaEntradaSalidaIABI($idAsignacionBecaInstitucional,$fechaInicio,$fechaFin);
        return $ListaEntradaSalida;
    }
    public function ListaEntradaSalidaSaldo($idAsignacionBecaInstitucional,$fechaInicio,$fechaFin){
        $ListaEntradaSalidaSaldo = $this ->objBusquedaRegistroEntradaSalida->ListaEntradaSalidaSaldoTotal($idAsignacionBecaInstitucional,$fechaInicio,$fechaFin);
        return $ListaEntradaSalidaSaldo;
    }

    
    public function ListaReporteDiario($idAsignacionBecaInstitucional,$fecha){
        $ListaReporteDiario = $this ->objBusquedaRegistroEntradaSalida->ListaFecha($idAsignacionBecaInstitucional,$fecha);
        return $ListaReporteDiario;
    }
    public function ListaReporteDiarioDetalle($idAsignacionBecaInstitucional,$fecha){
        $ListaReporteDiarioDetalle = $this ->objBusquedaRegistroEntradaSalida->ListaFechaDetalle($idAsignacionBecaInstitucional,$fecha);
        return $ListaReporteDiarioDetalle;
    }
    
}
?>