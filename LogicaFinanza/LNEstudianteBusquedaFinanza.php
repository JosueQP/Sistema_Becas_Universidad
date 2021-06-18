<?php
    require_once("../ModeloFinanza/BusquedaEstudianteFinanza.php");

	//session_start();

	class LNBusquedaEstudianteFinanza
	{
		
		
		private $objBusquedaEstudianteFinanza;

		public function __construct()
		{
            $this->objBusquedaEstudianteFinanza = new BusquedaEstudianteFinanza();
		}

        public function EstadoCuenta($codigoEstudiante)
		{   
			$EstadoCuenta = $this->objBusquedaEstudianteFinanza->EstudianteFinanza($codigoEstudiante);

			return $EstadoCuenta;
		}
        public function EstadoCuentaEstudiante($codigoEstudiante)
		{   
			$EstadoCuentaEstudiante = $this->objBusquedaEstudianteFinanza->DatosEstudianteSaldo($codigoEstudiante);

			return $EstadoCuentaEstudiante;
		}

		public function actualizarSaldo($idContrato,$montoPagar)
		{   
			$actualizarSaldo = $this->objBusquedaEstudianteFinanza->updateSaldo($idContrato,$montoPagar);

			return $actualizarSaldo;
		}
		public function InsertarSaldo($idContrato,$fechaActual,$ganancia)
		{   
			$InsertarSaldo = $this->objBusquedaEstudianteFinanza->InsertSaldo($idContrato,$fechaActual,$ganancia);

			return $InsertarSaldo;
		}

		public function contratoEstudiante($idContrato)
		{   
			$contratoEstudiante = $this->objBusquedaEstudianteFinanza->EstudianteContrado($idContrato);

			return $contratoEstudiante;
		}








    }
?>