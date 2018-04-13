<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
  require_once("../models/categoria.php");

  $connection = new Connection();
  $connection = $connection->getConnection();
  
  $nombre = $_POST['nombre'];
  $cod = $_POST['cod'];
  $descripcion = $_POST['descripcion'];
  $id_sector = 20;     
  
  echo "nombre -> $nombre";

  echo "cod -> $cod";

  echo "descripcion -> $descripcion";

  echo "id sector -> $id_sector";
 

  // para la creacion de una categoria necesito el ID del sector  , ese dato debo obtenerlo de la sesion.  
  $categoria = new Categoria();
  if(!empty($nombre) && !empty($cod) && !empty($descripcion)) {
    $categoria->insert($nombre, $cod,$descripcion,$id_sector);
  
    header('location:../views/list_categorias.php');
  } else {
    echo "00000000000000000000000000000 fracaso ";
  }

?>



