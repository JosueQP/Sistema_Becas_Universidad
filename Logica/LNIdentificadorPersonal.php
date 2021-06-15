<?php
require_once("../Modelo/BusquedaPersonal.php");
$usuario= new PersonalBusqueda();

session_start();
if($user=$_POST['usuario']==null||$pass=$_POST['contrasenia']==null){
	header('Location: ../index.php');
}
else{
		$user=$_POST['usuario'];
		$pass=$_POST['contrasenia'];
		//echo "user.....".$_POST['usuario'];
		//echo "pass  .......... ".$_POST['contrasenia'];
		$_SESSION['usuario']=$user;
		$_SESSION['contrasenia']=$pass;
		//$datosPersonal1=$usuario->datosPersonal($user);

		$existeUsuario=$usuario->verificarUsuarioPersonal($_POST['usuario']);
		//var_dump ($existeUsuario);
		//$existeContrasenia=$usuario->verificarContraseniaPersonal($_SESSION['contrasenia']);
		//var_dump ($existeContrasenia);

		$datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);

		if($existeUsuario){
			//echo "existe usuario";
			//echo "pass form:           ".$pass."<br>";
			//echo "pass bd: ".$existeUsuario['contrasenia'];
			if(password_verify($pass,$existeUsuario['contrasenia'])){
				//echo "Contrasenia valida del usuario";
				if($existeUsuario['activo']=='1'){
					
						    
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
				?> <script>
					window.onload=function(){
					// Una vez cargada la página, el formulario se enviara automáticamente.
					document.forms["miformulario"].submit();
				}
				</script>
			<div class="sub-container">
			<div class="sub-header"><h1>Bienvenido <br><br><?php echo $datosUsuario['nombreUsuario']?></h1><br></div>
			<form action="../Vista/IUJefeGestionTalentoHumano.php" method="post" name="miformulario">
			<label for="user" name="user"></label>
			<input type="hidden" name="user" value="<?php echo $datosUsuario['idPersonal']?>"><br>
			  <div class="button">
			<input type="submit" value="Continuar">
	</div> 
			 </form>
			</div>

			<?php
			break;

			case 2:
			?>

	
		<script>
			window.onload=function(){
			// Una vez cargada la página, el formulario se enviara automáticamente.
			document.forms["miformulario"].submit();
			}
			</script>
			<div class="sub-container">
			<div class="sub-header"><h1>Bienvenido <br><br><?php echo $datosUsuario['nombreUsuario']?></h1><br></div>
			<form action="../Vista/IUJefeDepartamento.php" method="post" name="miformulario">
			<label for="user" name="user"></label>
			<input type="hidden" name="user" value="<?php echo $datosUsuario['idPersonal']?>"><br>
			  <div class="button">
			<input type="submit" value="Continuar">
	</div> 
			 </form>
		</div>
		<?php

			break;
		case 4:
		?>
		<script>
			window.onload=function(){
			// Una vez cargada la página, el formulario se enviara automáticamente.
			document.forms["miformulario"].submit();
		}
		</script>
		<div class="sub-container">
		<div class="sub-header"><h1>Bienvenido <br><br><?php echo $datosUsuario['nombreUsuario']?></h1><br></div>
					<form action="../Vista/IUencargadoFinanzas.php" method="post" name="miformulario">
					<label for="user" name="user"></label>
					<input type="hidden" name="user" value="<?php echo $datosUsuario['idPersonal']?>"><br>
					<div class="button">
					<input type="submit" value="Continuar">
			</div> 
					</form>
		</div>
		<?php

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


