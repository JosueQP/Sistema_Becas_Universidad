<?php
    require_once("../Modelo/BusquedaEstudiante.php");

	class LNEstudianteBusqueda
	{ 
		private $objDBEstudiante;


		function __construct()
		{
			$this->objDBEstudiante = new busquedaEstudiante();
        }

        public function verificarCi($ci)
		{   
			$verificarCi = $this->objDBEstudiante->verificarCi($ci);

			return $verificarCi;
		}//end function
		
		public function verificarUsuarioEstudiante($usuario)
		{   
			$verificarUsuarioEstudiante = $this->objDBEstudiante->verificarUsuarioEstudiante($usuario);

			return $verificarUsuarioEstudiante;
		}
		
		public function verificarContraseniaEstudiante($contrasenia)
		{   
			
			$verificarContraseniaEstudiante = $this->objDBEstudiante->verificarContraseniaEstudiante($contrasenia);
			

			return $verificarContraseniaEstudiante;
		}

		public function rolEstudiante($usuario)
		{   
			$rolEstudiante = $this->objDBEstudiante->rolEstudiante($usuario);

			return $rolEstudiante;
		}

		public  function LogicaListaEstudiante(){
			$LogicaListaEstudiante =$this->objDBEstudiante->listaEstudiante();
			return $LogicaListaEstudiante;
		}
		public  function LogicaEstudianteAsignacion(){
			$LogicaEstudianteAsignacion =$this->objDBEstudiante->listaEstudiantesAsignacion();
			return $LogicaEstudianteAsignacion;
		}
		public function busquedaEstudiante($nombre,$primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$ci,$activo){
			$busquedaEstudiante = $this->objDBEstudiante->busquedaEstudiante($nombre,$primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$ci,$activo);
			return $busquedaEstudiante;
		}

	
		public function buscarCIEstudiante($ci){
			$buscarCIEstudiante=$this->objDBEstudiante->buscarCI($ci);
			return $buscarCIEstudiante;

		}
		
		public function ReporteMensual1($idEstudiante){
			$ReporteMensual1=$this->objDBEstudiante->ReporteMensual($idEstudiante);
			return $ReporteMensual1;

		}

		public function ReporteMesConsulta($fechaInicio,$fechaFin){
			$ReporteMesConsulta=$this->objDBEstudiante->ReporteMes($fechaInicio,$fechaFin);
			return $ReporteMesConsulta;

		}

		
	
	
	
	
	
	
	
	
	
	
	
	
	
	}
?>
    