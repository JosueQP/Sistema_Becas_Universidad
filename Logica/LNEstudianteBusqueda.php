<?php
    require_once("../Modelo/BusquedaEstudiante.php");

	class LNEstudianteBusqueda
	{ 
		private $objDBEstudiante;


		function __construct()
		{
			$this->objDBEstudiante = new busquedaEstudiante();
        }
		public function actualizarRegistroEntradaSalida(){


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
		public  function LogicaEstudianteAsignacionDepartamento($idPersonal){
			$LogicaEstudianteAsignacionDepartamento =$this->objDBEstudiante->listaEstudiantesAsignacion1($idPersonal);
			return $LogicaEstudianteAsignacionDepartamento;
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
		public function HorarioEstudianteTrabajo($idEstudiante){
			$HorarioEstudianteTrabajo=$this->objDBEstudiante->HorarioEstudiante($idEstudiante);
			return $HorarioEstudianteTrabajo;

		}

		public function ReporteMesConsulta($fechaInicio,$fechaFin){
			$ReporteMesConsulta=$this->objDBEstudiante->ReporteMes($fechaInicio,$fechaFin);
			return $ReporteMesConsulta;

		}

		function fechaCastellano ($fecha) {
			$fecha = substr($fecha, 0, 10);
			$numeroDia = date('d', strtotime($fecha));
			$dia = date('l', strtotime($fecha));
			$mes = date('F', strtotime($fecha));
			$anio = date('Y', strtotime($fecha));
			$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
			$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
			$nombredia = str_replace($dias_EN, $dias_ES, $dia);
		  $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
			$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
			$fechita=$nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
			return $fechita;
		}
	
	
	
	
	
	
	
	
	
	
	
	
	
	}
?>
    