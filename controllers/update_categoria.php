<!-- Modificacion de unca CATEGORIA-->
<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
  require_once("../models/sector.php");
  require_once("../models/categoria.php");
  $connection = new Connection();
  $connection = $connection->getConnection();
  $nombre = $_POST['nombre'];
  $cod = $_POST['cod'];
  $id_categoria = $_POST['id_categoria'];
   
$categoria = new Categoria(); 
  if(!empty($nombre) && !empty($cod)) {
    $categoria->update($nombre, $cod,$id_categoria);
    header('location:../views/list_categorias.php');
  } else {
    echo " error en la caga de la categoria";
  } 




?>
