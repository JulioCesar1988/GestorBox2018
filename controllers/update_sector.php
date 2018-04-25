<!-- -->
<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
    require_once("../models/sector.php");

  $connection = new Connection();
  $connection = $connection->getConnection();

  $nombre = $_POST['nombre'];
  $cod = $_POST['cod'];
  
  $id_sector = $_POST['id_sector'];
   
$sector = new Sector(); 
  if(!empty($nombre) && !empty($cod) ) {
    $sector->update($nombre, $cod,$id_sector);
    header('location:../views/list_sectores.php');
  } else {
    echo "00000000000000000000000000000 fracaso ";
  } 




?>
