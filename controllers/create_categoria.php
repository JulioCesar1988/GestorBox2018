<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
  require_once("../models/categoria.php");

  $connection = new Connection();
  $connection = $connection->getConnection();
  
  $nombre = $_POST['nombre'];
  $cod = $_POST['cod'];
  $id_sector = $_SESSION['id_sector'];     
  

  // para la creacion de una categoria necesito el ID del sector  , ese dato debo obtenerlo de la sesion.  
  $categoria = new Categoria();
  if(!empty($nombre) && !empty($cod))  {
    $categoria->insert($nombre, $cod,$id_sector);
  
    header('location:../views/list_categorias.php');
  } else {
    echo "00000000000000000000000000000 fracaso ";
  }

?>



