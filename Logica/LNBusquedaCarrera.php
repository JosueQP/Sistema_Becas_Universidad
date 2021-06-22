<?php
    require_once("../Modelo/BusquedaCarrera.php");

	//session_start();

	class LNBusquedaCarrera
	{
		
		
		private $objBusquedaCarrera;

		public function __construct()
		{
            $this->objBusquedaCarrera = new BusquedaCarrera();
		}
  
		public  function logicaListaCarrera(){
			$logicaListaCarrera =$this->objBusquedaCarrera->listaCarrera();
			return $logicaListaCarrera;
		}
  
  
  
  
  
    }
?>