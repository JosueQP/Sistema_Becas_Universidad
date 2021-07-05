<?php
    require_once("../Modelo/BusquedaDepartamento.php");

	//session_start();

	class LNDepartamentoBusqueda
	{
		
		
		private $objPersonalBusqueda;

		public function __construct()
		{
            $this->objDepartamentoBusqueda = new busquedaDepartamento();
		}
  
        public  function LogicaListaDepartamento(){
			$LogicaListaDepartamento =$this->objDepartamentoBusqueda->listaDepartamento();
			return $LogicaListaDepartamento;
			}
			public  function LogicaListaDepartamentoLibres(){
				$LogicaListaDepartamentoLibres =$this->objDepartamentoBusqueda->listaDepartamentoLibres();
				return $LogicaListaDepartamentoLibres;
				}
			
			public  function LogicaListaDepartamentoArea($idDepartamento){
				$LogicaListaDepartamentoArea=$this->objDepartamentoBusqueda->listaDepartamentoArea($idDepartamento);
				return $LogicaListaDepartamentoArea;
				}
  
  
  
  
  
    }
?>