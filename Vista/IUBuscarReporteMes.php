<?php
/*require_once("../Logica/LNEstudianteBusqueda.php");
$objLNListaPersonal = new LNEstudianteBusqueda();
*/
require_once("../Logica/LNBusquedaRegistroEntradaSalida.php");
$ObjListaRegistroEntradaSalida = new LNBusquedaRegistroEntradaSalida();
//echo $_REQUEST['idAsignacionBecaInstitucional'];
$listaRegistroEntradaSalidaABI = $ObjListaRegistroEntradaSalida ->ListaEntradaSalida($_REQUEST['idAsignacionBecaInstitucional'],$_REQUEST['fechaInicio'],$_REQUEST['fechaFin']);
//var_dump($listaRegistroEntradaSalidaABI);
//echo $listaRegistroEntradaSalidaABI;
//$fechaInicio = $_REQUEST['fechaInicio'];
//$fechaFin = $_REQUEST['fechaFin'];

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
    
 <form>

 <table border="1">

        <tr>
            <th>fecha</th>
            <th>Total</th>

        </tr>

        <?php foreach($listaRegistroEntradaSalidaABI as $Listas)
             
        {?>

        <tr>
        <td><a href="../Vista/IUReporteDiario.php?idABI=<?php  echo $Listas['idAsignacionBecaInstitucional']; ?>&fecha=<?php  echo $Listas['fecha'];?>">
            <?php  echo $Listas['fecha']; ?></a></td>
            <td ><?php echo $Listas['Total']?></td>
        </tr>
        <?php }?>
</table>

 </form>
    
</body>
</html>