<?php
require_once "../Logica/LNPersonalBusqueda.php";
require_once "../Logica/LNEstudianteBusqueda.php";
require_once "../Logica/LNGestionBusqueda.php";
require_once "../Logica/LNBusquedaAsignacionBecaInstitucional.php";
require_once "../Logica/LNBusquedaRegistroEntradaSalida.php";
require_once "../Logica/LNRegistroEntradaSalidaPersistencia.php";

if(!empty($_REQUEST['ci'])){
    $objLNEstudianteBusqueda = new  LNEstudianteBusqueda();
    $objLNGestion = new LNGestionBusqueda();
    $estudiante = $objLNEstudianteBusqueda->buscarCIEstudiante($_REQUEST['ci']);
  // var_dump ($estudiante);
    $gestionActiva = $objLNGestion->gestionActiva ();
    //var_dump ($gestionActiva);
    //var_dump ($gestionActiva);
    if($estudiante){
        //echo "CI:".$_REQUEST['ci'];
        $dtz = new DateTimeZone("America/Caracas");
        $dt = new DateTime ("now",$dtz);

        $fechaActual = $dt -> format("Y-m-d");
        $horaActual = $dt -> format ("H-i-s");
        //echo $fechaActual;
    $objBABI = new LNBusquedaAsignacionBecaInstitucional();
   
    $existeEstudianteGestionActual=$objBABI->buscarEstudianteGestion($gestionActiva['idGestion'],$estudiante['idEstudiante']);
   //var_dump ($existeEstudianteGestionActual) ;
    if($existeEstudianteGestionActual){
        $idAsignacionBecaInstitucional = $existeEstudianteGestionActual['idAsignacionBecaInstitucional'];
        $objLNBRES =new LNBusquedaRegistroEntradaSalida();
        //echo $idAsignacionBecaInstitucional;
        $estudianteMarcoFechaActual = $objLNBRES->verifyEstudianteSalidaFechaActual($idAsignacionBecaInstitucional,$fechaActual);

        $objLNRES= new LNRegistroEntradaSalidaPersistencia();

        if($estudianteMarcoFechaActual){
            foreach ($estudianteMarcoFechaActual as $registro) {
                if(is_null($registro['horaFin'])){
                    $registrado = $objLNRES -> registroSalida ($idAsignacionBecaInstitucional,$horaActual,$registro['horaInicio']);
                    if($registrado>0){
                        echo "se actualizo de manera correcta la salida";
                    }else{
                        echo "error al actualizar la hora Inicio";
                    }
                }
            }   

                }else{
                    echo"Marcar la hora Inicio : <br>";
                    $registrado = $objLNRES->registroEntrada($idAsignacionBecaInstitucional,$fechaActual,$horaActual);
                    //echo"se registra la entrada correctamente";
                }
            }else{
                echo "usuario no trabaja en la gestion actual";
            }
        }else{
            echo "Usuario Invalido";
        }
       
       }else{
            echo "ci no puede ser vacio";
       }

?>
