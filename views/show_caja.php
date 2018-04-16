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

$id_caja = $_GET['id_caja'];



echo "$id_caja";
$sql = "SELECT *  FROM caja where id_caja = $id_caja ";
$result = $conn->query($sql);

$descipcion = "null ";
$precintoA = "null ";
$precintoB = "null";
$ubicacion = "null ";
$id_sector = "null ";
$codigo    = "null";
$id_categoria = "null ";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $descripcion =$row["descripcion"];;
        $precintoA = $row["precintoA"];
        $precintoB = $row["precintoB"];
        $ubicacion = $row["ubicacion"];
        $id_sector = $row["id_sector"];
        $codigo    = $row["codigo"];
        $id_categoria = $row["id_categoria"];             
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
        <h4>Información de Caja </h2>
        <div class="content">
 <ul class="list-group">
  <li class="list-group-item">Descripcion :  <?php echo " $descripcion"; ?> </li>
  <li class="list-group-item">PrecintoA: <?php echo " $precintoA"; ?> </li>
  <li class="list-group-item">PrecintoB: <?php echo " $precintoB"; ?></li>
  <li class="list-group-item">Ubicacion:  <?php echo " $ubicacion"; ?> </li>
  <li class="list-group-item">Sector: <?php echo " $id_sector"; ?> </li>
  <li class="list-group-item">Categoria : <?php echo " $id_categoria"; ?></li>
  <li class="list-group-item">Codigo : <?php echo " $codigo"; ?></li>
</ul>
        </div>
      </div>
    </div>

  </body>
</html>