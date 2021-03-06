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

<?php

include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_usuario = $_GET['id_usuario'];

$sql = "SELECT *  FROM usuario where id_usuario = $id_usuario ";
$result = $conn->query($sql);

$nombre = "null ";
$email = "null ";
$clave = "null";
$id_sector = "null";
$rol = "null";


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $nombre = $row["nombre"];
      $email = $row["email"];
      $clave = $row["clave"];
      $id_sector = $row["id_sector"];
      $rol = $row["rol"];       
    }
} else {
    echo "0 results";
}
$conn->close();
?>

 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!DOCTYPE html>
<html lang="en">
  <body>
     <?php include '../views/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Modificar usuario</h2>
        <div class="content">
          <form action="../controllers/update_user.php" method="post">
            <div class="form-group">
              <label>Email</label>
              <input class="form-control" type="email" name="email" value="<?php echo " $email"; ?>" required><br>
            </div>
            <div class="form-group">
              <label>nombre</label>
              <input class="form-control" type="text" name="nombre" value="<?php echo " $nombre"; ?>" required><br>
            </div>



                                    <div class="form-group">
  <label for="sel1">Rol</label>
  <select class="form-control" name="rol">
      
    <option value ="admin">Administrador</option>
    <option value ="jefe">Encargado</option>
    <option value ="archivador">Archivador</option>
    <option value ="Bloqueado">Bloquear</option>
  
  </select>

            
<div class="form-group">
  <label for="sel1">Sector:</label>
  <select class="form-control" name="id_sector">
      <?php  foreach ($sectores AS $s)
{   ?>
    <option value="<?php echo "$s[id_sector]"; ?>"><?php echo "$s[nombre]"; ?></option>
    <?php } ?>
  </select>
  
</div>
              <div class="form-group">
              <label>id</label>
              <input class="form-control"    type="text"  name="id_usuario" value="<?php echo "$id_usuario"; ?>" required><br>
            </div>


            <div class="form-group">
              <label>Password</label>
              <input class="form-control" type="password" name="clave" value="<?php echo "$clave"; ?>"  required><br>
            </div>

            <input type="submit"  class="btn btn-primary" role="button" value="Registrarse">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>