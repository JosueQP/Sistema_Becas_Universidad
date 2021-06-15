<?php
require_once("../Modelo/BusquedaGestion.php");
class LNBusquedaAsignacionBecaInstitucional{
    private $objBusquedaAsignacionBecaInstitucional;

    function __construct()
    {
        $this->objBusquedaAsignacionBecaInstitucional =  new GestionBusqueda();
    }


    public function buscarEstudianteGestion($idGestion,$idEstudiante){
       return  $this->objBusquedaAsignacionBecaInstitucional->verificarEstudianteGestion($idGestion,$idEstudiante);


    }
 
}

?>