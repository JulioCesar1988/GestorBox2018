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

$id = $_GET['id'];

$sql = "SELECT *  FROM usuario where id = $id ";
$result = $conn->query($sql);

$nombre = "null ";
$email = "null ";
$clave = "null";
$id_sector = "null";


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $nombre = $row["nombre"];
      $email = $row["email"];
      $clave = $row["clave"];
      $id_sector = $row["id_sector"];       
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
        <h4>Información</h2>
        <div class="content">
 <ul class="list-group">

  <li class="list-group-item">Email :  <?php echo " $email"; ?> </li>
  <li class="list-group-item">Nombre : <?php echo " $nombre"; ?> </li>
  <li class="list-group-item"> Sector : <?php echo " $id_sector"; ?></li>
  <li class="list-group-item">Clave : <?php echo " $clave"; ?></li>
</ul>
        </div>
      </div>
    </div>

  </body>
</html>