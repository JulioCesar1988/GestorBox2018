<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
  require_once("../models/categoria.php");

  $connection = new Connection();
  $connection = $connection->getConnection();
  
  $nombre = $_POST['nombre'];
  $cod = $_POST['cod'];
  $descripcion = $_POST['descripcion'];
     
  $categoria = new Categoria();
  if(!empty($nombre) && !empty($cod) && !empty($descripcion)) {
    $categoria->insert($nombre, $cod,$descripcion);
  
    header('location:../views/list_categorias.php');
  } else {
    echo "00000000000000000000000000000 fracaso ";
  }

?>



