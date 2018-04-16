

<?php
  require_once("../models/connection.php");
  require_once("../models/caja.php");
  
  $connection = new Connection();
  $connection = $connection->getConnection();

  $descripcion = $_POST['descripcion'];
  $precintoA = $_POST['precintoA'];
  $precintoB = $_POST['precintoB'];
  $id_sector = $_POST['id_sector'];
  $ubicacion = $_POST['ubicacion'];
  $codigo = $_POST['codigo'];
  $id_categoria = $_POST['id_categoria'];
  $id_caja = $_POST['id_caja'];


echo " Soy el controlador ";
echo " descripcion -> $descripcion";
echo " precintoA -> $precintoA";
echo " precintoB -> $precintoB";
echo " IdDeSector -> $id_sector";
echo " Ubicacion -> $ubicacion";
echo " codigo -> $codigo";
echo " IdCategoria -> $id_categoria";
echo " IdCategoria -> $id_categoria";



$caja = new Caja(); 
  if(!empty($descripcion) && !empty($precintoA) && !empty($precintoB)&& !empty($id_sector)) {
    $caja->update( $descripcion, $precintoA , $precintoB , $id_sector , $ubicacion ,$codigo,$id_categoria,$id_caja);
    header('location:../views/list_cajas.php');
  } else {
    echo "00000000000000000000000000000 No se pudo realizar las modificaciones  ";
  } 




?>
