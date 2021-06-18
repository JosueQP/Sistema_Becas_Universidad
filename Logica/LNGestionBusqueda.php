<?php
    require_once("../Modelo/BusquedaGestion.php");

	class LNGestionBusqueda
	{ 
		private $objGestionBusqueda;


		function __construct()
		{
			$this->objGestionBusqueda = new GestionBusqueda();
        }
  
        public  function logicaGestionActiva(){
            $gestionActiva =$this->objGestionBusqueda->gestionActiva();
            return $gestionActiva;
            }
        public  function logicaGestiones(){
            $logicaGestiones =$this->objGestionBusqueda->gestiones();
            return $logicaGestiones;
            }
            /*public  function verifica(){
                $LogicaListaGestion =$this->objGestionBusqueda->verificarEstudianteGestion();
                return $LogicaListaGestion;
                }*/
  
  
  
  
  
  
  
  
    }
?>