<?php
    require_once("../Modelo/BusquedaBecaInstitucional.php");

	//session_start();

	class LNBusquedaBecaInstitucional
	{
		
		
		private $objBusquedaBecaInstitucional;

		public function __construct()
		{
            $this->objBusquedaBecaInstitucional = new becaInstitucionalBusqueda();
		}
  
        public  function LogicaListaBecaInstitucional($idPersonal){
            $LogicaListaBecaInstitucional =$this->objBusquedaBecaInstitucional->listaBecaInstitucional($idPersonal);
            return $LogicaListaBecaInstitucional;
            }

            public  function LogicaDetalleBecaInstitucional($idSolicitudBecaInstitucional){
                $LogicaDetalleBecaInstitucional =$this->objBusquedaBecaInstitucional->detalleTrabajo($idSolicitudBecaInstitucional);
                return $LogicaDetalleBecaInstitucional;
                }
                public  function LogicaHorarioBecaInstitucional($idsolicitudBecaInstitucional){
                    $LogicaHorarioBecaInstitucional =$this->objBusquedaBecaInstitucional->HorarioSolicitud($idsolicitudBecaInstitucional);
                    return $LogicaHorarioBecaInstitucional;
                    }

           
            public  function LogicaListaBecaInstitucionalMax(){
                $LogicaListaBecaInstitucionalMax =$this->objBusquedaBecaInstitucional->listaBecaInstitucionalMax();
                return $LogicaListaBecaInstitucionalMax;
                }
  
  
  
  
  
  
    }
?>