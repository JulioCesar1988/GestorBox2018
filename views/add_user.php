
<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/caja.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = User::listAll();
 $sectores = Sector::ListAll();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>     <?php include '../include/head.php';?></head>
  <body>
     <?php include '../views/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Agregar usuario</h2>
        <div class="content">
          <form action="../controllers/create_user.php" method="post">
            <div class="form-group">
  <label for="sel1">Sector:</label>
  <select class="form-control" name="id_sector">
      <?php  foreach ($sectores AS $s)
{   ?>
    <option value ="<?php echo "$s[id_sector]"; ?> "><?php echo "$s[nombre]"; ?></option>
    <?php } ?>
  </select>
  
</div>

            <div class="form-group">
              <label>Email</label>
              <input class="form-control" type="email" name="email" required><br>
            </div>
            <div class="form-group">
              <label>nombre</label>
              <input class="form-control" type="text" name="nombre" required><br>
            </div>


                        <div class="form-group">
  <label for="sel1">Rol</label>
  <select class="form-control" name="rol">
      
    <option value ="admin">Administrador</option>
    <option value ="jefe">Jefe de Sector</option>
    <option value ="archivador">Archivador</option>
    <option value ="bloqueado">Bloquear</option>
  
  </select>
  
</div>

            <div class="form-group">
              <label>Password</label>
              <input class="form-control" type="password" name="clave" required><br>
            </div>
            <input type="submit"  class="btn btn-primary" role="button" value="Registrarse">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>