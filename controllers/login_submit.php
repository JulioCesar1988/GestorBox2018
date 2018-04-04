<?php
  require_once("../models/connection.php");
  require_once("../models/users.php");

  $email = $_POST['email'];
  $clave = $_POST['clave'];
 echo "datos para verificar el login ";
 echo "$email";
 echo "$clave";


  $connection = new Connection();
  $connection = $connection->getConnection();

  $users = new Users();
  if($row = $users->loginCorrect($email, $clave)){
    // Existe user
    session_start();
    $_SESSION['email'] = $email;
    
     header('location:../views/list_users.php');
    
  }
  else {
    // No existe
    echo "no encontro al user";
    
  }
?>
