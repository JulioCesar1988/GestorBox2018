<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
  require_once("../models/sector.php");
  require_once("../models/historial.php");

  $connection = new Connection();
  $connection = $connection->getConnection();

  $id_usuario = $_POST['id_usuario'];
  $id_caja = $_POST['id_caja'];
  $estado = $_POST['estado'];
  $id_historial = $_POST['id_historial'];
   

$historial = new historial(); 
  if(!empty($id_usuario) && !empty($id_caja) && !empty($estado)) {
    $historial->update($id_usuario,$id_caja,$estado,$id_historial);
    header('location:../views/list_historiales.php');
  } else {
    echo "00000000000000000000000000000 fracaso ";
  } 




?>