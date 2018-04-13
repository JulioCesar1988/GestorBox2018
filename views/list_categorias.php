<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/categoria.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $categorias = Categoria::listAll(); 
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
   <center> <th><a  href="../views/add_categoria.php"  class="btn btn-primary" role="button" >Agregar</a></th></center>
<div class="container">
  <h2>Categorias </h2>
  <p>Categorias .</p>
  <table class="table">
    <thead>
      <tr>
        <th>nombre</th>
        <th>cod</th>
        <th>descripcion</th>     
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($categorias AS $c )
{   ?>
      <tr>
        <td><?php echo  $c["nombre"] ?></td>
        <td><?php echo  $c["cod"] ?></td>
        <td><?php echo  $c["descripcion"] ?></td>
        <th><a href="../views/show_categoria.php?id_categoria=<?php echo  $c["id_categoria"] ?>"  class="btn btn-info" role="button" >Informacion</a></th>
        <th><a  href="../views/delete_categoria.php?id_categoria=<?php echo  $c["id_categoria"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
        <th><a  href="../views/edit_categoria.php?id_categoria=<?php echo  $c["id_categoria"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>
  <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>