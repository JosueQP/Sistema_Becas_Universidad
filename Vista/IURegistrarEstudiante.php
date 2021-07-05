<?php
    require ("../Logica/LNBusquedaCarrera.php");
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
   /* if (isset($_SESSION['usuario'])){
    $user=$_SESSION['usuario'];
    if(isset($_SESSION['contrasenia'])){
     $pass=$_SESSION['contrasenia'];*/

     $usuario= new LNBusquedaCarrera();
     $listaCarra=$usuario->logicaListaCarrera();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
        <title>Registro Estudiante</title>
    </head>
    <body>
    <div class="container mt-4 mb-4">
    <div class="card card-secondary bg-dark text-center w-75 mx-auto d-block">
            <div class="card-header bg-main text-light">
                <h3>Registro Estudiante</h3>
            </div>
        <br><br>
        <div class="card-body border-secondary bg-light">
            <form action="../Logica/LNRegistrarEstudiante.php"  enctype="multipart/form-data" method="post" name="registrarEstudiante" >
            <table border = 1 align="center">
              <th>Carrera</th>
                <td>
                
                    <select name="idCarrera" id="idCarrera" class="custom-select mt-3">
                      <?php foreach ($listaCarra as $lista): ?>
                      <option value="<?php echo($lista['idCarrera'])?>"><?php echo($lista['nombre'])?></option>
                    <?php endforeach ;

                ?>
                  </select>
                
               
                </td>
                </tr>
                <tr>
                    <th>Rol</th>
                    <td>
                    <select name="idRol" id="idRol" class="custom-select mt-3">
                        <option value="3">Estudiante</option>
                    </select>
                    </td>
                </tr>
            <tr>
                 <td>Codigo Estudiante</td><td><input type="text" name="codigoEstudiante" id="codigoEstudiante"class="form-control mt-3 bb text" placeholder="solo numeros y caracteres"size=30></td>
             </tr>
             <tr>
                 <td>CI</td><td><input type="text" name="ci" id="ci"class="form-control mt-3 bb text" placeholder="solo numeros y caracteres"size=30></td>
             </tr>
           <tr>
              <td>Primer Nombre</td><td><input type="text" name="primerNombre" pattern="[A-Za-z]+" class="form-control mt-3 bb text" placeholder="solo caracteres"size=30 minlength="3" maxlength="12"  required></td>
            </tr>
            <tr>
              <td>Segundo Nombre</td><td><input type="text" name="segundoNombre"class="form-control mt-3 bb text"  placeholder="solo caracteres"minlength="3" maxlength="12" size=30></td>
            </tr>
            <tr>
              <td>Apellido Paterno</td><td><input type="text" name="apellidoPaterno"class="form-control mt-3 bb text" placeholder="solo caracteres"minlength="3" maxlength="12" size=30  required></td>
            </tr>
            <tr>
              <td>Apellido Materno</td><td><input type="text" name="apellidoMaterno"class="form-control mt-3 bb text" placeholder="solo caracteres"minlength="3" maxlength="12" size=30></td>
            </tr>
             <tr>
            <td>Genero</td><td><input type="radio" name="genero"size=30 value='Masculino' >M<input type="radio" name="genero"size=30 value='Femenino'>F
            </td>
            </tr>

            <tr>
              <td>Fecha Nacimiento</td><td><input type="date"class="form-control mt-3 bb text"  name="fechaNacimiento"size=30></td>
            </tr>
            <tr>
            <td>Activo</td><td><input type="radio" name="activo"size=30 value='S' >S<input type="radio" name="activo"size=30 value='N'>N
            </td>
            </tr>
          </table>
        <input type = "submit" value = "Registrar" class="btn  btn-danger mt-3">
        <input type = "reset" value = "Cancelar" class="btn  btn-danger mt-3">  
        </form>
     </div>
    </div>
</body>
</html>
<?php
/*}}else{
  header('Location: salirEstudiante.php');//Aqui lo redireccionas al lugar que quieras.
    die() ;
    
     }*/
   ?>