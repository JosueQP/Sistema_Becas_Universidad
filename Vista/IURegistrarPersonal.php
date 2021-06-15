<?php
    require ("../Logica/LNPersonalBusqueda.php");
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.

    $usuario= new LNPersonalBusqueda();
     $listaRol=$usuario->logicaListaRol();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
   /* if (isset($_SESSION['usuario'])){
     $user=$_SESSION['usuario'];
     if(isset($_SESSION['contrasenia'])){
      $pass=$_SESSION['contrasenia']; */
?>

<html>
    <head>
        <title>Registro Personal</title>
    </head>
    <body >
        <h1>REGISTRO DE PERSONAL</h1>
        <br><br>

       <form action="../Logica/LNRegistrarPersonal.php" method="post" name="registrarPersonal">
        <h3>
        <table border = 1>
            <th>area</th>
                <td>
                
                    <select name="idRol" id="idRol">
                      <?php foreach ($listaRol as $lista): ?>
                      <option value="<?php echo($lista['idRol'])?>"><?php echo($lista['nombre'])?></option>
                    <?php endforeach ;

                ?>
                  </select>
                
               
                </td>
            </tr>
            <tr>
                 <td>CI</td><td><input type="text" name="ci" id="ci"placeholder="solo numeros y caracteres"size=30></td>
             </tr>
           <tr>
              <td>Primer Nombre</td><td><input type="text" name="primerNombre" pattern="[A-Za-z]+"placeholder="solo caracteres"size=30 minlength="3" maxlength="12"  required></td>
            </tr>
            <tr>
              <td>Segundo Nombre</td><td><input type="text" name="segundoNombre" placeholder="solo caracteres"minlength="3" maxlength="12" size=30></td>
            </tr>
            <tr>
              <td>Apellido Paterno</td><td><input type="text" name="apellidoPaterno"placeholder="solo caracteres"minlength="3" maxlength="12" size=30  required></td>
            </tr>
            <tr>
              <td>Apellido Materno</td><td><input type="text" name="apellidoMaterno"placeholder="solo caracteres"minlength="3" maxlength="12" size=30></td>
            </tr>
              <tr>
              <td>Activo</td><td><input type="radio" name="activo"size=30 value='S'>S<input type="radio" name="activo"size=30 value='N'>N
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

<!--<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title>Registro Personal</title>
    </head>
    <body>
    <?php //include("plantillas/navBar.php");?>
    <div class="container mt-4 mb-4">
    <div class="card card-secondary bg-dark text-center w-75 mx-auto d-block">
            <div class="card-header bg-main text-light">
                <h3>Registro Personal</h3>
            </div>
            <div class="card-body border-secondary bg-light">
                <form action="../Logica/LNRegistrarPersonal.php" method="POST" class="was-validated" enctype="multipart/form-data">
                <th>Rol</th>
                <td>
                    <select name="idRol" id="idRol">
                      <?php //foreach ($listaRol as $lista): ?>
                      <option value="<?//php echo($lista['idRol'])?>"><?//php echo($lista['nombre'])?></option>
                    <?//php endforeach ;

                      ?>
                  </select>
                  </td>
                </tr>
                    <input type="text" name="ci" class="form-control mt-3" id="" placeholder="CI" required pattern="[0-9\s]{5,10}" title="Ingrese un numero de 5 hasta 10 caracteres">
                    <input type="text" name="primerNombre" class="form-control mt-3 bb text" placeholder="Primer Nombre" pattern="[A-Za-z0-9\s]{3,12}" title="Use solo letras y son requeridos 3 caracteres minimos, 12 maximo" required>
                    <input type="text" name="segundoNombre" class="form-control mt-3" id="" placeholder="Segundo Nombre" pattern="[A-Za-z0-9\s]{3,12}" title="Use solo letras y son requeridos 3 caracteres minimos, 12 maximo">
                    <input type="text" name="primerApellido" class="form-control mt-3" id="" placeholder="Primer Apellido" required pattern="[A-Za-z0-9\s]{3,12}" title="Use solo letras y son requeridos 3 caracteres minimos, 12 maximo">
                    <input type="text" name="segundoApellido" class="form-control mt-3" id="" placeholder="Segundo Apellido" required pattern="[A-Za-z0-9\s]{3,12}" title="Use solo letras y son requeridos 3 caracteres minimos, 12 maximo">
                  
              <td>Activo</td><input type="radio" name="activo"size=30 value='S'>S<input type="radio" name="activo"size=30 value='N'>N
           
            
                    <input type="submit" value="Registrar" class="btn btn-block btn-danger mt-3">
                </form>
            </div>
    </div>
</body>
</html>-->