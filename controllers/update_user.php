
<!-- -->
<?php
  require_once("../models/connection.php");
  require_once("../models/users.php");
  $connection = new Connection();
  $connection = $connection->getConnection();
  $email = $_POST['email'];
  $nombre = $_POST['nombre'];
  $clave = $_POST['clave'];
  $id_sector = $_POST['id_sector'];
  echo "Datos con los que vamos actualizar  ";
  echo " emails  -> $email ";
  echo "nombre  -> $nombre ";
  echo "clave -> $clave  ";
  echo "id_sector -> $id_sector ";
$users = new Users(); 
  if(!empty($email) && !empty($nombre) && !empty($clave)&& !empty($id_sector)) {
    $users->update($email, $nombre,$clave,$id_sector);
    header('location:../views/list_users.php');
  } else {
    echo "00000000000000000000000000000 fracaso ";
  } 




?>
