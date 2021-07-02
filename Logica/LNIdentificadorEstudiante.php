<?php
require_once("../Modelo/BusquedaEstudiante.php");
$usuario= new busquedaEstudiante();
session_start();
if($user=$_POST['usuario']==null||$pass=$_POST['contrasenia']==null){
	header('Location: ../index.php');
}
else{
$user=$_POST['usuario'];
$pass=$_POST['contrasenia'];
$_SESSION['usuario']=$user;
$_SESSION['contrasenia']=$pass;
$datos=$usuario->datosEstudiante($user);


//$verificarContraseniaEstudiante=$usuario->verificarContraseniaEstudiante($pass);

//var_dump(password_verify($pass,$datos['contrasenia']));

	//echo "entro";
$existeUsuario=$usuario->verificarUsuarioEstudiante($_POST['usuario']);
//$_SESSION['idUsuario']=$existeUsuario['idUsuario'];
$existeContrasenia=$usuario->verificarContraseniaEstudiante($_SESSION['contrasenia']);

$datosUsuario=$usuario->rolEstudiante($_SESSION['usuario']);
/*$existeUsuario=$usuario->verificarUsuarioPersonal($_SESSION['usuario']);
$existeContrasenia=$usuario->verificarContraseniaPersonal($_SESSION['contrasenia']);
$datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);*/

	//if(password_verify($_POST['contrasenia'], $existeUsuario['contrasenia'])){
 //var_dump(password_verify($pass, $_SESSION['contrasenia'])) ;
 if($existeUsuario){
	//echo "existe usuario";
	//echo "pass form:           ".$pass."<br>";
	//echo "pass bd: ".$existeUsuario['contrasenia'];
	if(password_verify($pass,$datos['contrasenia'])){
		//echo "Contrasenia valida del usuario";
		if($existeUsuario['activo']=='1'){
			$_SESSION['nombreUsuario'] = $datosUsuario['nombreUsuario'];
			$_SESSION['idEstudiante']=$datosUsuario['idEstudiante'];
					
//}	//end else del primer IF	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<?php
	$opc = $existeUsuario['idRol'];
	switch ($opc) {
		case 1:
			header('../Vista/vistaEstudiante/index.php');
		?> 
	
	<?php
	break;

	case 2:

		header('../Vista/vistaEstudiante/index.php');
	?>
<?php

	break;
case 3:
	header ("Location:../Vista/IUEstudiante.php");
	break;
}
?>




<?php
}else{
?>

<h3>su usuario o su contrasenia es incorrecto</h3>
<a href="../index.php">vuelva a intentarlo</a>

<?php
}
}else{
?>

<h3>su usuario o su contrasenia es incorrecto</h3>
<a href="../index.php">vuelva a intentarlo</a>


<?php
}
}else{
?>
<h3>su usuario o su contrasenia es incorrecto</h3>
<a href="../index.php">vuelva a intentarlo</a>
<?php
}
?>
<?php
}

?>
</body>
</html>




