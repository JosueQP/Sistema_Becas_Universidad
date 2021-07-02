<?php
    require_once("../Modelo/BDPersonalPersistencia.php");
    
    $objetoPersonalPersistencia = new PersonalPersistencia();
    $arroba="@";
    $preuser1=strlen($_REQUEST['primerNombre']);
    $preUser=substr($_REQUEST['primerNombre'],-$preuser1,1);
    $prePassword=ucfirst($_REQUEST['primerNombre']);
    $prePassword1=substr($prePassword,-$preuser1,1);
    $_REQUEST['contrasenia']=$prePassword1.$_REQUEST['apellidoPaterno'].$arroba.strtoupper($_REQUEST['ci']);
    $pass_cifrado=password_hash($_REQUEST['contrasenia'], PASSWORD_DEFAULT);
    
    $rol =  $_REQUEST['idRol'];
   
    echo $pass_cifrado;
    if($_REQUEST['activo'] == 'S'){
        $activo = 1;
    }else{
        $activo = 0;
    }
    $exitoRegistro = $objetoPersonalPersistencia->registrarPersonal(                                            
                                                        $rol,
                                                        strtoupper($_REQUEST['ci']) ,
                                                        ucwords(strtolower($_REQUEST['primerNombre'])) ,
                                                        ucwords(strtolower($_REQUEST['segundoNombre'])) ,
                                                        ucwords(strtolower($_REQUEST['apellidoPaterno'])) ,
                                                        ucwords(strtolower($_REQUEST['apellidoMaterno'])) ,
                                                        $_REQUEST['usuario']=mb_strtolower($preUser.$_REQUEST['apellidoPaterno']),
                                                         //$_REQUEST['usuario'],
                                                         
                                                         //$_REQUEST['contrasenia'],
                                                        $pass_cifrado,
                                                       $activo
                                                        );
    if($exitoRegistro==1){
         echo "usuario: ".$_REQUEST['usuario'];
        echo "constrasenia: ".$_REQUEST['contrasenia'];
        header ('location:../Vista/IURegistroJefeDepartamento.php');
    }else{
        echo "Error al registrar el personal";
    }

?>
