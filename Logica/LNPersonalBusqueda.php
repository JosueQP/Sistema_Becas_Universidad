<?php
    require_once("../Modelo/BusquedaPersonal.php");

	//session_start();

	class LNPersonalBusqueda
	{
		
		
		private $objPersonalBusqueda;

		public function __construct()
		{
            $this->objPersonalBusqueda = new personalBusqueda();
		}

		public function verificarUsuarioPersonal($usuario)
		{   
			$verificarUsuarioPersonal = $this->objPersonalBusqueda->verificarUsuarioPersonal($usuario);

			return $verificarUsuarioPersonal;
		}
		
		public function verificarContraseniaPersonal($contrasenia)
		{   
			
			$verificarContraseniaPersonal = $this->objPersonalBusqueda->verificarContraseniaPersonal($contrasenia);
			

			return $verificarContraseniaPersonal;
		}

		public function rolPersonal($usuario)
		{   
			$rolPersonal = $this->objPersonalBusqueda->rolPersonal($usuario);

			return $rolPersonal;
		}
		
		public function listaEstudiantesBecasGestion($idGestion)
		{   $listaEstudiantes = $this->objPersonalBusqueda->listaEstudiantesBecasGestion($idGestion);
			return $listaEstudiantes;
		}//end function

		public function listaReporte2($idGestion)
		{   $listaReporte2 = $this->objPersonalBusqueda->listaReporte2($idGestion);
			return $listaReporte2;
		}//end function
		public function listaPersonalBusqueda($fecha)
		{   $listaPersonalBusqueda= $this->objPersonalBusqueda->listaPersonalBusqueda($fecha);
			return $listaPersonalBusqueda;
		}//end function
	
		public  function LogicaDatoPersonal($idPersonal){
		$LogicaDatoPersonal =$this->objPersonalBusqueda->datoPersonal($idPersonal);
		return $LogicaDatoPersonal;
		}
		public function listaPersonal(){
			$listapersonal = $this->objPersonalBusqueda->listaPersonal();
			return $listapersonal;
		}
   
		public  function LogicaListaPersonalU(){
			$LogicaListaPersonalU =$this->objPersonalBusqueda->listaPersonalU();
			return $LogicaListaPersonalU;
			}
		public  function LogicaListaRol(){
		$LogicaListaRol =$this->objPersonalBusqueda->listaRol();
		return $LogicaListaRol;
		}
	
        
	
		
	



	}
?>