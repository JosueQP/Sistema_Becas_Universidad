<?php
    require_once("../Modelo/BusquedaDia.php");

	//session_start();

	class LNBusquedaDia
	{
		
		
		private $objBusquedaDia;

		public function __construct()
		{
            $this->objBusquedaDia = new BusquedaDia();
		}
  
        public  function LogicaListaDia(){
            $LogicaListaDia =$this->objBusquedaDia->listaDia();
            return $LogicaListaDia;
            }
  
  
  
  
  
  
    }
?>