<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/historial.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $historiales = Historial::listAll(); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GestorBox</title>
</head>
<body>
  <?php include '../views/navbar.php';?>
<div class="container">
</div>
   <center> <th><a  href="../views/add_historial.php"  class="btn btn-primary" role="button" >Agregar</a></th></center>
<div class="container">
  <h2>Historiales </h2>
  <p>historiales del sistemas .</p>
  <table class="table">
    <thead>
      <tr>
        <th>usuario</th>
        <th>codigo</th>
        <th>estado</th>     
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($historiales AS $h)
{   ?>
      <tr>
        <td><?php echo  $h["id_usuario"] ?></td>
        <td><?php echo  $h["id_caja"] ?></td>
        <td><?php echo  $h["estado"] ?></td>
        <th><a href="../views/show_historial.php?id=<?php echo  $s["id"] ?>"  class="btn btn-info" role="button" >Informacion</a></th>
        <th><a  href="../views/delete_historial.php?id=<?php echo  $s["id"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
        <th><a  href="../views/edit_historial.php?id=<?php echo  $s["id"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>
  <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>



