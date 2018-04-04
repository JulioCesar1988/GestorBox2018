<?php
  require_once("../models/connection.php");
  require_once("../models/users.php");

  $connection = new Connection();
  $connection = $connection->getConnection();
  
  $email = $_POST['email'];
  $nombre = $_POST['nombre'];
  $clave = $_POST['clave'];
  
  echo "datos que llegan al controlador ";
  echo "$email";
  echo "$nombre";
  echo "$clave";
  
  $users = new Users();
  if(!empty($email) && !empty($nombre) && !empty($clave)) {
    $users->insert($email, $nombre,$clave);
  
    header('location:../views/list_users.php');
  } else {
    echo "00000000000000000000000000000 fracaso ";
  }

?>



