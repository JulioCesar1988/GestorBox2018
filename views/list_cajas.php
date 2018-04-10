<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/categoria.php");
 require_once("../models/caja.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $cajas = Caja::listAll(); 
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
   <center> <th><a  href="../views/add_caja.php"  class="btn btn-primary" role="button" >Agregar</a></th></center>
<div class="container">
  <h2>Caja </h2>
  <p> Listado de las casas del sistemas . (falta poner acciones a los botones )</p>
  <table class="table">
    <thead>
      <tr>
        <th>Descripcion</th>
        <th>PrecintoA</th>
        <th>PrecintoB</th>
        <th>Ubicacion</th>
        <th>Sector</th>     
        <th>Codigo</th>     
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($cajas AS $c )
{   ?>
      <tr>
        <td><?php echo  $c["descripcion"] ?></td>
        <td><?php echo  $c["precintoA"] ?></td>
        <td><?php echo  $c["precintoB"] ?></td>
        <td><?php echo  $c["ubicacion"] ?></td>
        <td><?php echo  $c["id_sector"] ?></td>
        <td><?php echo  $c["codigo"] ?></td>
        <th><a href="../views/show_caja.php?id=<?php echo  $c["id"] ?>"  class="btn btn-info" role="button" >Informacion</a></th>
        <th><a  href="../views/delete_caja.php?id=<?php echo  $c["id"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
        <th><a  href="../views/edit_caja.php?id=<?php echo  $c["id"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>
        <th><a  href="../views/edit_caja.php?id=<?php echo  $c["id"] ?>"  class="btn btn-default" role="button" >Etiqueta</a></th>
        <th><a  href="../views/edit_caja.php?id=<?php echo  $c["id"] ?>"  class="btn btn-success" role="button" >Pedir</a></th>
  <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>