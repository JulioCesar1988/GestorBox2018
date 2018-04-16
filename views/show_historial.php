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
$id_caja= "null ";
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
        <h4>Información historial</h2>
        <div class="content">
 <ul class="list-group">
  <li class="list-group-item">Usuario :  <?php echo " $id_usuario"; ?> </li>
  <li class="list-group-item">Caja : <?php echo " $id_caja"; ?> </li>
  <li class="list-group-item">Estado : <?php echo " $estado"; ?></li>
</ul>
        </div>
      </div>
    </div>

  </body>
</html>