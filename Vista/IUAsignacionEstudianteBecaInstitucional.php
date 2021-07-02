<?php 
session_start();
require ("../Logica/LNEstudianteBusqueda.php");
$estudiante= new LNEstudianteBusqueda();
require ("../Logica/LNBusquedaBecaInstitucional.php");
$becaInstitucional= new LNBusquedaBecaInstitucional();

$listaEstudiantes = $estudiante->LogicalistaEstudiantes();
//var_dump($listaEstudiantes);
$idSolicitudBecaInstitucional = $_REQUEST['idSolicitudBecaInstitucional'];
$listaBecaInstitucional=$becaInstitucional->LogicaListaBecaInstitucional($_REQUEST['idPersonal']);
//var_dump($listaBecaInstitucional);

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
<form action="../Logica/LNRegistrarAsignacionEstudiante.php" method="post" name="RegistrarAsignacionEstudiante">
        <h1>Asignar Estudiante</h1>
        <table border = 1>
        <tr>
               
                <th>Estudiantes </th>
                <td>
                
                    <select name="idEstudiante" id="idEstudiante">
                      <?php foreach ($listaEstudiantes as $lista): ?>
                      <option value="<?php echo($lista['idEstudiante'])?>"><?php echo($lista['Estudiante'])?></option>
                    <?php endforeach ;

                ?>
                  </select>
                
               
                </td>
            </tr>
            <tr>
               
               <th>Solicitud Trabajo </th>
               <td>
               
                   <select name="idSolicitudBecaInstitucional" id="idEstudiante">
                     <?php foreach ($listaBecaInstitucional as $lista12): ?>
                     <option value="<?php echo($lista12['idSolicitudBecaInstitucional'])?>"><?php echo($lista12['nombre'])?></option>
                   <?php endforeach ;

               ?>
                 </select>
               
              
               </td>
           </tr>
         
        </table>
        </h3>
        
        <input type = "submit" value = "Registrar">
        <input type = "reset" value = "Cancelar"> 
        </form>
</body>
</html>