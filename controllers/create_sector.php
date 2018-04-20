<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
  require_once("../models/caja.php");
  require_once("../models/sector.php");

  $connection = new Connection();
  $connection = $connection->getConnection();


  
  $nombre = $_POST['nombre'];
  $cod = $_POST['cod'];
    
  $sector = new Sector();
  
  if(!empty($nombre) && !empty($cod) ) {
    $sector->insert( $nombre, $cod , $descripcion);
  

     header('location:../views/list_sectores.php');
    
  } else {

    echo " no se puede agregar el sector ";
    
  }

?>