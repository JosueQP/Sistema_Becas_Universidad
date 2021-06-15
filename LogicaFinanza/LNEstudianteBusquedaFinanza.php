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








    }
?>