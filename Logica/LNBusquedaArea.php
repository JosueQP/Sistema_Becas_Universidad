<?php
    require_once("../Modelo/BusquedaArea.php");

	//session_start();

	class LNBusquedaArea
	{
		
		
		private $objBusquedaArea;

		public function __construct()
		{
            $this->objBusquedaArea = new BusquedaArea();
		}
        public  function LogicaListaArea(){
            $LogicaListaArea =$this->objBusquedaArea->listaAreas();
            return $LogicaListaArea;
            }
  
  
  
  
  
  
    }
?>