<!-- -->
<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
  require_once("../models/sector.php");
  require_once("../models/categoria.php");

  $connection = new Connection();
  $connection = $connection->getConnection();

  $nombre = $_POST['nombre'];
  $cod = $_POST['cod'];
  $descripcion = $_POST['descripcion'];
  $id = $_POST['id'];
   
   echo "nombre -> $nombre";
   echo "cod -> $cod";
   echo "descripcion -> $descripcion";
   echo "ID -> $id";

$categoria = new Categoria(); 
  if(!empty($nombre) && !empty($cod) && !empty($descripcion)) {
    $categoria->update($nombre, $cod,$descripcion,$id);
    header('location:../views/list_categorias.php');
  } else {
    echo " error en la caga de la categoria";
  } 




?>