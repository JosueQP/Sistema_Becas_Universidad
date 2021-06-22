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
            public  function logicaGestionActiva1(){
                $logicaGestionActiva1 =$this->objGestionBusqueda->gestionActiva1();
                return $logicaGestionActiva1;
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