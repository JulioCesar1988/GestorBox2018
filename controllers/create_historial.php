<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
  require_once("../models/caja.php");
  require_once("../models/sector.php");
   require_once("../models/historial.php");

  $connection = new Connection();
  $connection = $connection->getConnection();


  
  $id_usuario = $_POST['id_usuario'];
  $id_caja = $_POST['id_caja'];
  $estado = $_POST['estado'];
  

echo "$id_usuario";
echo "$id_caja";
echo "$estado";

  
  $historial = new Historial();
  
  if(!empty($id_usuario) && !empty($id_caja) && !empty($estado)) {
    $historial->insert( $id_usuario, $id_caja , $estado);

     header('location:../views/list_historiales.php');
    
  } else {

    echo " No se puede agregar el historial  ";
    
  }

?>