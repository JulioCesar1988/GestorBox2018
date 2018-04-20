<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
  require_once("../models/caja.php");

  $connection = new Connection();
  $connection = $connection->getConnection();
  $descripcion = $_POST['descripcion'];
  $precintoA = $_POST['precintoA'];
  $precintoB = $_POST['precintoB'];
  $mi_sector = $_SESSION['id_sector'];
  $id_sector = $mi_sector;  //$_POST['id_sector'];
  $ubicacion = $_POST['ubicacion'];
  $codigo = $_POST['codigo'];
  $id_categoria = $_POST['id_categoria'];

  $caja = new Caja();
  
  if(!empty($descripcion) && !empty($precintoA) && !empty($precintoB)) {
    
    $caja->insert( $descripcion, $precintoA , $precintoB , $id_sector , $ubicacion ,$codigo,$id_categoria);
     
     header('location:../views/list_cajas.php');
    
  } else {

    echo "00000000000000000000000000000 fracaso cajaaaaaaa ";
  
  }

?>