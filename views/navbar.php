<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>GestorBox</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/gestorbox2018/index.php">GestorBox</a><img src="/gestorbox2018/imagen/fondo.jpg" alt="Mountain View" width="40" height="40">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
       
       </li>
    
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
       <li><a href=""><span class="glyphicon glyphicon-user"></span> 
       <?php    if (!isset($_SESSION['email'])){
              echo "";

              ?> 

              <li><a href="/gestorbox2018/views/login.php"> Ingresar</a></li>
              <?php

         }  else {    echo  'Usuario : '.$_SESSION['email'];  

                 ?>


         <?php  if( $_SESSION['rol'] == "admin"){  ?>
               
        <li><a href="/gestorbox2018/views/list_users.php">Usuario</a></li>
        <li><a href="/gestorbox2018/views/list_sectores.php">Sector</a></li>
         <?php } ?>
 
      <!-- -->
      <li><a href="/gestorbox2018/views/list_categorias.php">Categoria</a></li>
      <li><a href="/gestorbox2018/views/list_cajas.php">Caja</a></li>
      <li><a href="/gestorbox2018/views/list_historiales.php">Historial</a></li>
       <!--<li><a href="/gestorbox2018/views/estadisticas.php">Estadisticas</a></li> -->
       <!-- <li><a href="/gestorbox2018/views/test.php">test</a></li> -->

    










        <li><a href="/gestorbox2018/controllers/logout.php/"><span class="glyphicon glyphicon-user"></span> Salir </a></li> <?php
       }  ?> </a></li>
        <!--<li><a href="/gestorbox2018/views/add_user.php"><span class="glyphicon glyphicon-user"></span> Registrarse </a></li> -->
        
      </ul>
    </div>
  </div>
</nav>
  

</body>
</html>




