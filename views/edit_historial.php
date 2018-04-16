<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/caja.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = User::listAll();
 $cajas = Caja::ListAll();
 ?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestorboxdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id_historial = $_GET['id_historial'];
$sql = "SELECT *  FROM historial where id_historial = $id_historial ";
$result = $conn->query($sql);
$id_usuario = "null ";
$id_caja = "null ";
$estado = "null";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $id_usuario = $row["id_usuario"];
      $id_caja = $row["id_caja"];
      $estado = $row["estado"];       
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
  <body>
     <?php include '../views/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Agregar historial</h2>
        <div class="content">
          <form action="../controllers/create_historial.php" method="post">
            <div class="form-group">
  <label for="sel1">Usuario:</label>
  <select class="form-control" name="id_usuario">
  <?php  foreach ($usuarios AS $u)
{   ?>
 <option value="<?php echo "$u[id_usuario]"; ?>"><?php echo "$u[email]"; ?></option>
<?php } ?>
  </select>
</div>
<div class="form-group">
  <label for="sel1">Caja:</label>
  <select class="form-control" name="id_caja">
      <?php  foreach ($cajas AS $c)
{   ?>
    <option value="<?php echo "$c[id_caja]"; ?> "><?php echo "$c[codigo]"; ?></option>
    <?php } ?>
  </select>
</div>


<div class="form-group">
  <label for="sel1">Estado:</label>
  <select class="form-control" name="estado" >
    <option>Pedido</option>
    <option>Entrega</option>
  </select>
</div>

            <input type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>


