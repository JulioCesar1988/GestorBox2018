<!-- -->
<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
    require_once("../models/sector.php");

  $connection = new Connection();
  $connection = $connection->getConnection();

  $nombre = $_POST['nombre'];
  $cod = $_POST['cod'];
  $descripcion = $_POST['descripcion'];
  $id = $_POST['id'];
   
   echo "nombre -> $nombre";
   echo "cod -> $cod";
   echo "descripcion -> $descripcion";
   echo "ID -> $id";


$sector = new Sector(); 
  if(!empty($nombre) && !empty($cod) && !empty($descripcion)) {
    $sector->update($nombre, $cod,$descripcion,$id);
    header('location:../views/list_sectores.php');
  } else {
    echo "00000000000000000000000000000 fracaso ";
  } 




?>
