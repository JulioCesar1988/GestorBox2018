<?php
  require_once("../models/connection.php");
  require_once("../models/users.php");
  require_once("../models/caja.php");
  require_once("../models/sector.php");

  $connection = new Connection();
  $connection = $connection->getConnection();


  
  $nombre = $_POST['nombre'];
  $cod = $_POST['cod'];
  $descripcion = $_POST['descripcion'];
  

echo "$nombre";
echo "$cod";
echo "$descripcion";

  
  $sector = new Sector();
  
  if(!empty($nombre) && !empty($cod) && !empty($descripcion) ) {
    $sector->insert( $nombre, $cod , $descripcion);
  

     header('location:../views/list_sectores.php');
    
  } else {

    echo " no se puede agregar el sector ";
    
  }

?>