<?php



include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);
// Check connection



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_sector = $_GET['id_sector'];

$sql = "SELECT *  FROM sector where id_sector = $id_sector ";
$result = $conn->query($sql);

$nombre = "null ";
$cod = "null ";
$descripcion = "null";
 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $nombre = $row["nombre"];
      $cod = $row["cod"];
      
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <?php include '../include/head.php';?>
     <?php include '../views/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Modificar sector</h2>
        <div class="content">
          <form action="../controllers/update_sector.php" method="post">
            <div class="form-group">
              <label>nombre</label>
              <input class="form-control" type="text" name="nombre" value="<?php echo "$nombre"; ?>" required><br>
            </div>
            <div class="form-group">
              <label>cod</label>
              <input class="form-control" type="text" name="cod" value="<?php echo "$cod"; ?>" required><br>
            </div>
            
             <div class="form-group">
              <label>ID</label>
              <input class="form-control" type="text" name="id_sector" value="<?php echo "$id_sector"; ?>" required><br>
            </div>
            <input type="submit"  class="btn btn-primary" role="button" value="Registrarse">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>