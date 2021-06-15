<?php
require_once("../Logica/LNEstudianteBusqueda.php");
$objLNListaPersonal = new LNEstudianteBusqueda();
$Reporte = $objLNListaPersonal -> ReporteMensual1($_REQUEST['idEstudiante']);

//var_dump($Reporte);

//$user=$_REQUEST['idEstudiante'];
//echo $user ;
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
<div class="card " >
                    <p>
							 <for>Gestion :</for> <?php echo($Reporte['gestion'])?>
							 <br> <for>Estudiante :</for>  <?php echo($Reporte['estudiante'])?>
                             <br><for>Area :</for>   <?php echo($Reporte['area'])?>
                             <br> <for>Departamento :</for>  <?php echo($Reporte['departamento'])?>
                             <br> <for>Precio :</for>  <?php echo($Reporte['precio'])?>
                             <br><for>Jefe Departamento :</for>   <?php echo($Reporte['personal'])?>
                            
							<br>
					</p>

                    </div> 
            <form action="../Vista/IUBuscarReporteMes.php" method="post" name="ReporteMes">
            <input type="hidden" name="idAsignacionBecaInstitucional" value="<?php echo($Reporte['idAsignacionBecaInstitucional'])?>">
           

                <table border = 1>
                <tr>
                    <td><input type="date" name="fechaInicio" id="fechaInicio" placeholder="Ingresar La  Fecha Inicio" ></td>
                </tr>
                <br>
                <tr>
                    <td><input type="date" name="fechaFin" id="fechaFin" placeholder="Ingresar La  Fecha Fin" ></td>
                </tr>
                <table>
                <button type="submit">Buscar</button>
                <button type="reset">Cancelar</button>
            </form>     
</body>
</html>