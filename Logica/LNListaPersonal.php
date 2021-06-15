<?php
    require_once("../Modelo/BusquedaPersonal.php");

	class LNListaPersonal
	{ 
		private $objDBPersonal;


		function __construct()
		{
			$this->objDBPersonal = new personalBusqueda();
        }

		public function busquedaPersonal($primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$ci,$activo){
			$busquedaPersonal = $this->objDBPersonal->busquedaPersonal($primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$ci,$activo);
			return $busquedaPersonal;
		}
	
		
   

   

    }
?>
