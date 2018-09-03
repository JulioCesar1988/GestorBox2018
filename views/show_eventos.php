<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
 require_once("../models/evento.php"); 
 require_once("../models/connection.php");
 
 $connection = new Connection(); 
 $connection = $connection->getConnection();  

 $id_caja = $_GET['id_caja'];
  //buscamos los eventos de la caja con un ID dado 
 $eventos = Evento::listEventBox($id_caja); 
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lista de eventos</title>
</head>
<body>
  <?php include '../include/head.php';?>
  <?php include '../views/navbar.php';?>
<div class="container">
</div>



<div class="container">
  <h2> Eventos </h2>
  <p>Eventos de una caja determinada .</p>
  <table class="table">
    <thead>

      <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>ID Caja</th>
        <th>Tipo de evento</th>
        <th>Fecha </th>
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($eventos AS $e )
{   ?>
      <tr>
        <td><?php echo  $e["id_evento"] ?></td>
        <td><?php echo  $e["id_usuario"] ?></td>
        <td><?php echo  $e["id_caja"] ?></td>
        <td><?php echo  $e["tipo_evento"] ?></td>
         <td><?php echo  $e["fecha"] ?></td>
                 
   <?php   }  ?>

        



      
