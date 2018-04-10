<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $sectores = Sector::listAll(); 
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
   <center> <th><a  href="../views/add_sector.php"  class="btn btn-primary" role="button" >Agregar</a></th></center>
<div class="container">
  <h2>Sectores </h2>
  <p>Sectores del sistemas .</p>
  <table class="table">
    <thead>
      <tr>
        <th>nombre</th>
        <th>cod</th>
        <th>descripcion</th>     
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($sectores AS $s)
{   ?>
      <tr>
        <td><?php echo  $s["nombre"] ?></td>
        <td><?php echo  $s["cod"] ?></td>
        <td><?php echo  $s["descripcion"] ?></td>
        <th><a href="../views/show_sector.php?id=<?php echo  $s["id"] ?>"  class="btn btn-info" role="button" >Informacion</a></th>
        <th><a  href="../views/delete_sector.php?id=<?php echo  $s["id"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
        <th><a  href="../views/edit_sector.php?id=<?php echo  $s["id"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>
  <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>