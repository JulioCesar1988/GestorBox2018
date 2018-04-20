

<?php
  require_once("../models/connection.php");
  require_once("../models/caja.php");
  
  $connection = new Connection();
  $connection = $connection->getConnection();

  $descripcion = $_POST['descripcion'];
  $precintoA = $_POST['precintoA'];
  $precintoB = $_POST['precintoB'];
//  $id_sector = $_POST['id_sector'];
 // $ubicacion = $_POST['ubicacion'];
 // $codigo = $_POST['codigo'];
  //$id_categoria = $_POST['id_categoria'];
  $id_caja = $_POST['id_caja'];

$caja = new Caja(); 
  if(!empty($descripcion) && !empty($precintoA) && !empty($precintoB)) {
    //$caja->update( $descripcion, $precintoA , $precintoB , $id_sector , $ubicacion ,$codigo,$id_categoria,$id_caja);
    $caja->updateJefe( $descripcion, $precintoA,$precintoB ,$id_caja);
    header('location:../views/list_cajas.php');
  } else {
    echo "00000000000000000000000000000 No se pudo realizar las modificaciones  ";
  } 




?>
