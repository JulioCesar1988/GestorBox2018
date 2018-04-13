<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
  require_once("../models/caja.php");

  $connection = new Connection();
  $connection = $connection->getConnection();

  $descripcion = $_POST['descripcion'];
  $precintoA = $_POST['precintoA'];
  $precintoB = $_POST['precintoB'];
  $id_sector = $_POST['id_sector'];
  $ubicacion = $_POST['ubicacion'];
  $codigo = $_POST['codigo'];
  $id_catetoria = $_POST['id_catetoria'];


echo " Soy el controlador ";
echo " descripcion -> $descripcion";
echo "precintoA -> $precintoA";
echo "precintoB -> $precintoB";
echo "IdDeSector -> $id_sector";
echo "Ubicacion -> $ubicacion";
echo "codigo -> $codigo";
echo "IdCategoria -> $id_catetoria";
  
  $caja = new Caja();
  
  if(!empty($descripcion) && !empty($precintoA) && !empty($precintoB)) {
    $caja->insert( $descripcion, $precintoA , $precintoB , $id_sector , $ubicacion ,$codigo.$id_catetoria);
  
     header('location:../views/list_cajas.php');
    
  } else {

    echo "00000000000000000000000000000 fracaso cajaaaaaaa ";
  
  }

?>