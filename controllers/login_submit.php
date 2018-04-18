<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");

  $email = $_POST['email'];
  $clave = $_POST['clave'];
 
 echo "datos para verificar el login ";
 echo "$email";
 echo "$clave";


  $connection = new Connection();
  $connection = $connection->getConnection();

  $user = new User();
  if($row = $user->loginCorrect($email, $clave)){
    // Existe user
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['clave'] = $clave;
    $_SESSION['id_sector'] = $row['id_sector'];
    $_SESSION['rol'] = $row['rol'];
    $_SESSION['id_usuario'] = $row['id_usuario'];
    
    echo $_SESSION['email'];
    echo $_SESSION['clave'];
    echo $_SESSION['id_sector'];
    echo $_SESSION['rol'];
    echo $_SESSION['id_usuario'];
    

    header('location:/gestorbox2018/index.php');


  }
  else {
    // Que lo vuelva a intentar. 
    header('location:../views/login.php');
    
    
  }
?>
