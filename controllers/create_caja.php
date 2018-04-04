<?php
  require_once("../models/connection.php");
  require_once("../models/users.php");
  require_once("../models/caja.php");

  $connection = new Connection();
  $connection = $connection->getConnection();

  $descripcion = $_POST['descripcion'];
  $precintoA = $_POST['precintoA'];
  $precintoB = $_POST['precintoB'];
  $id_sector = $_POST['id_sector'];
  $ubicacion = $_POST['ubicacion'];

echo " descripcion -> $descripcion";
echo "precintoA -> $precintoA";
echo "precintoB -> $precintoB";
echo "IdDeSector -> $id_sector";
echo "Ubicacion -> $ubicacion";
  
  $caja = new Caja();
  
  if(!empty($descripcion) && !empty($precintoA) && !empty($precintoB) && !empty($id_sector)   ) {
    $caja->insert( $descripcion, $precintoA , $precintoB , $id_sector , $ubicacion );
  

     header('location:../views/list_cajas.php');
    
  } else {

    echo "00000000000000000000000000000 fracaso cajaaaaaaa ";
    header('location:../views/list_users.php');
  }

?>