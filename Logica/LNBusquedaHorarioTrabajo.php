<?php
    require_once("../Modelo/BusquedaHorarioTrabajo.php");

	//session_start();

	class LNBusquedaHorarioTrabajo
	{
		
		
		private $objBusquedaHorarioTrabajo;

		public function __construct()
		{
            $this->objBusquedaHorarioTrabajo = new BusquedaHorarioTrabajo();
		}
        public  function LogicaListaHorarioTrabajo(){
            $LogicaListaHorarioTrabajo =$this->objBusquedaHorarioTrabajo->listaHorarioTrabajo();
            return $LogicaListaHorarioTrabajo;
            }
  
  
  
  
  
  
  
    }
?>