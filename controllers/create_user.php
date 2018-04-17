<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");

  $connection = new Connection();
  $connection = $connection->getConnection();
  
  $email = $_POST['email'];
  $nombre = $_POST['nombre'];
  $clave = $_POST['clave'];
  $id_sector = $_POST['id_sector'];
  $rol = $_POST['rol'];



  echo "datos que llegan al controlador ";
  echo "Email -> $email";
  echo "Nombre -> $nombre";
  echo "Clave -> $clave";
  echo "Id Sector -> $id_sector";
  echo "rol -> $rol";
  
  $users = new User();
  if(!empty($email) && !empty($nombre) && !empty($clave) && !empty($id_sector) ) {

    //$email, $nombre, $clave, $id_sector
    $users->insert($email, $nombre,$clave,$id_sector,$rol);
  
    header('location:../views/list_users.php');
  } else {
    echo "00000000000000000000000000000 fracaso ";
  }

?>



