<?php
include_once ("../include/params.php");
require_once("../models/evento.php"); 
require_once("../models/connection.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);
// Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_caja = $_GET['id_caja'];

$sql = "SELECT *  FROM caja where id_caja = $id_caja ";
$result = $conn->query($sql);

$descipcion = "null ";
$precintoA = "null ";
$precintoB = "null";
$ubicacion = "null ";
$id_sector = "null ";
$codigo    = "null";
$id_categoria = "null ";
$evento = "null ";


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

 //buscamos los eventos de la caja con un ID dado 
 $eventos = Evento::listEventBox($id_caja); 
 

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
  <li class="list-group-item"><img alt="Coding Sips" src="../barcode/barcode.php?text=<?php echo  "$codigo"; ?>&print=false"></li>
</ul>
        </div>
      </div>
    </div>
<div class="container">
</div>



<div class="container">
  <p>Eventos.</p>
  <table class="table">
    <thead>

      <tr>
       
        <th>Usuario</th>
        <th>ID Caja</th>
        <th>Tipo de evento</th>
        <th>Fecha </th>
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($eventos AS $e )
{   ?>
      <tr>
       
        <td><?php echo  $e["id_usuario"] ?></td>
        <td><?php echo  $e["id_caja"] ?></td>
        <td><?php echo  $e["tipo_evento"] ?></td>
         <td><?php echo  $e["fecha"] ?></td>
                 
   <?php   }  ?>
  </body>
</html>










