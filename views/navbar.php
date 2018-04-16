<?php
// Start the session
session_start();
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
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/gestorbox2018/index.php">GestorBox</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
       
        </li>
      <li><a href="/gestorbox2018/views/list_users.php">Usuario</a></li>
      <li><a href="/gestorbox2018/views/list_sectores.php">Sector</a></li>
      <li><a href="/gestorbox2018/views/list_categorias.php">Categoria</a></li>
      <li><a href="/gestorbox2018/views/list_cajas.php">Caja</a></li>
      <li><a href="/gestorbox2018/views/list_historiales.php">Historial</a></li>
       <li><a href="/gestorbox2018/views/estadisticas.php">Estadisticas</a></li>
       <li><a href="/gestorbox2018/views/test.php">test</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
       <li><a href=""><span class="glyphicon glyphicon-user"></span> 
       <?php    if (!isset($_SESSION['email'])){
              echo "";

              ?> 

              <li><a href="/gestorbox2018/views/login.php"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
              <?php

         }  else { echo $_SESSION['email'];  

                 ?>
        <li><a href="/gestorbox2018/controllers/logout.php/"><span class="glyphicon glyphicon-user"></span> Salir </a></li> <?php
       }  ?> </a></li>
        <!--<li><a href="/gestorbox2018/views/add_user.php"><span class="glyphicon glyphicon-user"></span> Registrarse </a></li> -->
        
      </ul>
    </div>
  </div>
</nav>
  

</body>
</html>