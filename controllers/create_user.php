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
  
  $users = new User();
  if(!empty($email) && !empty($nombre) && !empty($clave) && !empty($id_sector) ) {

  
    $users->insert($email, $nombre,$clave,$id_sector,$rol);
  
    header('location:../views/list_users.php');
  } else {
    echo "00000000000000000000000000000 fracaso ";
  }

?>



