<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = User::listAll(); 
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
   <center> <th><a  href="../views/add_user.php"  class="btn btn-primary" role="button" >Agregar</a></th></center>
<div class="container">
  <h2>Usuarios </h2>
  <p>Los usuarios del sistema , pertenecen a un sector , su funcion es almacenar cajas , las cuales podran hacer pedidos o modificar su descipcion , .</p>
  <table class="table">
    <thead>
      <tr>
        <th>nombre</th>
        <th>email</th>
        <th>clave</th>
        <th>Sector</th>     
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($usuarios AS $u)
{   ?>
      <tr>
        <td><?php echo  $u["nombre"] ?></td>
        <td><?php echo  $u["email"] ?></td>
        <td><?php echo  $u["clave"] ?></td>
        <td><?php echo  $u["id_sector"]?></td>
        <th><a href="../views/show_user.php?id=<?php echo  $u["id"] ?>"  class="btn btn-info" role="button" >Informacion</a></th>
        <th><a  href="../views/delete_user.php?id=<?php echo  $u["id"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
        <th><a  href="../views/edit_user.php?id=<?php echo  $u["id"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>
       
  <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>




