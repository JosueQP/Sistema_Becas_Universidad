<?php
    require_once("../Modelo/BusquedaPrecio.php");

	//session_start();

	class LNBusquedaPrecio
	{
		
		
		private $objBusquedaPrecio;

		public function __construct()
		{
            $this->objBusquedaPrecio = new BusquedaPrecio();
		}
  
     
        public  function LogicaListaPrecio(){
            $LogicaListaPrecio =$this->objBusquedaPrecio->listaPrecio();
            return $LogicaListaPrecio;
            }
        
  
  
  
  
  
    }
?>