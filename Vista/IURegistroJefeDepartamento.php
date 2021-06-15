<?php
    require ("../Logica/LNPersonalBusqueda.php");
    require ("../Logica/LNBusquedaDepartamento.php");
    require ("../Logica/LNGestionBusqueda.php");
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.

    $usuario = new LNPersonalBusqueda();
    $departamento = new LNDepartamentoBusqueda();
    $gestion = new LNGestionBusqueda();
     $listaDepartamento=$departamento->logicaListaDepartamento();
     $listaPersonalU=$usuario->LogicaListaPersonalU();
     $listaGestion=$gestion->gestionActiva();
     $listaGestiones=$gestion->logicaGestiones();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
   /* if (isset($_SESSION['usuario'])){
     $user=$_SESSION['usuario'];
     if(isset($_SESSION['contrasenia'])){
      $pass=$_SESSION['contrasenia']; */
?>

<html>
    <head>
   
        <title>Asignar Departamento</title>
    </head>
    <body >
        <h1>AsignarDepartamento </h1>
        <br><br>

       <form action="../Logica/LNRegistrarPersonalDepartamento.php" method="post" name="registrarPersonalDepartamento">
        <h3>
        <table border = 1>
        <th>Gestion</th>
                <td>
                    <select name="idGestion" id="idGestion">
                      <?php foreach ($listaGestiones as $lista): ?>
                      <option value="<?php echo($lista['idGestion'])?>"><?php echo($lista['nombre'])?></option>
                    <?php endforeach ;

                ?>
                  </select>
                </td>
            </tr>
            <th>Departamento</th>
                <td>
                    <select name="idDepartamento" id="idDepartamento">
                      <?php foreach ($listaDepartamento as $lista): ?>
                      <option value="<?php echo($lista['idDepartamento'])?>"><?php echo($lista['nombre'])?></option>
                    <?php endforeach ;

                ?>
                  </select>
                </td>
            </tr>
            <th>Personal</th>
                <td>
                    <select name="idPersonal" id="idPersonal">
                    <option value="<?php echo($listaPersonalU['idPersonal'])?>"><?php echo($listaPersonalU['nombreCompleto'])?></option>  
                  </select>
                </td>
            </tr>
            
        </table>
        </h3>
        
        <input type = "submit" value = "Registrar">
        <input type = "reset" value = "Cancelar"> 
        </form>
        <script>
            
        </script>
    </body>
</html>
<?php
/*}}else{
  header('Location: salirPersonal.php');//Aqui lo redireccionas al lugar que quieras.
    die() ;
    
    }*/
   ?>