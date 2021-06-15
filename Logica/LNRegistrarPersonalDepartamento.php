<?php
require_once("../Modelo/BDDepartamentoPersistencia.php");
    
    $objetoRegistrarDepartamentoPersonal = new departamentoPersistencia();
    $dep=$_REQUEST['idDepartamento'];
    $personal=$_REQUEST['idPersonal'];
    $gestion=$_REQUEST["idGestion"];
    echo $dep;
    echo $personal;
    echo $gestion;
    $exitoRegistro = $objetoRegistrarDepartamentoPersonal->registrarPersonalDepartamento(
                                                          $_REQUEST['idGestion'],
                                                        $_REQUEST['idDepartamento'],
                                                         $_REQUEST['idPersonal']
                                                     
                                                       
                                                       
                                                        );
    if($exitoRegistro==1){
    	echo "exito registro";
      header('location:../LoginPersonal/index.html');
    }else{
      echo "error al registrar";
    }
   
?>

<br>
<?php

//header('Location:../Vista/HorarioTrabajo.php')?>